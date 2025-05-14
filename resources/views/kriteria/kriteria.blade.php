@extends('layout.main')

@section('content')
    <div>
        <h2 style="margin-top: 20px">Data Kreteria</h2>
        <table style="margin-top: 10px" class="table-data">
            <button type="button" style="margin-top: 20px" class="btn btn-tambah">
                <a href="{{ route('kriteria.kriteria-entry') }}">Tambah Data</a>
            </button>
            <thead>
                <tr>
                    <th>No</th>
                    <th style="width: 20%">Nama Kreteria</th>
                    <th style="width: 20%">Bobot</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kriteria as $kriteria)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $kriteria->nama }}</td>
                        <td>{{ $kriteria->bobot }}</td>

                        <td>
                            <a href="{{ route('kriteria.kriteria-edit', ['id' => $kriteria->id]) }}" class="btn btn-edit"
                                style="display: inline-block;">
                                <i class='bx bxs-edit' style="font-size: 18px;"></i>
                            </a>
                            <a href="{{ route('kriteria.hapus', $kriteria->id) }}"
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
