<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Informasi Event</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background-image: url("{{ asset('assets/img/bg.jpg') }}");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            position: relative;
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #212529;
        }

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
            padding: 2rem;
        }

        #searchInput {
            border-radius: 30px;
            padding-left: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border: 1.5px solid #ced4da;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
            min-width: 250px;
            max-width: 400px;
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
            white-space: nowrap;
        }

        .btn-secondary:hover {
            background-color: #343a40;
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.25);
        }

        .events-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
            margin-top: 1.5rem;
        }

        .event-card {
            background-color: #ffffff;
            border-radius: 12px;
            padding: 1.4rem 1.8rem;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.12);
            transition: transform 0.3s ease, box-shadow 0.3s ease, opacity 0.3s ease;
            cursor: default;
        }

        .event-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.2);
        }

        .event-name {
            font-weight: 700;
            font-size: 1.25rem;
            margin-bottom: 0.4rem;
            color: #0d6efd;
        }

        .event-date {
            font-style: italic;
            font-size: 0.9rem;
            color: #6c757d;
            margin-bottom: 0.8rem;
        }

        .event-desc {
            font-size: 1rem;
            color: #495057;
            line-height: 1.4;
        }

        /* Responsive */
        @media (max-width: 576px) {
            #searchInput {
                width: 100% !important;
                margin-bottom: 10px;
            }

            .d-flex.justify-content-between {
                flex-direction: column;
                align-items: stretch;
                gap: 10px;
            }

            .btn-secondary {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">Informasi Event Wisata</h2>

            <div class="card">
                <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
                    <input type="text" id="searchInput" class="form-control" placeholder="Cari nama event..." autocomplete="off" />
                    <a href="{{ url('/user-hasil') }}" class="btn btn-secondary">Kembali</a>
                </div>

                <h3 class="mb-4">Event di <span class="text-primary">{{ $alternatif->nama }}</span></h3>

                @if ($alternatif->event->count() > 0)
                    <div class="events-container" id="eventsContainer">
                        @foreach ($alternatif->event as $event)
                            <div class="event-card">
                                <div class="event-name">{{ $event->nama }}</div>
                                <div class="event-date">Tanggal: {{ \Carbon\Carbon::parse($event->tanggal_mulai)->format('d M Y') }}
                                    - {{ \Carbon\Carbon::parse($event->tanggal_berakhir)->format('d M Y') }}</div>
                                <div class="event-desc">{{ $event->deskripsi }}</div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-muted">Tidak ada event untuk alternatif ini.</p>
                @endif
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Filter event cards by name (smooth fade)
        const searchInput = document.getElementById('searchInput');
        const eventsContainer = document.getElementById('eventsContainer');
        const eventCards = eventsContainer ? [...eventsContainer.children] : [];

        searchInput.addEventListener('input', () => {
            const keyword = searchInput.value.toLowerCase().trim();

            eventCards.forEach(card => {
                const eventName = card.querySelector('.event-name').textContent.toLowerCase();
                if (eventName.includes(keyword)) {
                    card.style.display = 'block';
                    setTimeout(() => {
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    }, 50);
                } else {
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(20px)';
                    setTimeout(() => {
                        card.style.display = 'none';
                    }, 300);
                }
            });
        });
    </script>
</body>

</html>
