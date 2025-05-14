@extends('layout.main')

@section('content')
    <h3>Input Nilai Alternatif</h3>
    <div class="form-login ">
        <a href="{{ route('nilai_alternatif.nilai_alternatif') }}" class="btn-close">×</a>
        <form action="{{route('nilai_alternatif.nilai_alternatif-update', ['id'=>$nilaiAlternatif->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            <select class="input" name="alternatif_id" id="alternatif">
                @foreach ($alternatifs as $alternatif)
                    <option value="{{ $alternatif->id }}" {{ $nilaiAlternatif->alternatif_id == $alternatif->id ? 'selected' : '' }}>
                        {{ $alternatif->nama }}
                    </option>
                @endforeach
            </select>
            
            <select class="input" name="kriteria_id" id="kriteria">
                <option value="">-- Pilih Kriteria --</option>
                @foreach ($kriteria as $k)
                    <option value="{{ $k->id }}" {{ $nilaiAlternatif->kriteria_id == $k->id ? 'selected' : '' }}>
                        {{ $k->nama }}
                    </option>
                @endforeach
            </select>
            
            <select class="input" name="subkriteria_id" id="subkriteria">
                <option value="">-- Pilih Subkriteria --</option>
                @foreach ($subkriteria as $sk)
                    <option value="{{ $sk->id }}" {{ $nilaiAlternatif->subkriteria_id == $sk->id ? 'selected' : '' }}>
                        {{ $sk->nama }}
                    </option>
                @endforeach
            </select>
            
            <input class="input" type="text" name="nilai" id="nilai" placeholder="nilai" value="{{ $nilaiAlternatif->nilai }}" />
            
            @error('nilai')
                <p style="font-size: 10px; color: red">{{ $message }}</p>
            @enderror
            <button type="submit" class="btn btn-simpan" name="simpan" style="margin-top: 50px">
                Simpan
            </button>
        </form>
    </div>
    <script>
        $(document).ready(function() {
            const selectedSubkriteriaId = "{{ $nilaiAlternatif->subkriteria_id }}";
    
            $('#kriteria').on('change', function () {
                var kriteriaId = $(this).val();
                $('#subkriteria').empty().append('<option value="">Loading...</option>');
    
                if (kriteriaId) {
                    $.get('/get-subkriteria/' + kriteriaId, function (data) {
                        $('#subkriteria').empty().append('<option value="">-- Pilih Subkriteria --</option>');
                        $.each(data, function (index, item) {
                            const isSelected = item.id == selectedSubkriteriaId ? 'selected' : '';
                            $('#subkriteria').append('<option value="' + item.id + '" ' + isSelected + '>' + item.nama + '</option>');
                        });
                    });
                } else {
                    $('#subkriteria').empty().append('<option value="">-- Pilih Subkriteria --</option>');
                }
            });
    
            // Trigger filter saat pertama kali load
            if ($('#kriteria').val()) {
                $('#kriteria').trigger('change');
            }
        });
    </script>
@endsection
