@extends('layout.main')

@section('content')
<div >
    <h2 style="margin-top: 20px">Data Alternatif</h2>
   <button type="button" style="margin-top: 20px" class="btn btn-tambah">
    <a href="{{route('data_alternatif.alternatif-entry')}}">Tambah Data</a>
  </button>
  <button type="button" class="btn btn-primary">
    <a href="">Cetak</a>
  </button>
   <table style="margin-top: 10px" class="table-data">
        <thead>
          <tr>
            <th >No</th>
            <th style="width: 20%">Nama Wisata</th>
            <th style="width: 20%">Kategori</th>
            <th style="width: 20%">Harga Tiket Masuk</th>
            <th style="width: 20%">Estimasi Biaya Transportasi</th>
            <th style="width: 20%">Estimasi Penginapan</th>
            <th style="width: 20%">Biaya Konsumsi</th>
            <th style="width: 20%">Parkir</th>
            <th style="width: 20%">Toilet</th>
            <th style="width: 20%">Tempat Difabel</th>
            <th style="width: 20%">Jarak</th>
            <th style="width: 20%">Tersedia Transportasi</th>
            <th style="width: 20%">Kondisi Jalan</th>
            <th style="width: 20%">Rating</th>
            <th style="width: 20%">Jumlah Kunjungan</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($alternatif as $alternatif )
          <tr>
            <td>{{$loop->index+1}}</td>
            <td>{{$alternatif->nama_wisata}}</td>
            <td>{{$alternatif->kategori}}</td>
            <td>Rp {{ number_format($alternatif->harga_tiket, 0, ',', '.') }}</td>
            <td>Rp {{ number_format($alternatif->estimasi_transport, 0, ',', '.') }}</td>
            <td>Rp {{ number_format($alternatif->estimasi_penginapan, 0, ',', '.') }}</td>
            <td>Rp {{ number_format($alternatif->konsumsi, 0, ',', '.') }}</td>
            <td>{{$alternatif->parkir}}</td>
            <td>{{$alternatif->toilet}}</td>
            <td>{{$alternatif->tempat_difabel}}</td>
            <td>{{$alternatif->jarak}} km</td>
            <td>{{$alternatif->tersedia_transportasi}}</td>
            <td>{{$alternatif->jarak}}</td>
            <td>{{$alternatif->rating}}</td>
            <td>{{$alternatif->jumlah_kunjungan}}</td>

            <td>
              <button type="button" class="btn btn-edit">
                <a href="">Edit</a>
              </button>
              <a href="{{ route('alternatif.hapus', $alternatif->id) }}" onclick="return confirm('Yakin ingin menghapus data ini?')" class="btn btn-danger">Hapus</a>
              
            </td>
          </tr>      
          @endforeach
    </table>
</div>
@endsection