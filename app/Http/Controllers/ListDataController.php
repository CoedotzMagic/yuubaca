<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class ListDataController extends Controller
{
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
        $listdata    = Buku::when($request->keyword, function ($query) use ($request) {
            $query->where('judul', 'like', "%{$request->keyword}%")
                ->orWhere('isbn', 'like', "%{$request->keyword}%");
        })->orderBy('created_at', 'desc')->paginate($pagination);

        $listdata->appends($request->only('keyword'));

        return view('listdata.index', compact('listdata'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function show($isbn)
    {
        return view('listdata.show', compact('isbn'));
    }
}
