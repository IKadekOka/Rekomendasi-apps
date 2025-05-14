@extends('layout.main')

@section('content')
<h3>Input Data Alternatif</h3>
<div class="form-login " >
  <form action="{{ route('data_alternatif.alternatif-update',['id'=>$alternatif->id]) }}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="nama_wisata">Nama Wisata</label>
    <input class="input" type="text" name="nama_wisata" id="nama_wisata" placeholder="nama_wisata" value="{{ old('nama_wisata', $alternatif->nama_wisata) }}" />
    @error('nama_wisata')
    <p style="font-size: 10px; color: red">{{ $message }}</p>
    @enderror
    <label for="kategori">Kategori</label>
    <select class="input" for="kategori"  name="kategori" id="kategori" placeholder="kategori" value="{{ old('kategori', $alternatif->kategori) }}">
        <option selected>Kategori wisata</option>
        <option value="Budaya">Wisata Budaya</option>
        <option value="Adventure">Wisata Adventure</option>
        <option value="Spiritual">Wisata Spiritual</option>
        <option value="Edukasi">Wisata Edukasi</option>
    </select>    

    <label for="harga_tiket">Harga Tiket Masuk</label>
    <input class="input" type="text" name="harga_tiket" id="harga_tiket" placeholder="harga_tiket" value="{{ old('harga_tiket', $alternatif->harga_tiket) }}" />
    @error('harga_tiket')
    <p style="font-size: 10px; color: red">{{ $message }}</p>
    @enderror

    <label for="estimasi_transport">Estimasi Biaya Transportasi</label>
    <input class="input" type="text" name="estimasi_transport" id="estimasi_transport" placeholder="estimasi_transport" value="{{ old('estimasi_transport', $alternatif->estimasi_transport) }}" />
    @error('estimasi_transport')
    <p style="font-size: 10px; color: red">{{ $message }}</p>
    @enderror

    <label for="estimasi_penginapan">Estimasi Biaya Penginapan</label>
    <input class="input" type="text" name="estimasi_penginapan" id="estimasi_penginapan" placeholder="estimasi_penginapan" value="{{ old('estimasi_penginapan', $alternatif->estimasi_penginapan) }}" />
    @error('estimasi_penginapan')
    <p style="font-size: 10px; color: red">{{ $message }}</p>
    @enderror

    <label for="konsumsi">Biaya Konsumsi</label>
    <input class="input" type="text" name="konsumsi" id="konsumsi" placeholder="konsumsi" value="{{ old('konsumsi', $alternatif->konsumsi) }}" />
    @error('konsumsi')
    <p style="font-size: 10px; color: red">{{ $message }}</p>
    @enderror

    <label for="parkir">Parkir</label>
    <input class="input" type="text" name="parkir" id="parkir" placeholder="parkir" value="{{ old('parkir', $alternatif->parkir) }}" />
    @error('parkir')
    <p style="font-size: 10px; color: red">{{ $message }}</p>
    @enderror

    <label for="toilet">Toilet</label>
    <input class="input" type="text" name="toilet" id="toilet" placeholder="toilet" value="{{ old('toilet', $alternatif->toilet) }}" />
    @error('toilet')
    <p style="font-size: 10px; color: red">{{ $message }}</p>
    @enderror

    <label for="tempat_difabel">Tempat Untuk Difabel</label>
    <select class="input" for="tempat_difabel"  name="tempat_difabel" id="tempat_difabel" placeholder="tempat_difabel" value="{{ old('tempat_difabel', $alternatif->tempat_difabel) }}">
        <option >Tempat Difabel</option>
        <option value="1">Tidak Tersedia</option>
        <option value="2">Tersedia</option>
    </select>

    <label for="jarak">Jarak dari Pusat Kota</label>
    <input class="input" type="text" name="jarak" id="jarak" placeholder="jarak" value="{{ old('jarak', $alternatif->jarak) }}" />
    @error('jarak')
    <p style="font-size: 10px; color: red">{{ $message }}</p>
    @enderror

    <label for="tersedia_transportasi">Tersedia Transportasi</label>
    <select class="input" for="tersedia_transportasi"  name="tersedia_transportasi" id="tersedia_transportasi" placeholder="tersedia_transportasi" value=" {{ old('tersedia_transportasi', $alternatif->tersedia_transportasi) }}">
        <option selected>Tempat Difabel</option>
        <option value="1">Tidak Tersedia</option>
        <option value="2">Tersedia</option>
    </select>

    <label for="kondisi_jalan">Kondisi Jalan</label>
    <select class="input" for="kondisi_jalan"  name="kondisi_jalan" id="kondisi_jalan" placeholder="kondisi_jalan" value="{{ old('kondisi_jalan', $alternatif->kondisi_jalan)}}">
        <option selected>Tempat Difabel</option>
        <option value="1">Tidak Tersedia</option>
        <option value="2">Tersedia</option>
    </select>

    <label for="rating">rating</label>
    <input class="input" type="text" name="rating" id="rating" placeholder="rating" value="{{ old('rating', $alternatif->rating) }}" />
    @error('rating')
    <p style="font-size: 10px; color: red">{{ $message }}</p>
    @enderror

    <label for="jumlah_kunjungan">jumlah_kunjungan</label>
    <input class="input" type="text" name="jumlah_kunjungan" id="jumlah_kunjungan" placeholder="jumlah_kunjungan" value="{{ old('jumlah_kunjungan', $alternatif->jumlah_kunjungan) }}" />
    @error('jumlah_kunjungan')
    <p style="font-size: 10px; color: red">{{ $message }}</p>
    @enderror

    <button type="submit" class="btn btn-simpan" name="simpan" style="margin-top: 50px">
      Simpan
    </button>
  </form>
</div>
@endsection