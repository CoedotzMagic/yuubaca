@extends('buku.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Lihat Buku</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('buku.index') }}"> Kembali</a>
        </div>
    </div>
</div>
@php
    $buku = \Illuminate\Support\Facades\DB::table('buku')->where('isbn', $isbn)->first();
@endphp

<div class="row">
    <!-- PDF -->
    <object data="/data/{{ $buku->file }}" type="application/pdf" width="100%" height="800px">
        <p>Yah, karena browser ini tidak dilengkapi plugin, jadi alternatifnya anda bisa <a href="/data/{{ $buku->file }}">Klik untuk mengunduh Buku.</a></p>
    </object>
    <!-- PDF -->

</div>
@endsection
