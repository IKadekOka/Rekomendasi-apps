@extends('layout.main')

@section('content')
    <div style="margin-bottom: 50px;">
        <h2 style="margin-top: 20px">Data Sub Kreteria</h2>
        <button type="button" style="margin-top: 20px" class="btn btn-tambah">
            <a href="{{ route('sub_kriteria.sub_kriteria-entry') }}">Tambah Data</a>
        </button>
        <table style="margin-top: 10px" class="table-data">
            <thead>
                <tr>
                    <th>No</th>
                    <th style="width: 20%">Nama Sub Kriteria</th>
                    <th style="width: 20%">Kriteria</th>
                    <th style="width: 20%">Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subkriteria as $subkriteria)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $subkriteria->nama }}</td>
                        <td>{{ $subkriteria->kriteria->nama }}</td>
                        <td>{{ $subkriteria->type }}</td>
                        <td>
                            <a href="{{ route('sub_kriteria.sub_kriteria-edit', ['id' => $subkriteria->id]) }}"
                                class="btn btn-edit" style="display: inline-block;">
                                <i class='bx bxs-edit' style="font-size: 18px;"></i>
                            </a>
                            <a href="{{ route('sub_kriteria.hapus', $subkriteria->id) }}"
                                onclick="return confirm('Yakin ingin menghapus data ini?')" class="btn btn-hapus"
                                style="display: inline-block;">
                                <i class='bx bxs-trash' style="font-size: 18px;"></i>
                            </a>
                            @if ($subkriteria->type == 'skala')
                                <a href="{{ route('deskripsi.deskripsi', ['id' => $subkriteria->id]) }}"
                                    class="btn btn-r" style="display: inline-block;">
                                    <i class='bx bx-reset' style=" font-size: 18px;" ></i>
                                </a>
                            @endif
                        </td>
                    </tr>
                @endforeach
        </table>
    </div>
@endsection
