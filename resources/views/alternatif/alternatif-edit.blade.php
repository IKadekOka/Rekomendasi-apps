@extends('layout.main')

@section('content')
<h3>Input Data Alternatif</h3>
<div class="form-login " >
  <a href="{{ route('alternatif.alternatif') }}" class="btn-close">×</a>
  <form action="{{ route('alternatif.alternatif-update',['id'=>$alternatifs->id]) }}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="nama">Nama Wisata</label>
    <input class="input" type="text" name="nama" id="nama" placeholder="nama" value="{{ old('nama', $alternatifs->nama) }}" />
    @error('nama')
    <p style="font-size: 10px; color: red">{{ $message }}</p>
    @enderror
    <label for="lokasi">Lokasi</label>
    <input class="input" type="text" name="lokasi" id="lokasi" placeholder="lokasi" value="{{ old('lokasi', $alternatifs->lokasi) }}" />
    @error('lokasi')
    <p style="font-size: 10px; color: red">{{ $message }}</p>
    @enderror
    <label for="latitude">Latitude</label>
    <input class="input" type="text" name="latitude" id="latitude" placeholder="latitude" value="{{ old('latitude', $alternatifs->latitude) }}" />
    @error('latitude')
    <p style="font-size: 10px; color: red">{{ $message }}</p>
    @enderror
    <label for="longitude">longitude</label>
    <input class="input" type="text" name="longitude" id="longitude" placeholder="longitude" value="{{ old('longitude', $alternatifs->longitude) }}" />
    @error('longitude')
    <p style="font-size: 10px; color: red">{{ $message }}</p>
    @enderror
    <button type="submit" class="btn btn-simpan" name="simpan" style="margin-top: 50px">
      Simpan
    </button>
  </form>
</div>
@endsection