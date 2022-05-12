<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class BukuController extends Controller
{

    // Mengaktifkan Session

    public function __construct()
    {
        $this->middleware('auth')->except('logout');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        /**
         * Melakukan Pengecekan Session pada Dashboard
         */

        $data = $request->session()->has('auth');
        if ($data) {
            return view('auth.login');
        }

        // $buku = Buku::latest()->paginate(5);

        // return view('buku.index', compact('buku'))
        //     ->with('i', (request()->input('page', 1) - 1) * 5);

        $pagination  = 5;
        $buku    = Buku::when($request->keyword, function ($query) use ($request) {
            $query->where('judul', 'like', "%{$request->keyword}%")
                ->orWhere('isbn', 'like', "%{$request->keyword}%");
        })->orderBy('created_at', 'desc')->paginate($pagination);

        $buku->appends($request->only('keyword'));

        return view('buku.index', compact('buku'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('buku.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $request->validate([
            'isbn' => 'required',
            'judul' => 'required',
            'kategori' => 'required',
            'tingkatan' => 'required',
            'author' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'file' => 'required|mimes:pdf,xlx,csv|max:2048',
            'pustakawan' => 'required',
        ]);

        $input = $request->all();

        // Pengecekan ISBN

        if (Buku::where('isbn', '=', $request->input('isbn'))->count() > 0) { // jika isbn ada
            return back()->withErrors(['ISBN Sudah Ada!']);
        } else { // jika isbn gak ada
            // Gambar
            if ($image = $request->file('gambar')) {
                $destinationPath = 'img/';
                $profileImage = $image->getClientOriginalName() . "_" . date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $input['gambar'] = "$profileImage";
            }
            // file
            if ($file = $request->file('file')) {
                $destinationPath = 'data/';
                $profileData = $file->getClientOriginalName() . "_" . date('YmdHis') . "." . $file->getClientOriginalExtension();
                $file->move($destinationPath, $profileData);
                $input['file'] = "$profileData";
            }

            Buku::create($input);
            toast('Data buku berhasil ditambah!', 'success');

            return redirect()->route('buku.index');
        }

        //    return view('buku.index', ['buku'=> $input]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($isbn)
    {
        return view('buku.show', compact('isbn'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($isbn)
    {
        return view('buku.edit', compact('isbn'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $isbn)
    {
        $request->validate([
            'judul' => 'required',
            'kategori' => 'required',
            'tingkatan' => 'required',
        ]);

        $input = request()->except(['_token', '_method']);
        // $inputOld = $request->all();

        // Pengecekan ISBN

        if (Buku::where('isbn', '=', $request->input('isbn'))->count() > 1) { // jika isbn ada
            return back()->withErrors(['ISBN Sudah Ada!']);
        } else { // jika isbn gak ada
            // Gambar
            if ($image = $request->file('gambar')) {
                $data = Buku::where('isbn', '=', $isbn)->first();
                File::delete('img/' . $data->gambar);
                $destinationPath = 'img/';
                $profileImage = $image->getClientOriginalName() . "_" . date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $input['gambar'] = "$profileImage";
            } else {
                unset($input['gambar']);
            }
            // File
            if ($file = $request->file('file')) {
                $data = Buku::where('isbn', '=', $isbn)->first();
                File::delete('data/' . $data->file);
                $destinationPath = 'data/';
                $profileData = $file->getClientOriginalName() . "_" . date('YmdHis') . "." . $file->getClientOriginalExtension();
                $file->move($destinationPath, $profileData);
                $input['file'] = "$profileData";
            } else {
                unset($input['file']);
            }

            $buku = Buku::where('isbn', $isbn);
            $buku->update($input);
            toast('Data buku berhasil diupdate!', 'success');

            return redirect()->route('buku.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($isbn)
    {
        $data = Buku::where('isbn', '=', $isbn)->first();
        File::delete('img/' . $data->gambar);
        File::delete('data/' . $data->file);

        Buku::where('isbn', '=', $isbn)->delete();
        toast('Data buku berhasil dihapus!', 'success');

        return redirect()->route('buku.index');
    }
}
