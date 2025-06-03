@extends('layout.main')

@section('content')
    <h3>Input Data Alternatif</h3>
    <div class="form-login ">
        <a href="{{ route('alternatif.alternatif') }}" class="btn-close">×</a>
        <form action="{{ route('alternatif.alternatif-store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="nama">Nama</label>
            <input class="input" type="text" name="nama" id="nama" placeholder="nama" value="" />
            @error('nama')
                <p style="font-size: 10px; color: red">{{ $message }}</p>
            @enderror
            <label for="lokasi">lokasi</label>
            <input class="input" type="text" name="lokasi" id="lokasi" placeholder="lokasi" value="" />
            @error('lokasi')
                <p style="font-size: 10px; color: red">{{ $message }}</p>
            @enderror
            <label for="kategori">kategori</label>
            <select class="input" for="kategori" name="kategori_id" id="kategori_id" placeholder="kategori" value="">
                <option value="">-- Pilih Kategori --</option>
                @foreach ($kategori as $kt)
                    <option value="{{ $kt->id }}">{{ $kt->nama }}</option>
                @endforeach
            </select>
            <label for="latitude">latitude</label>
            <input class="input" type="text" name="latitude" id="latitude" placeholder="latitude" value="" />
            @error('latitude')
                <p style="font-size: 10px; color: red">{{ $message }}</p>
            @enderror
            <label for="longitude">longitude</label>
            <input class="input" type="text" name="longitude" id="longitude" placeholder="longitude" value="" />
            @error('longitude')
                <p style="font-size: 10px; color: red">{{ $message }}</p>
            @enderror
            <div>
                <label for="gambar">Gambar:</label>
                <input type="file" name="gambar" id="gambar" accept="image/*" required>
            </div>


            <button type="submit" class="btn btn-simpan" name="simpan" style="margin-top: 50px">
                Simpan
            </button>
        </form>
    </div>
@endsection

