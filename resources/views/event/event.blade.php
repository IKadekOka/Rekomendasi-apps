@extends('layout.main')

@section('content')
<div >
    <h2 style="margin-top: 20px">Data Event</h2>
   <button type="button" style="margin-top: 20px" class="btn btn-tambah">
    <a href="{{route('event.event-entry')}}">Tambah Data</a>
  </button>
   <table style="margin-top: 10px" class="table-data">
        <thead>
          <tr>
            <th >No</th>
            <th style="width: 20%">Lokasi Event</th>
            <th style="width: 20%">Nama Event</th>
            <th style="width: 20%">Tanggal Mulai</th>
            <th style="width: 20%">Tanggal Berakhir</th>
            <th style="width: 20%">Deskripsi</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($event as $event )
          <tr>
            <td>{{$loop->index+1}}</td>
            <td>{{$event->alternatif->nama}}</td>
            <td>{{$event->nama}}</td>
            <td>{{$event->tanggal_mulai}}</td>
            <td>{{$event->tanggal_berakhir}}</td>
            <td>{{$event->deskripsi}}</td>
            <td>
              <a href="{{ route('event.event-edit', ['id' => $event->id]) }}" class="btn btn-edit" style="display: inline-block;">
                <img src="{{ asset('assets/edit.png') }}" alt="Edit" style="width:24px; height:24px;">
              </a>
              <a href="{{ route('event.hapus', $event->id) }}"
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