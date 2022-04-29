<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        /**
         * Melakukan Pengecekan Session pada Jenis Kucing
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
            $query->where('judul', 'like', "%{$request->keyword}%");
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $request->validate([
            'isbn'=>'required',
            'judul'=>'required',
            'kategori'=>'required',
            'tingkatan'=>'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'file'=>'required|mimes:pdf,xlx,csv|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('gambar')) {
            $destinationPath = 'img/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['gambar'] = "$profileImage";
        } else if ($file = $request->file('file')) {
            $destinationPath = 'data/';
            $profileData = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $profileData);
            $input['file'] = "$profileData";
        }

        Buku::create($input);

       return redirect()->route('buku.index')
           ->with('success', 'Data Buku berhasil dibuat!.');

    //    return view('buku.index', ['buku'=> $input]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Buku $buku)
    {
        return view('buku.edit', compact('buku'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Buku $buku)
    {
        $request->validate([
            'isbn'=>'required',
            'judul'=>'required',
            'kategori'=>'required',
            'tingkatan'=>'required',
            'file'=>'required',
        ]);

        $input = $request->all();

        if ($image = $request->file('gambar')) {
            $destinationPath = 'img/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['gambar'] = "$profileImage";
        } else {
            unset($input['gambar']);
        }

        $buku->update($input);

        return redirect()->route('buku.index')
            ->with('success', 'Data Buku berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buku $buku)
    {
        // hintnya sama kayak fungsi update, cuma 1 baris ajah kalau udah ketemu apus komen ini

        return redirect()->route('buku.index')
            ->with('success', 'Data buku berhasil dihapus!');
    }

}
