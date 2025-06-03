@extends('layout.main')

@section('content')
    <div style="margin-bottom: 50px;">
        <h2 style="margin-top: 20px">Data Kategori</h2>
        <table style="margin-top: 10px" class="table-data">
            <button type="button" style="margin-top: 20px" class="btn btn-tambah">
                <a href="{{ route('kategori.kategori-entry') }}">Tambah Data</a>
            </button>
            <thead>
                <tr>
                    <th>No</th>
                    <th style="width: 20%">Nama Kategori</th>
                    <th style="width: 20%">Deskripsi</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kategori as $kt)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $kt->nama }}</td>
                        <td>{{ $kt->deskripsi }}</td>
                        <td>
                            <a href="{{ route('kategori.kategori-edit', ['id' => $kt->id]) }}" class="btn btn-edit"
                                style="display: inline-block;">
                                <i class='bx bxs-edit' style="font-size: 18px;"></i>
                            </a>
                            <a href="{{ route('kategori.hapus', $kt->id) }}"
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
