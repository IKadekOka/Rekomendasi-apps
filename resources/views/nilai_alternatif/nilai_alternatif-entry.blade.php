@extends('layout.main')

@section('content')
    <h3>Input Nilai Alternatif</h3>
    <div class="form-login ">
        <a href="{{ route('nilai_alternatif.nilai_alternatif') }}" class="btn-close">×</a>
        <form action="{{ route('nilai_alternatif.nilai_alternatif-store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <select class="input" for="kriteria" name="alternatif_id" id="alternatif" placeholder="alternatif" value="">
                <option value="">-- Pilih Alternatif --</option>
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

            <label for="nilai_display">Nilai</label>
            <input class="input" type="text" id="nilai_display" placeholder="nilai" oninput="formatAndSync(this)" />

            <input type="hidden" name="nilai" id="nilai" />

            <div id="skala_info" style="margin-top: 20px;"></div>

            <button type="submit" class="btn btn-simpan" name="simpan" style="margin-top: 50px">
                Simpan
            </button>
        </form>
    </div>
    {{-- Tambahkan CDN SweetAlert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Jika session duplicate muncul, tampilkan popup --}}
    @if (session('duplicate'))
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'Data Duplikat',
                text: 'Subkriteria sudah pernah dinilai untuk alternatif ini.',
                confirmButtonText: 'Oke',
            });
        </script>
    @endif
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

        function formatAndSync(input) {
            let angkaBersih = input.value.replace(/\D/g, ''); // hanya angka
            let denganTitik = angkaBersih.replace(/\B(?=(\d{3})+(?!\d))/g, '.');

            input.value = denganTitik; // tampilkan ke user
            document.getElementById('nilai').value = angkaBersih; // isi input hidden
        }
    </script>
@endsection
