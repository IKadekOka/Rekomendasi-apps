@extends('layout.main')

@section('content')
    <section class="dashboard-simple">
        <a href="{{ route('kriteria.kriteria') }}" class="card border-blue" style="display: block; text-decoration: none;">
            <div class="card-header">
                <p class="card-title">Data Kriteria</p>
                <i class="bx bx-dollar card-icon"></i>
            </div>
            <p class="card-value">Data Kriteria</p>
            <p class="card-change up">
                <i class="bx bx-up-arrow-alt"></i>
                {{ $kriteria?->count() ?? 0 }} Data
            </p>
        </a>

        <a href="{{ route('sub_kriteria.sub_kriteria') }}" class="card border-purple"
            style="display: block; text-decoration: none;">
            <div class="card-header">
                <p class="card-title">Data Sub Kriteria</p>
                <i class="bx bx-tag card-icon"></i>
            </div>
            <p class="card-value">Data Sub Kriteria</p>
            <p class="card-change up">
                <i class="bx bx-up-arrow-alt"></i>
                {{ $subkriteria?->count() ?? 0 }} Data
            </p>
        </a>

        <a href="{{ route('alternatif.alternatif') }}" class="card border-green" style="display: block; text-decoration: none;">
            <div class="card-header">
                <p class="card-title">Data Alternatif</p>
                <i class="bx bx-mouse card-icon"></i>
            </div>
            <p class="card-value">Data Alternatif</p>
            <p class="card-change down">
                <i class="bx bx-down-arrow-alt"></i>
                {{ $alternatifs?->count() ?? 0 }} Data
            </p>
        </a>

        <a href="{{ route('nilai_alternatif.nilai_alternatif') }}" class="card border-green" style="display: block; text-decoration: none;">
            <div class="card-header">
                <p class="card-title">Data Nilai Alternatif</p>
                <i class="bx bx-percent card-icon"></i>
            </div>
            <p class="card-value">Data Nilai Alternatif</p>
            <p class="card-change down">
                <i class="bx bx-down-arrow-alt"></i>
                {{ $nilaiAlternatif?->count() ?? 0 }} Data
            </p>
        </a>
    </section>
@endsection
