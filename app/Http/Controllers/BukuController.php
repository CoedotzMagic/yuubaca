<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class BukuController extends Controller
{
    public function store(Request $request) {

        $request->validate([
            'isbn'=>'required',
            'judul'=>'required',
            'kategori'=>'required',
            'tingkatan'=>'required',
            'file'=>'required',
        ],[
            'isbn.required' => 'ISBN harus diisi',
            'judul.required' => 'Judul harus diisi',
            'kategori.required' => 'kategori harus diisi',
            'tingkatan.required' => 'tingkatan harus diisi',
            'file.required' => 'file harus diisi',
        ]);

        try {
            DB::table('buku')->insert([
                'isbn' => "$request->isbn",
                'judul' => "$request->judul",
                'kategori' => "$request->kategori",
                'tingkatan' => "$request->tingkatan",
                'gambar' => "$request->gambar",
                'file' => "$request->file"
            ]);
            toast('Data berhasil Ditambahkan!', 'success');
            return back();
        } catch (\Exception $e) {
            Alert::error('Error', $e->getMessage());
            return back();
        }
    }
}
