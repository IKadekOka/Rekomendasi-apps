@extends('layout.main')

@section('content')
    <div>
        <h2 style="margin-top: 20px">Tabel Perhitungan Sub Kriteria </h2>

        <div style="overflow-x: auto; width: 100%;">
            <table style="margin-top: 10px; min-width: 800px;" class="table-data">
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
        </div>
        
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
                                <td>{{ $dataKriteriaAsli[$alt->id][$krit->id] ?? '-' }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div>
            <h2 style="margin-top: 20px">Tabel Matriks</h2>
            <table class="table-data" style="margin-top: 10px">
                <thead>
                    <tr>
                        @foreach ($kriteria as $krit)
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alternatifs as $alt)
                        <tr>
                            @foreach ($kriteria as $krit)
                                <td>{{ $dataKriteria[$alt->id][$krit->id] ?? '-' }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
                <tbody>

                </tbody>
            </table>
        </div>
        <div>
            <h2 style="margin-top: 20px">Tabel Hasil Normalisasi</h2>
            <table class="table-data" style="margin-top: 10px">
                <thead>
                    <tr>
                        <th>Alternatif</th>
                        @foreach ($kriteria as $krit)
                            <th>C{{ $index + 1 }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alternatifs as $alt)
                        <tr>
                            <td>{{ $alt->nama }}</td>
                            @foreach ($kriteria as $krit)
                                <td>
                                    {{ number_format($normalisasi[$alt->id][$krit->id] ?? 0, 9) }}
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div>
            <h3 style="margin-top: 20px">Tabel Hasil perkalian bobot</h3>
            <table class="table-data" style="margin-top: 10px">
                <thead class="table-light">
                    <tr>
                        <th>Alternatif</th>
                        @foreach ($kriteria as $index => $krit)
                            <th>{{ $krit->nama }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($normalisasiTerbobot as $index => $baris)
                        <tr>
                            <td>{{ $alternatifs[$index]->nama }}</td>
                            @foreach ($baris as $nilai)
                                <td>{{ number_format($nilai, 9, ',', '.') }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div>
            <h3 style="margin-top: 20px">Hasil Ranking Metode MOORA</h3>
            <table class="table-data" style="margin-top: 10px; margin-bottom: 30px">
                <thead>
                    <tr>
                        <th>Ranking</th>
                        <th>Nama Alternatif</th>
                        <th>Nilai Yi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ranking as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item['alternatif']->nama }}</td>
                            <td>{{ number_format($item['yi'], 9) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>


    </div>
@endsection
