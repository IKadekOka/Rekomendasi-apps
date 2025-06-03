<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubKriteria;
use App\Models\alternatif;
use App\Models\nilai_alternatif;
use App\Models\kriteria;
use App\Models\Event;
use App\Models\Hasil;

class PerhitunganController extends Controller
{
    //
    public function index(Request $request)
    {
            // Ambil kategori dari request (?kategori=adventure misalnya)
        $kategori = $request->input('kategori');

        // Ambil data nilai alternatif yang memiliki alternatif dengan kategori sesuai
        $nilaiAlternatif = nilai_alternatif::with(['alternatif', 'subKriteria'])
            ->whereHas('alternatif', function ($query) use ($kategori) {
                if ($kategori) {
                    $query->where('kategori', $kategori);
                }
            })
            ->get();

        // Ambil data pendukung
        $subkriteria = SubKriteria::all();
        $kriteria = kriteria::with('sub_kriterias')->get();
        // Filter alternatif berdasarkan nilaiAlternatif yang sudah difilter kategorinya
        $alternatifs = $nilaiAlternatif->pluck('alternatif')->unique('id')->values();


        // Ambil data dengan relasi
        $nilaiAlternatif = nilai_alternatif::with(['alternatif', 'subKriteria'])->get();
        $subkriteria = SubKriteria::all();
        $kriteria = kriteria::with('sub_kriterias')->get(); // penting: with relasi sub_kriterias
        $alternatifs = $nilaiAlternatif->pluck('alternatif')->unique('id')->values();

        // Buat array [id_alternatif][id_subkriteria] => nilai
        $dataNilai = [];
        foreach ($nilaiAlternatif as $nilai) {
            $dataNilai[$nilai->alternatif_id][$nilai->subkriteria_id] = $nilai->nilai;
        }

        // Buat array [id_alternatif][id_kriteria] => total_nilai dari subkriteria
        $dataKriteria = [];
        $dataKriteriaAsli = [];
        foreach ($alternatifs as $alt) {
            foreach ($kriteria as $krit) {
                $total = 0;
                foreach ($krit->sub_kriterias as $sub) {
                    $nilai = $dataNilai[$alt->id][$sub->id] ?? 0;
                    $total += (float) $nilai;
                }
                $dataKriteriaAsli[$alt->id][$krit->id] = $total;
                // dd($dataKriteriaAsli);
                if ($krit->nama === 'biaya') { // atau pakai $krit->id === X jika kamu tahu ID-nya
                    if ($total <= 500000) {
                        $total = 5;
                    } elseif ($total <= 1000000) {
                        $total = 4;
                    } elseif ($total <= 1500000) {
                        $total = 3;
                    } elseif ($total <= 2000000) {
                        $total = 2;
                    } else {
                        $total = 1;
                    }
                }
                $dataKriteria[$alt->id][$krit->id] = $total;
            }
        }
        

        // === Normalisasi MOORA ===
        $normalisasi = [];
        $pembagi = [];

        // Langkah 1: Hitung penyebut (akar jumlah kuadrat per kriteria)
        foreach ($kriteria as $krit) {
            $jumlahKuadrat = 0;
            foreach ($alternatifs as $alt) {
                $nilai = $dataKriteria[$alt->id][$krit->id] ?? 0;
                $jumlahKuadrat += pow($nilai, 2); // atau $nilai * $nilai
            }
            $pembagi[$krit->id] = $jumlahKuadrat > 0 ? sqrt($jumlahKuadrat) : 1; // Hindari pembagian dengan nol
        }
        

        // Langkah 2: Normalisasi setiap nilai alternatif per kriteria
        foreach ($alternatifs as $alt) {
            foreach ($kriteria as $krit) {
                $nilaiAsli = $dataKriteria[$alt->id][$krit->id] ?? 0;
                $penyebut = $pembagi[$krit->id];
                $normalisasi[$alt->id][$krit->id] = round($nilaiAsli / $penyebut, 9);
            }
        }

        // === Optimasi MOORA ===
        $normalisasiTerbobot = [];
        $yi = [];
        
        foreach ($alternatifs as $alt) {
            $baris = []; // untuk menyimpan setiap nilai terbobot dalam satu alternatif
            $benefit = 0;
            $cost = 0;
        
            foreach ($kriteria as $krit) {
                $nilai = $normalisasi[$alt->id][$krit->id] ?? 0;
                $bobot = $krit->bobot;
                $terbobot = $nilai * $bobot;
        
                // Simpan ke array hasil akhir untuk tampilan tabel seperti gambar
                $baris[] = $terbobot;
        
                // Proses MOORA
                if (strtolower($krit->type) === 'benefit') {
                    $benefit += $terbobot;
                } else {
                    $cost += $terbobot;
                }
            }
        
            $normalisasiTerbobot[] = $baris;
            $yi[$alt->id] = $benefit - $cost;
        }
        
        // dd($normalisasiTerbobot);
        
        // === Ranking ===


        $ranking = collect($yi)->sortDesc()->map(function ($value, $key) use ($alternatifs) {
            $alt = $alternatifs->firstWhere('id', $key);
            return [
                'alternatif' => $alt,
                'yi' => $value
            ];
        })->values();

        $hasilData = [];
        $rank = 1;
        foreach ($ranking as $item) {
            $hasilData[] = [
                'alternatif_id' => $item['alternatif']->id,
                'skor' => round($item['yi'], 9),
                'ranking' => $rank++,
            ];
        }

        Hasil::upsert(
            $hasilData,
            ['alternatif_id'],
            ['skor', 'ranking']
        );

        if ($request->is('user-hasil')) {
            $eventAlternatifIds = Event::pluck('alternatif_id')->toArray(); // atau ->toCollection() kalau mau pakai Collection
            return view('user.user-hasil', compact('ranking', 'eventAlternatifIds'));
        } else {
            return view('perhitungan.perhitungan', compact(
                'alternatifs',
                'subkriteria',
                'dataNilai',
                'kriteria',
                'dataKriteria',
                'normalisasi',
                'dataKriteriaAsli',
                'yi',
                'ranking',
                'normalisasiTerbobot'
            ));
        }

    }
    public function detailevent($id)
    {
        $event = Event::with('alternatif')->findOrFail($id);
        return view('user.detailevent', compact('event'));
    }

}
