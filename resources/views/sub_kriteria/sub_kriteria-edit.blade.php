@extends('layout.main')

@section('content')
<h3>Edit Sub Kreteria</h3>
<div class="form-login">
  <a href="{{ route('sub_kriteria.sub_kriteria') }}" class="btn-close">×</a>
  <form action="{{route('sub_kriteria.sub_kriteria-update', ['id'=>$subkriteria->id])}}">
    @csrf
    @method('put')
    <label >Nama</label>
    <input class="input" type="text" name="nama" id="nama" placeholder="nama"
      value="{{ old('nama', $subkriteria->nama) }}" />

    <label for="kriteria">kriteria</label>
    <select class="input" for="kriteria"  name="kriteria_id" id="kriteria" placeholder="kriteria" value="">
        @foreach ($kriteria as $kriteria )
        <option value="{{$kriteria->id}}">{{$kriteria->nama}}</option>
        @endforeach
    </select>
    <select class="input" for="type"  name="type" id="type" placeholder="type" value="">
      <option value="">-- Pilih Tipe --</option>
      <option value="nominal" {{ $subkriteria->type == 'nominal' ? 'selected' : '' }}>Nominal</option>
      <option value="skala" {{ $subkriteria->type == 'skala' ? 'selected' : '' }}>Skala</option>
  </select> 
    @error('bobot')
    <p style="font-size: 10px; color: red">{{ $message }}</p>
    @enderror

    <button type="submit" class="btn btn-simpan" name="edit" style="margin-top: 50px">
      Edit
    </button>
  </form>
</div>
@endsection
