@extends('layout.main')

@section('content')
<div>
    <h2 style="margin-top: 20px">Tabel Perhitungan  </h2>

    <table style="margin-top: 10px" class="table-data">
        <thead>
            <tr>
                <th>No</th>
                <th>Alternatif</th>
                @foreach ($subkriteria as $sb)
                    <th>{{ $sb->nama }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($alternatifs as $index => $alt)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $alt->nama }}</td>
                @foreach ($subkriteria as $sb)
                    <td>{{ $dataNilai[$alt->id][$sb->id] ?? '-' }}</td>
                @endforeach
            </tr>
        @endforeach
      </tbody>
    </table>
    <div>
        <h2 style="margin-top: 20px">Tabel Total Nilai per Kriteria</h2>
        <table class="table-data" style="margin-top: 10px">
            <thead>
                <tr>
                    <th>Alternatif</th>
                    @foreach ($kriteria as $krit)
                        <th>{{ $krit->nama }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($alternatifs as $alt)
                    <tr>
                        <td>{{ $alt->nama }}</td>
                        @foreach ($kriteria as $krit)
                            <td>{{ $dataKriteria[$alt->id][$krit->id] ?? '-' }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>    
</div>
@endsection
