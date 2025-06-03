@extends('layout.main')

@section('content')
    <h3>Input Data Event</h3>
    <div class="form-login ">
        <a href="{{ route('event.event') }}" class="btn-close">×</a>
        <form action="{{ route('event.event-update', ['id' => $event->id]) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama">Nama Event</label>
                <input type="text" name="nama" class="form-control" value="{{ old('nama', $event->nama) }}" >
            </div>
            <div class="form-group">
                <label for="alternatif">Tempat</label>
                <select name="alternatif_id" id="alternatif_id" class="form-control" required>
                    <option value="">-- Pilih Tempat --</option>
                    @foreach ($alternatif as $alternatif)
                    <option value="{{ $alternatif->id }}"
                        @if($event->alternatif_id == $alternatif->id)
                            selected
                        @endif
                        >{{ $alternatif->nama }}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tanggal_mulai">Tanggal Mulai</label>
                <input type="date" name="tanggal_mulai" class="form-control" value="{{ old('tanggal_mulai', $event->tanggal_mulai) }}">
            </div>
            <div class="form-group">
                <label for="tanggal_berakhir">Tanggal Berakhir</label>
                <input type="date" name="tanggal_berakhir" class="form-control" value="{{ old('tanggal_berakhir', $event->tanggal_berakhir) }}">
            </div>
            <label for="deskripsi">Deskripsi</label>
            <input class="input" type="text" name="deskripsi" id="deskripsi" placeholder="deskripsi" value="{{old('deskripsi',$event->deskripsi)}}" />
            @error('deskripsi')
                <p style="font-size: 10px; color: red">{{ $message }}</p>
            @enderror

            <button type="submit" class="btn btn-simpan" name="simpan" style="margin-top: 50px">
                Simpan
            </button>
        </form>
    </div>
@endsection
