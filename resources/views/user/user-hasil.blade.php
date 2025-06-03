<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Penting untuk mobile -->
    <title>Hasil Rekomendasi Wisata</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


    <style>
        body {
            background: url("../assets/img/bg.jpg") no-repeat center center fixed;
            background-size: cover;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .content-wrapper {
            background-color: rgba(255, 255, 255, 0.95);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            margin-top: 40px;
            margin-bottom: 40px;
        }

        h2 {
            margin-bottom: 30px;
            color: #343a40;
            font-weight: bold;
        }

        .btn-kembali {
            margin-top: 30px;
        }

        .btn-kembali .btn-custom {
            background: linear-gradient(135deg, #6c757d, #495057);
            color: #fff;
            border: none;
            font-size: 1.1rem;
            padding: 12px 28px;
            border-radius: 50px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .btn-kembali .btn-custom:hover {
            background: linear-gradient(135deg, #495057, #343a40);
            transform: translateY(-2px);
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.3);
        }


        @media (max-width: 768px) {
            .content-wrapper {
                padding: 20px;
            }

            h2 {
                font-size: 1.5rem;
            }

            .btn-lg {
                font-size: 1rem;
                padding: 10px 20px;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12">
                <div class="content-wrapper">
                    <h2 class="text-center">Hasil Rekomendasi Wisata Terbaik</h2>

                    @if ($ranking->isEmpty())
                        <div class="alert alert-warning text-center">Belum ada hasil rekomendasi.</div>
                    @else
                        <div class="table-responsive">
                            <table id="rankingTable"
                                class="table table-striped table-bordered shadow-sm bg-white w-100">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Ranking</th>
                                        <th>Nama Wisata</th>
                                        <th>Kategori</th>
                                        <th>Lokasi</th>
                                        <th>Skor (Yi)</th>
                                        <th>Event</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ranking as $i => $data)
                                        <tr>
                                            <td>{{ $i + 1 }}</td>
                                            <td>{{ $data['alternatif']->nama }}</td>
                                            <td>{{ ucfirst($data['alternatif']->kategori->nama) }}</td>
                                            <td>{{ $data['alternatif']->lokasi }}</td>
                                            <td>{{ number_format($data['yi'], 9) }}</td>
                                            <td>
                                                @if (in_array($data['alternatif']->id, $eventAlternatifIds))
                                                    <a href="{{route('event.event-detail', ['id' => $data['alternatif']->id]) }}" class="btn btn-primary btn-sm">
                                                        Lihat Event
                                                    </a>
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif

                    <!-- Tombol Kembali -->
                    <div class="text-center btn-kembali">
                        <a href="{{ url('/user') }}" class="btn btn-custom">
                            <i class="fas fa-arrow-left mr-2"></i> Kembali ke Halaman User
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>



    <!-- JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#rankingTable').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                info: true,
                lengthChange: false,
                pageLength: 10,
                responsive: true,
                language: {
                    search: "Cari:",
                    paginate: {
                        next: "Berikutnya",
                        previous: "Sebelumnya"
                    },
                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                    infoEmpty: "Tidak ada data",
                    zeroRecords: "Data tidak ditemukan"
                }
            });
        });
    </script>
</body>

</html>
