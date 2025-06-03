@extends('layout.main')

@section('content')
    <h2>Tambah Event Baru</h2>
    <div class="form-login">
        <a href="{{ route('event.event') }}" class="btn-close">×</a>
        <form action="{{ route('event.event-store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama">Nama Event</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama Event" required>
            </div>
            <div class="form-group">
                <label for="alternatif_id">Tempat Event</label>
                <select name="alternatif_id" class="form-control" required>
                    <option value="">-- Pilih Tempat --</option>
                    @foreach ($alternatif as $alternatif)
                        <option value="{{ $alternatif->id }}">{{ $alternatif->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tanggal_mulai">Tanggal Mulai</label>
                <input type="date" name="tanggal_mulai" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="tanggal_berakhir">Tanggal Berakhir</label>
                <input type="date" name="tanggal_berakhir" class="form-control" required>
            </div>
            <label for="deskripsi">Deskripsi</label>
            <textarea class="input" name="deskripsi" id="deskripsi" placeholder="Deskripsi" rows="4"></textarea>
            @error('deskripsi')
                <p style="font-size: 10px; color: red">{{ $message }}</p>
            @enderror

            <button type="submit" class="btn btn-simpan" name="simpan" style="margin-top: 50px">
                Simpan
            </button>
        </form>
    </div>
@endsection
