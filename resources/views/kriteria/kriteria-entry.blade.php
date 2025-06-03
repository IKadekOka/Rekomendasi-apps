@extends('layout.main')

@section('content')
<h3>Input Data Kriteria</h3>
<div class="form-login " >
  <a href="{{ route('kriteria.kriteria') }}" class="btn-close">×</a>
  <form action="{{route('kriteria.kriteria-store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="nama">Nama</label>
    <input class="input" type="text" name="nama" id="nama" placeholder="nama" value="" />
    @error('nama')
    <p style="font-size: 10px; color: red">{{ $message }}</p>
    @enderror

    <label for="bobot">Bobot</label>
    <input class="input" type="text" name="bobot" id="bobot" placeholder="bobot" value="" />
    @error('bobot')
    <p style="font-size: 10px; color: red">{{ $message }}</p>
    @enderror

    <label for="type">Type</label>
    <select class="input" for="type" name="type" id="type" placeholder="type" value="">
      <option value="">-- Pilih Type --</option>
      <option value="cost" {{ old('type', $kriteria->type ?? '') == 'cost' ? 'selected' : '' }}>cost
      </option>
      <option value="benefit" {{ old('type', $kriteria->type ?? '') == 'benefit' ? 'selected' : '' }}>benefit
      </option>
  </select>
    <button type="submit" class="btn btn-simpan" name="simpan" style="margin-top: 50px">
      Simpan
    </button>
  </form>
</div>
@endsection