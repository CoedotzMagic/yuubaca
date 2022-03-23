<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class BukuController extends Controller
{

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
            'file'=>'required',
        ]);

        $input = $request->all();

        if ($image = $request->file('gambar')) {
            $destinationPath = 'img/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['gambar'] = "$profileImage";
        }

        BukuController::create($input);

        return redirect()->route('dashboard')
            ->with('success', 'Data Buku berhasil dibuat!.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(BukuController $bukucontroller)
    {
        return view('bukucontroller.edit', compact('bukucontroller'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BukuController $bukucontroller)
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

        $bukucontroller->update($input);

        return redirect()->route('dashboard')
            ->with('success', 'Data Buku berhasil diperbarui!');
    }

}
