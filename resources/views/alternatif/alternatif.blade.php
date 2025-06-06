@extends('layout.main')

@section('content')
    <div style="margin-bottom: 50px;">
        <h2 style="margin-top: 10px; ">Data Alternatif</h2>
        <table style="margin-top: 10px" class="table-data">
            <button type="button" style="margin-top: 20px" class="btn btn-tambah">
                <a href="{{ route('alternatif.alternatif-entry') }}">Tambah Data</a>
            </button>
            <thead>
                <tr>
                    <th>No</th>
                    <th style="width: 20%">Nama </th>
                    <th style="width: 20%">Lokasi</th>
                    <th style="width: 20%">Kategori</th>
                    <th style="width: 20%">Latitude</th>
                    <th style="width: 20%">Longitude</th>
                    <th style="width: 20%">Gambar</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alternatifs as $alternatif)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $alternatif->nama }}</td>
                        <td>{{ $alternatif->lokasi }}</td>
                        <td>{{ $alternatif->kategori->nama }}</td>
                        <td>{{ $alternatif->latitude }}</td>
                        <td>{{ $alternatif->longitude }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $alternatif->gambar) }}" alt="Gambar" style="width: 100px; height: auto; border-radius: 8px;">
                        </td>
                        <td>
                            <a href="{{ route('alternatif.alternatif-edit', ['id' => $alternatif->id]) }}"
                                class="btn btn-edit" style="display: inline-block;">
                                <i class='bx bxs-edit' style="font-size: 18px;"></i>
                            </a>
                            <a href="{{ route('alternatif.hapus', $alternatif->id) }}"
                                onclick="return confirm('Yakin ingin menghapus data ini?')" class="btn btn-hapus"
                                style="display: inline-block;">
                                <i class='bx bxs-trash' style="font-size: 18px;"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
        </table>
    </div>
@endsection
