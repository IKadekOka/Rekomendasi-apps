@extends('layout.main')

@section('content')
    <h3>Input Data Kategori</h3>
    <div class="form-login ">
        <a href="{{ route('kategori.kategori') }}" class="btn-close">×</a>
        <form action="{{ route('kategori.kategori-store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="nama">Nama</label>
            <input class="input" type="text" name="nama" id="nama" placeholder="nama" value="" />
            @error('nama')
                <p style="font-size: 10px; color: red">{{ $message }}</p>
            @enderror
            <label for="deskripsi">Deskripsi Kategori</label>
            <textarea class="input" name="deskripsi" id="deskripsi" cols="30" rows="10"></textarea>
            @error('deskripsi')
                <p style="font-size: 10px; color: red">{{ $message }}</p>
            @enderror
            <button type="submit" class="btn btn-simpan" name="simpan" style="margin-top: 50px">
                Simpan
            </button>
        </form>
    </div>
@endsection
