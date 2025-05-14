@extends('layout.main')

@section('content')
    <div>
        <h2 style="margin-top: 20px">Nilai Alternatif</h2>
        <button type="button" style="margin-top: 20px" class="btn btn-tambah">
            <a href="{{ route('nilai_alternatif.nilai_alternatif-entry') }}">Tambah Data</a>
        </button>
        <table style="margin-top: 10px" class="table-data">
            <thead>
                <tr>
                    <th>No</th>
                    <th style="width: 20%">alternatif</th>
                    <th style="width: 20%">kriteria</th>
                    <th style="width: 20%">sub kriteria</th>
                    <th style="width: 20%">Nilai</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                {{-- {{dd($nilaiAlternatif);}} --}}
                @foreach ($nilaiAlternatif as $n_alternatif)
                    <tr> 
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $n_alternatif->alternatif->nama }}</td>
                        <td>{{ $n_alternatif->kriteria->nama }}</td>
                        <td>{{ $n_alternatif->subKriteria->nama}}</td>
                        </td>
                        <td>{{ $n_alternatif->nilai }}</td>
                        <td>
                            <a href="{{ route('nilai_alternatif.nilai_alternatif-edit', ['id' => $n_alternatif->id]) }}"
                                class="btn btn-edit" style="display: inline-block;">
                                <i class='bx bxs-edit' style="font-size: 18px;"></i>
                            </a>
                            <a href="{{ route('nilai_alternatif.hapus', $n_alternatif->id) }}"
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