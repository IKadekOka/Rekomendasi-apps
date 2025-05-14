@extends('layout.main')

@section('content')
<section class="dashboard-simple">
  <div class="card border-blue">
    <div class="card-header">
      <p class="card-title">Data Kriteria</p>
      <i class="bx bx-dollar card-icon"></i>
    </div>
    <p class="card-value">Data Kriteria</p>
    <p class="card-change up">
      <i class="bx bx-up-arrow-alt"></i>
      12%
    </p>
  </div>

  <div class="card border-purple">
    <div class="card-header">
      <p class="card-title">Data Sub Kriteria</p>
      <i class="bx bx-tag card-icon"></i>
    </div>
    <p class="card-value">Data Sub Kriteria</p>
    <p class="card-change up">
      <i class="bx bx-up-arrow-alt"></i>
      12%
    </p>
  </div>

  <div class="card border-green">
    <div class="card-header">
      <p class="card-title">Data Alternatif</p>
      <i class="bx bx-mouse card-icon"></i>
    </div>
    <p class="card-value">Data Alternatif</p>
    <p class="card-change down">
      <i class="bx bx-down-arrow-alt"></i>
      3%
    </p>
  </div>

  <div class="card border-teal">
    <div class="card-header">
      <p class="card-title">Data Nilai Alternatif</p>
      <i class="bx bx-percent card-icon"></i>
    </div>
    <p class="card-value">Data Nilai Alternatif</p>
    <p class="card-change down">
      <i class="bx bx-down-arrow-alt"></i>
      5%
    </p>
  </div>
</section>

@endsection
