@extends('layout.main')

@section('content')
    <h3>Input Data Alternatif</h3>
    <div class="form-login ">
        <a href="{{ route('kategori.kategori') }}" class="btn-close">×</a>
        <form action="{{ route('kategori.kategori-update', ['id' => $kategori->id]) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            <label for="nama">Nama Wisata</label>
            <input class="input" type="text" name="nama" id="nama" placeholder="nama"
                value="{{ old('nama', $kategori->nama) }}" />
            @error('nama')
                <p style="font-size: 10px; color: red">{{ $message }}</p>
            @enderror
            <label for="deskripsi">Deskripsi</label>
            <input class="input" type="text" name="deskripsi" id="deskripsi" placeholder="deskripsi" value="{{old('deskripsi',$kategori->deskripsi)}}" />
            @error('deskripsi')
                <p style="font-size: 10px; color: red">{{ $message }}</p>
            @enderror
            <button type="submit" class="btn btn-simpan" name="simpan" style="margin-top: 50px">
                Simpan
            </button>
        </form>
    </div>
@endsection
