@extends('layout.main')

@section('content')
    <html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel 5.8 - DataTables Server Side Processing using Ajax</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>



    <body>
        <div class="container">
            <h3 align="center">Form Skala Nilai</h3>
            <div class="table-responsive">
                <form method="post" id="dynamic_form">
                    @csrf
                    <input type="hidden" value="{{ $id }}" name="sub_kriteria_id">
                    <span id="result"></span>
                    <table class="table table-bordered table-striped" id="skala_nilai_table">
                        <thead>
                            <tr>
                                <th width="35%">Nilai</th>
                                <th width="35%">Deskripsi</th>
                                <th width="30%">Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2">
                                    <button type="button" class="btn btn-success btn-add-row">Add</button>
                                </td>
                                <td>
                                    <input type="submit" class="btn btn-primary btn-save-row" value="Save" />
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </form>
            </div>
        </div>
        <div>
            <h2 style="margin-top: 20px">Skala Deskripsi</h2>
            <table style="margin-top: 10px" class="table-data">
                <thead>
                    <tr>
                        <th style="width: 5%; text-align: center;" >No</th>
                        <th style="width: 20%; text-align: center;">Nilai</th>
                        <th style="width: 20%; text-align: center;">Deskripsi</th>
                        <th style="width: 20%; text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($skala_deskripsis as $deskripsi)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $deskripsi-> nilai }}</td>
                            <td>{{ $deskripsi-> deskripsi }}</td>

                            <td>
                                <a href="{{ route('deskripsi.deskripsi-edit', ['id' => $deskripsi->id]) }}"
                                    class="btn btn-edit" style="display: inline-block;">
                                    <i class='bx bxs-edit' style="font-size: 18px;"></i>
                                </a>
                                <a href="{{ route('deskripsi.hapus', $deskripsi->id) }}"
                                    onclick="return confirm('Yakin ingin menghapus data ini?')" class="btn btn-hapus"
                                    style="display: inline-block;">
                                    <i class='bx bxs-trash' style="font-size: 18px;"></i>
                                </a>

                            </td>
                        </tr>
                    @endforeach
            </table>
        </div>
    </body>

    </html>

    <script>
        $(document).ready(function() {
            const $form = $('#dynamic_form');
            const $tbody = $form.find('tbody');

            // Tambah baris pertama saat load
            addRow();

            function addRow() {
                const html = `
            <tr>
                <td><input type="text" name="nilai[]" class="form-control" required /></td>
                <td><input type="text" name="deskripsi[]" class="form-control" required /></td>
                <td><button type="button" class="btn btn-danger btn-remove-row">Remove</button></td>
            </tr>`;
                $tbody.append(html);
            }

            // Tombol add baris
            $form.on('click', '.btn-add-row', function() {
                addRow();
            });

            // Tombol remove baris
            $form.on('click', '.btn-remove-row', function() {
                $(this).closest('tr').remove();
            });

            // Submit form AJAX
            $form.on('submit', function(event) {
                event.preventDefault();
                const $saveButton = $form.find('.btn-save-row');

                $.ajax({
                    url: '{{ route('deskripsi.deskripsi-insert') }}',
                    method: 'POST',
                    data: $form.serialize(),
                    dataType: 'json',
                    beforeSend: function() {
                        $saveButton.prop('disabled', true);
                    },
                    success: function(data) {
                        console.log(data);
                        window.location.reload(); // atau redirect sesuai kebutuhan
                    },
                    error: function(xhr) {
                        console.error('Terjadi kesalahan:', xhr.responseText);
                        alert('Terjadi kesalahan saat menyimpan data.');
                        $saveButton.prop('disabled', false);
                    }
                });
            });
        });
    </script>
@endsection
