@extends('layout.main')

@section('content')
<h3>Edit Data Kreteria</h3>
<div class="form-login">
  <a href="{{ route('kriteria.kriteria') }}" class="btn-close">×</a>
  <form action="{{route('kriteria.kriteria-update', ['id'=>$kriteria->id])}}">
    @csrf
    @method('put')
    <label >Nama Kriteria</label>
    <input class="input" type="text" name="nama" id="nama" placeholder="nama"
      value="{{ old('nama', $kriteria->nama) }}" />

    <label for="bobot">bobot</label>
    <input class="input" type="text" name="bobot" id="bobot" placeholder="bobot"
      value="{{ old('bobot', $kriteria->bobot) }}" />
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

    <button type="submit" class="btn btn-simpan" name="edit" style="margin-top: 50px">
      Edit
    </button>
  </form>
</div>
@endsection
