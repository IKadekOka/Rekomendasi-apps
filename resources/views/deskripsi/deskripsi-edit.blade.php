@extends('layout.main')

@section('content')
<h3>Edit Skala Deskripsi</h3>
<div class="form-login">
  <a href="{{route('deskripsi.deskripsi',['id' => $skala_deskripsis->sub_kriteria_id])}}" class="btn-close">×</a>
  <form action="{{route('deskripsi.deskripsi-update', ['id'=>$skala_deskripsis->id])}}" method="POST">
    @csrf
    @method('put')
    <label >Nilai </label>
    <input class="input" type="text" name="nilai" id="nilai" placeholder="nilai"
      value="{{ old('nilai', $skala_deskripsis->nilai) }}" />
    <label for="bobot">bobot</label>
    <input class="input" type="text" name="deskripsi" id="deskripsi" placeholder="deskripsi"
      value="{{ old('deskripsi', $skala_deskripsis->deskripsi) }}" />
    @error('deskripsi')
    <p style="font-size: 10px; color: red">{{ $message }}</p>
    @enderror

    <button type="submit" class="btn btn-simpan" name="edit" style="margin-top: 50px">
      Edit
    </button>
  </form>
</div>
@endsection
