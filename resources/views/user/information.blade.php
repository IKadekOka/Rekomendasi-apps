<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Informasi Event</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet"
    />
    <style>
        /* Background with overlay for better readability */
        body {
            background-image: url("{{ asset('assets/img/bg.jpg') }}");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            position: relative;
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Overlay dark layer */
        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background-color: rgba(0, 0, 0, 0.55);
            z-index: -1;
            backdrop-filter: blur(5px);
        }

        h2 {
            color: #f8f9fa;
            text-shadow: 0 2px 6px rgba(0, 0, 0, 0.7);
            font-weight: 700;
            letter-spacing: 1.2px;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
        }

        .table thead {
            background-color: #495057;
            color: #f8f9fa;
            font-weight: 600;
        }

        .table tbody tr:hover {
            background-color: #f1f3f5;
            transition: background-color 0.3s ease;
        }

        /* Search input & button styling */
        #searchInput {
            border-radius: 30px;
            padding-left: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border: 1.5px solid #ced4da;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        #searchInput:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 8px rgba(13, 110, 253, 0.5);
            outline: none;
        }

        .btn-secondary {
            border-radius: 30px;
            padding: 0.5rem 1.4rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.15);
            font-weight: 600;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .btn-secondary:hover {
            background-color: #343a40;
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.25);
        }

        /* Responsive adjustments */
        @media (max-width: 576px) {
            #searchInput {
                width: 100% !important;
                margin-bottom: 10px;
            }

            .d-flex.justify-content-between {
                flex-direction: column;
                align-items: stretch;
            }

            .btn-secondary {
                width: 100%;
                margin-left: 0 !important;
            }
        }
    </style>
</head>
<body>
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">Informasi Event Wisata</h2>

            <div class="card p-4">
                <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
                    <input
                        type="text"
                        id="searchInput"
                        class="form-control w-50"
                        placeholder="Cari nama event..."
                    />
                    <a href="{{ url('/user') }}" class="btn btn-secondary">Kembali</a>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle" id="eventTable">
                        <thead class="text-center">
                            <tr>
                                <th style="width: 5%;">No</th>
                                <th>Nama Event</th>
                                <th>Lokasi</th>
                                <th style="width: 15%;">Tanggal Mulai</th>
                                <th style="width: 15%;">Tanggal Berakhir</th>
                                <th>Deskripsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($event as $event)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="event-name">{{ $event->nama }}</td>
                                    <td>{{ $event->alternatif->nama }}</td>
                                    <td class="text-center">{{ $event->tanggal_mulai }}</td>
                                    <td class="text-center">{{ $event->tanggal_berakhir }}</td>
                                    <td>{{ $event->deskripsi }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Simple search filter
        document.getElementById('searchInput').addEventListener('keyup', function () {
            let keyword = this.value.toLowerCase();
            let rows = document.querySelectorAll('#eventTable tbody tr');

            rows.forEach(row => {
                const eventName = row.querySelector('.event-name').textContent.toLowerCase();
                row.style.display = eventName.includes(keyword) ? '' : 'none';
            });
        });
    </script>
</body>
</html>
