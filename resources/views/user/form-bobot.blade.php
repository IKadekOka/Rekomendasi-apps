<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Bobot Kriteria Tertinggi</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: url('/assets/img/bg.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #333;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px;
        }

        .table-container {
            background: rgba(255, 255, 255, 0.95);
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 700px;
            animation: fadeIn 0.6s ease-in-out;
            max-width: 1200px;
        }

        h2 {
            text-align: center;
            color: #4a5568;
            margin-bottom: 20px;
            font-weight: 600;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 14px 16px;
            text-align: left;
        }

        thead {
            background-color: #667eea;
            color: white;
        }

        tbody tr:nth-child(odd) {
            background-color: #f9fafb;
        }

        tbody tr:nth-child(even) {
            background-color: #edf2f7;
        }

        tbody tr:hover {
            background-color: #e2e8f0;
        }

        th {
            font-weight: 600;
        }

        /* Dropdown Custom Style */
        .custom-select {
            width: 180px;
            /* diperpanjang dari 120px */
            padding: 8px 16px;
            /* padding kiri-kanan ditambah */
            border-radius: 10px;
            border: 2px solid #667eea;
            background-color: #f0f4ff;
            font-size: 15px;
            font-weight: 500;
            color: #333;
            transition: all 0.3s ease;
            cursor: pointer;
            appearance: none;
            background-image: url('data:image/svg+xml;charset=US-ASCII,<svg xmlns="http://www.w3.org/2000/svg" width="10" height="6"><path fill="%236677ea" d="M0 0l5 6 5-6z"/></svg>');
            background-repeat: no-repeat;
            background-position: right 12px center;
            /* posisi panah geser sedikit */
            background-size: 10px 6px;
        }

        .custom-select:hover {
            background-color: #dbe4ff;
            border-color: #4a63d1;
            color: #222;
        }

        .custom-select:focus {
            outline: none;
            border-color: #3b4cc0;
            box-shadow: 0 0 8px rgba(102, 126, 234, 0.7);
            background-color: #e4ebff;
            color: #111;
        }

        /* Submit Button Style */
        .submit-btn {
            margin-top: 20px;
            padding: 12px 30px;
            border: none;
            border-radius: 12px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: #fff;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            box-shadow: 0 8px 15px rgba(102, 126, 234, 0.4);
            transition: background 0.4s ease, box-shadow 0.3s ease;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .submit-btn:hover {
            background: linear-gradient(45deg, #5469d4, #5e3b9a);
            box-shadow: 0 10px 20px rgba(84, 105, 212, 0.6);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 600px) {
            .table-container {
                padding: 20px;
            }

            table,
            thead,
            tbody,
            th,
            td,
            tr {
                display: block;
            }

            thead {
                display: none;
            }

            tbody tr {
                margin-bottom: 15px;
                border: 1px solid #ccc;
                border-radius: 10px;
                padding: 10px;
                background-color: #f9fafb;
            }

            td {
                padding: 10px;
                position: relative;
                padding-left: 50%;
            }

            td::before {
                position: absolute;
                top: 10px;
                left: 15px;
                width: 45%;
                white-space: nowrap;
                font-weight: bold;
                color: #4a5568;
            }

            td:nth-of-type(1)::before {
                content: "Nama Kriteria";
            }

            td:nth-of-type(2)::before {
                content: "Bobot";
            }

            td:nth-of-type(3)::before {
                content: "Input Bobot Baru";
            }
        }

        .ranking-table-container {
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <div class="table-container">
        <h2>Daftar Kriteria Berdasarkan Bobot Tertinggi</h2>
        <form action="{{ route('bobot.submit') }}" method="POST">
            @csrf
            <table>
                <thead>
                    <tr>
                        <th>Nama Kriteria</th>
                        <th>Bobot (Asli)</th>
                        <th>Input Bobot Baru </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kriteria as $item)
                        <tr>
                            <td>{{ $item->nama }}</td>
                            <td>{{ number_format($item->bobot, 2) }}</td>
                            <td>
                                <select name="bobot_baru[{{ $item->id }}]" class="custom-select">
                                    <option value="">-- Pilih Bobot --</option>
                                    @foreach ($allBobot as $bobot)
                                        <option value="{{ $bobot }}"
                                            {{ old("bobot_baru.{$item->id}") == $bobot ? 'selected' : '' }}>
                                            {{ number_format($bobot, 2) }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="submit" class="submit-btn">Hitung</button>
        </form>
        @if (isset($bobotInputUser) && count($bobotInputUser))
            <div style="margin-top: 30px;">
                <h3 style="text-align: center; color: #4a5568; margin-bottom: 10px;">Bobot Baru yang Digunakan:</h3>
                <table style="margin: 0 auto;">
                    <thead>
                        <tr>
                            <th>Nama Kriteria</th>
                            <th>Bobot Baru</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kriteria as $item)
                            @php
                                $bobotBaru = $bobotInputUser[$item->id] ?? $item->bobot;
                            @endphp
                            <tr>
                                <td>{{ $item->nama }}</td>
                                <td>{{ number_format($bobotBaru, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        <div class="ranking-table-container">
            @if (isset($ranking) && count($ranking))
                <div style="margin-top: 30px;">
                    <h3 style="text-align: center; color: #4a5568; margin-bottom: 15px;">Hasil Rekomendasi Berdasarkan
                        Bobot yang Anda Pilih:</h3>
                    <table>
                        <thead>
                            <tr>
                                <th>Ranking</th>
                                <th>Nama Wisata</th>
                                <th>Skor (Yi)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ranking as $i => $item)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $item['alternatif']->nama }}</td>
                                    <td>{{ number_format($item['yi'], 4) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>


        <div style="text-align: center; margin-top: 25px;">
            <a href="{{ url('/user') }}" class="submit-btn" style="background: #718096; text-decoration: none;">
                ← Kembali ke Halaman User
            </a>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const selects = document.querySelectorAll('select.custom-select');
            const originalOptions = Array.from(selects).map(s => Array.from(s.options).map(o => o.cloneNode(true)));

            function updateOptions() {
                const selectedValues = Array.from(selects).map(s => s.value).filter(v => v !== '');

                selects.forEach((select, i) => {
                    const currentValue = select.value;
                    select.innerHTML = '';
                    // add placeholder
                    let placeholder = document.createElement('option');
                    placeholder.value = '';
                    placeholder.textContent = '-- Pilih Bobot --';
                    select.appendChild(placeholder);

                    originalOptions[i].forEach(option => {
                        if (option.value === '' || option.value === currentValue || !selectedValues
                            .includes(option.value)) {
                            select.appendChild(option.cloneNode(true));
                        }
                    });
                    select.value = currentValue;
                });
            }

            updateOptions();
            selects.forEach(s => s.addEventListener('change', updateOptions));
        });
    </script>
</body>

</html>
