@extends('layout.main')

@section('content')
    <h3>Input Nilai Alternatif</h3>
    <div class="form-login ">
        <a href="{{ route('nilai_alternatif.nilai_alternatif') }}" class="btn-close">×</a>
        <form action="{{ route('nilai_alternatif.nilai_alternatif-store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <select class="input" for="kriteria" name="alternatif_id" id="alternatif" placeholder="alternatif" value="">
                @foreach ($alternatifs as $alternatif)
                    <option value="{{ $alternatif->id }}">{{ $alternatif->nama }}</option>
                @endforeach
            </select>
            <select class="input" name="kriteria_id" id="kriteria">
                <option value="">-- Pilih Kriteria --</option>
                @foreach ($kriteria as $k)
                    <option value="{{ $k->id }}">{{ $k->nama }}</option>
                @endforeach
            </select>

            <select class="input" name="subkriteria_id" id="subkriteria">
                <option value="">-- Pilih Subkriteria --</option>
            </select>

            <label for="nilai">nilai</label>
            <input class="input" type="text" name="nilai" id="nilai" placeholder="nilai" value="" />
            
            <div id="skala_info" style="margin-top: 20px;"></div>

            <button type="submit" class="btn btn-simpan" name="simpan" style="margin-top: 50px">
                Simpan
            </button>
        </form>
    </div>
    <script>
        $('#kriteria').on('change', function() {
            var kriteriaId = $(this).val();
            $('#subkriteria').empty().append('<option value="">Loading...</option>');

            if (kriteriaId) {
                $.ajax({
                    url: '/get-subkriteria/' + kriteriaId,
                    type: 'GET',
                    success: function(data) {
                        $('#subkriteria').empty().append(
                            '<option value="">-- Pilih Subkriteria --</option>');
                        $.each(data, function(key, value) {
                            $('#subkriteria').append('<option value="' + value.id + '">' + value
                                .nama + '</option>');
                        });
                    }
                });
            } else {
                $('#subkriteria').empty().append('<option value="">-- Pilih Subkriteria --</option>');
            }
        });

        $('#subkriteria').on('change', function() {
            var subId = $(this).val();
            $('#skala_info').html(''); // Bersihkan dulu

            if (subId) {
                $.ajax({
                    url: '/get-deskripsi-skala/' + subId,
                    type: 'GET',
                    success: function(res) {
                        if (res.show) {
                            var html = '<strong>Daftar Skala:</strong><ul>';
                            $.each(res.data, function(index, item) {
                                html += '<li><strong>' + item.nilai + ':</strong> ' + item
                                    .deskripsi + '</li>';
                            });
                            html += '</ul>';
                            $('#skala_info').html(html);
                        } else {
                            $('#skala_info').html('');
                        }
                    }
                });
            }
        });
    </script>
@endsection
