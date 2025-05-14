@extends('layout.main')

@section('content')
<h3>Input Data Sub Kriteria</h3>
<div class="form-login " >
  <a href="{{ route('sub_kriteria.sub_kriteria') }}" class="btn-close">×</a>
  <form action="{{route('sub_kriteria.sub_kriteria-store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="nama">Nama</label>
    <input class="input" type="text" name="nama" id="nama" placeholder="nama" value="" />
    @error('nama')
    <p style="font-size: 10px; color: red">{{ $message }}</p>
    @enderror
    <select class="input" for="kriteria"  name="kriteria_id" id="kriteria" placeholder="kriteria" value="">
        @foreach ($kriteria as $kriteria )
        <option value="{{$kriteria->id}}">{{$kriteria->nama}}</option>
        @endforeach
    </select>
    <select class="input" for="type"  name="type" id="type" placeholder="type" value="">
      <option value="">-- Pilih Tipe --</option>
      <option value="nominal" {{ old('type', $subKriteria->type ?? '') == 'nominal' ? 'selected' : '' }}>Nominal</option>
      <option value="skala" {{ old('type', $subKriteria->type ?? '') == 'skala' ? 'selected' : '' }}>Skala</option>
  </select> 
    <button type="submit" class="btn btn-simpan" name="simpan" style="margin-top: 50px">
      Simpan
    </button>
  </form>
</div>
@endsection