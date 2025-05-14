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
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($alternatifs as $alternatif )
          <tr>
            <td>{{$loop->index+1}}</td>
            <td>{{$alternatif->nama}}</td>
            <td>{{$alternatif->lokasi}}</td>
            <td>{{$alternatif->latitude}}</td>
            <td>{{$alternatif->longitude}}</td>
            {{-- <td>Rp {{ number_format($alternatif->harga_tiket, 0, ',', '.') }}</td>
            <td>Rp {{ number_format($alternatif->estimasi_transport, 0, ',', '.') }}</td> --}}
            <td>
              <a href="{{ route('data_alternatif.alternatif-edit', ['id' => $alternatif->id]) }}" class="btn btn-edit" style="display: inline-block;">
                <img src="{{ asset('assets/edit.png') }}" alt="Edit" style="width:24px; height:24px;">
              </a>
              <a href="{{ route('alternatif.hapus', $alternatif->id) }}"
                  onclick="return confirm('Yakin ingin menghapus data ini?')"
                  class="btn btn-hapus" style="display: inline-block;">
                   <img src="{{ asset('assets/delete.png') }}" alt="Hapus" style="width:24px; height:24px;">
              </a>
               
            </td>
          </tr>      
          @endforeach
    </table>
</div>
@endsection