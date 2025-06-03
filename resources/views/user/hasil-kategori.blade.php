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
                
                    <!-- Tombol Kembali di atas -->
                    <div class="mb-3 text-left">
                        <a href="{{ url('/user') }}" class="btn btn-custom">
                            <i class="fas fa-arrow-left mr-2"></i> Kembali
                        </a>
                    </div>
                
                    <!-- Form Filter -->
                    <form method="GET" action="{{ route('hasil.index') }}" class="mb-4">
                        <label for="kategori">Filter Kategori:</label>
                        <select name="kategori" id="kategori" class="form-control" onchange="this.form.submit()">
                            <option value="">Semua Kategori</option>
                            @foreach ($kategoriList as $kategori)
                                <option value="{{ $kategori->id }}" {{ $kategoriId == $kategori->id ? 'selected' : '' }}>
                                    {{ ucfirst($kategori->nama) }}
                                </option>
                            @endforeach
                        </select>
                    </form>
                
                    @if($hasil->count() > 0)
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Alternatif</th>
                                    <th>Kategori</th>
                                    <th>Skor</th>
                                    <th>Ranking</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($hasil as $item)
                                    <tr>
                                        <td>{{ $item->alternatif->nama }}</td>
                                        <td>{{ $item->alternatif->kategori->nama ?? '-' }}</td>
                                        <td>{{ $item->skor }}</td>
                                        <td>{{ $item->ranking }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>Tidak ada hasil rekomendasi untuk kategori ini.</p>
                    @endif
                
                    <!-- Tombol Kembali di bawah (opsional) -->
                    {{-- <div class="text-center btn-kembali">
                        <a href="{{ url('/user') }}" class="btn btn-custom">
                            <i class="fas fa-arrow-left mr-2"></i> Kembali ke Halaman User
                        </a>
                    </div> --}}
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
