@extends('layout.main')

@section('content')
<h3>Input Data Alternatif</h3>
<div class="form-login " >
  <form action="{{ route('data_alternatif.alternatif-store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="nama_wisata">Nama Wisata</label>
    <input class="input" type="text" name="nama_wisata" id="nama_wisata" placeholder="nama_wisata" value="{{ old('nama_wisata') }}" />
    @error('nama_wisata')
    <p style="font-size: 10px; color: red">{{ $message }}</p>
    @enderror
    <label for="kategori">Kategori</label>
    <select class="input" for="kategori"  name="kategori" id="kategori" placeholder="kategori" value="{{ old('kategori') }}">
        <option selected>Kategori wisata</option>
        <option value="Budaya">Wisata Budaya</option>
        <option value="Adventure">Wisata Adventure</option>
        <option value="Spiritual">Wisata Spiritual</option>
        <option value="Edukasi">Wisata Edukasi</option>
    </select>    

    <label for="harga_tiket">Harga Tiket Masuk</label>
    <input class="input" type="text" name="harga_tiket" id="harga_tiket" placeholder="harga_tiket" value="{{ old('harga_tiket') }}" />
    @error('harga_tiket')
    <p style="font-size: 10px; color: red">{{ $message }}</p>
    @enderror

    <label for="estimasi_transport">Estimasi Biaya Transportasi</label>
    <input class="input" type="text" name="estimasi_transport" id="estimasi_transport" placeholder="estimasi_transport" value="{{ old('estimasi_transport') }}" />
    @error('estimasi_transport')
    <p style="font-size: 10px; color: red">{{ $message }}</p>
    @enderror

    <label for="estimasi_penginapan">Estimasi Biaya Penginapan</label>
    <input class="input" type="text" name="estimasi_penginapan" id="estimasi_penginapan" placeholder="estimasi_penginapan" value="{{ old('estimasi_penginapan') }}" />
    @error('estimasi_penginapan')
    <p style="font-size: 10px; color: red">{{ $message }}</p>
    @enderror

    <label for="konsumsi">Biaya Konsumsi</label>
    <input class="input" type="text" name="konsumsi" id="konsumsi" placeholder="konsumsi" value="{{ old('konsumsi') }}" />
    @error('konsumsi')
    <p style="font-size: 10px; color: red">{{ $message }}</p>
    @enderror

    <label for="parkir">Parkir</label>
    <select class="input" for="parkir"  name="parkir" id="parkir" placeholder="parkir" value="{{ old('parkir') }}">
      <option selected>parkir wisata</option>
      <option value="Buruk">Buruk (Area parkir sempit atau tidak tersedia, tidak tertata, tidak ada petugas parkir.)</option>
      <option value="Cukup">Cukup(Area parkir tersedia namun terbatas, kurang tertata .)</option>
      <option value="Baik">Baik(Area parkir luas, tertata rapi, aman, akses mudah ke lokasi wisata.)</option>
  </select> 

    <label for="toilet">Toilet</label>
    <select class="input" for="toilet"  name="toilet" id="toilet" placeholder="toilet" value="{{ old('toilet') }}">
      <option selected>Toilet</option>
      <option value="Buruk">Buruk (Toilet kotor, air tidak tersedia atau sangat terbatas, fasilitas minim atau rusak, tidak nyaman digunakan)</option>
      <option value="Cukup">Cukup(Toilet cukup bersih, air tersedia meskipun kadang terbatas, fasilitas ada namun kurang lengkap)</option>
      <option value="Baik">Baik(Toilet bersih, air dan fasilitas pendukung tersedia, pencahayaan baik, nyaman dan layak digunakan)</option>
  </select> 

    <label for="tempat_difabel">Tempat Untuk Difabel</label>
    <select class="input" for="tempat_difabel"  name="tempat_difabel" id="tempat_difabel" placeholder="tempat_difabel" value="{{ old('tempat_difabel') }}">
        <option >Tempat Difabel</option>
        <option value="Tidak Tersedia">Tidak Tersedia</option>
        <option value="Tersedia">Tersedia</option>
    </select>

    <label for="jarak">Jarak dari Pusat Kota</label>
    <input class="input" type="text" name="jarak" id="jarak" placeholder="jarak" value="{{ old('jarak') }}" />
    @error('jarak')
    <p style="font-size: 10px; color: red">{{ $message }}</p>
    @enderror

    <label for="tersedia_transportasi">Tersedia Transportasi</label>
    <select class="input" for="tersedia_transportasi"  name="tersedia_transportasi" id="tersedia_transportasi" placeholder="tersedia_transportasi" value="{{ old('tersedia_transportasi') }}">
        <option selected>Tempat Difabel</option>
        <option value="Tidak Tersedia">Tidak Tersedia</option>
        <option value="Tersedia">Tersedia</option>
    </select>

    <label for="kondisi_jalan">Kondisi Jalan</label>
    <select class="input" for="kondisi_jalan"  name="kondisi_jalan" id="kondisi_jalan" placeholder="kondisi_jalan" value="{{ old('kondisi_jalan') }}">
        <option selected>Tempat Difabel</option>
        <option value="Buruk">Buruk (Jalan rusak, berlubang, tidak ada pengaspalan, sulit dilalui, atau jalur utama terhalang)</option>
        <option value="Cukup">Cukup (Jalan dalam kondisi sedang, ada beberapa kerusakan atau lubang, tapi masih dapat dilalui kendaraan dengan hati-hati.)</option>
        <option value="Baik">Baik (Jalan mulus, terawat, pengaspalan baik, tidak ada kerusakan atau hambatan, aman dan mudah dilalui.)</option>
    </select>

    <label for="rating">rating</label>
    <input class="input" type="text" name="rating" id="rating" placeholder="rating" value="{{ old('rating') }}" />
    @error('rating')
    <p style="font-size: 10px; color: red">{{ $message }}</p>
    @enderror

    <label for="jumlah_kunjungan">jumlah_kunjungan</label>
    <input class="input" type="text" name="jumlah_kunjungan" id="jumlah_kunjungan" placeholder="jumlah_kunjungan" value="{{ old('jumlah_kunjungan') }}" />
    @error('jumlah_kunjungan')
    <p style="font-size: 10px; color: red">{{ $message }}</p>
    @enderror

    <button type="submit" class="btn btn-simpan" name="simpan" style="margin-top: 50px">
      Simpan
    </button>
  </form>
</div>
@endsection