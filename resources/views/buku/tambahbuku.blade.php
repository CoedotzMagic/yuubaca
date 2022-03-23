<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Data Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="post" action="{{ route('tambah.buku') }}">
                        <x-validation-errors class="mb-4" :errors="$errors" />
                        @method('PUT')
                        @csrf
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="isbn">ISBN</label>
                                <input type="text" class="form-control" id="isbn" name="isbn" placeholder="ISBN" value="{{ old('isbn') }}" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="judul">Judul</label>
                                <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul" value="{{ old('judul') }}" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="Kategori">Kategori</label>
                                <select class="custom-select" id="Kategori" name="kategori">
                                    <option value="IPA">IPA</option>
                                    <option value="IPS">IPS</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="tingkatan">Tingkatan</label>
                                <select class="custom-select" id="tingkatan" name="tingkatan">
                                    <option value="SD">SD/MA</option>
                                    <option value="SMP">SMP/MTS</option>
                                    <option value="SMA">SMA/SMK</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="gambar">Gambar</label>
                                <input type="file" accept="image/*" class="form-control" id="gambar" name="gambar" value="" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="file">File</label>
                                <input type="file" accept="application/pdf" class="form-control" id="file" name="file" value="" required>
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-primary" type="submit">Tambah Data</button>
                        <a class="btn btn-secondary" href="{{ route('dashboard') }}"> Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
