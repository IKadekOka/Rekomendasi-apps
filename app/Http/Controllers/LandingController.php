<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\alternatif;
use App\Models\Event;
use App\Models\kriteria;
use App\Models\nilai_alternatif;
use App\Models\SubKriteria;
use Illuminate\Support\Facades\DB;

class LandingController extends Controller
{
    //
    public function index()
    {
        $kategori = Kategori::all();
        $alternatif = alternatif::all();
        $kriteria = kriteria::all();

        $event = Event::all();

        return view('user.user', compact('kategori','alternatif','event','kriteria'));
    }
    public function information()
    {
        $event = Event::all();
        return view('user.information', compact('event'));
    }
    
    public function showForm()
    {
        $kriteria = Kriteria::orderByDesc('bobot')->get();
        $allBobot = $kriteria->pluck('bobot')->unique()->sortDesc()->values();

        return view('user.form-bobot', compact('kriteria', 'allBobot'));
    }   
    public function submitBobot(Request $request)
    {
        $kriteria = Kriteria::orderByDesc('bobot')->get();
        $allBobot = $kriteria->pluck('bobot')->unique()->sortDesc()->values();

        // Ambil bobot baru dari input user
        $bobotInputUser = $request->input('bobot_baru', []);

        // Proses seperti kode perhitungan MOORA-mu di sini (simplifikasi)
        // Ambil data nilai alternatif yang sesuai
        $nilaiAlternatif = nilai_alternatif::with(['alternatif', 'subKriteria'])->get();
        $subkriteria = SubKriteria::all();
        $kriteria = Kriteria::with('sub_kriterias')->get();
        $alternatifs = $nilaiAlternatif->pluck('alternatif')->unique('id')->values();

        // Proses nilai dan normalisasi sama seperti sebelumnya,
        // tapi pakai bobot dari input user jika ada, atau bobot asli

        // --- Contoh simplifikasi ---
        // Buat array nilai kriteria dari subkriteria
        $dataNilai = [];
        foreach ($nilaiAlternatif as $nilai) {
            $dataNilai[$nilai->alternatif_id][$nilai->subkriteria_id] = $nilai->nilai;
        }

        $dataKriteria = [];
        foreach ($alternatifs as $alt) {
            foreach ($kriteria as $krit) {
                $total = 0;
                foreach ($krit->sub_kriterias as $sub) {
                    $nilai = $dataNilai[$alt->id][$sub->id] ?? 0;
                    $total += (float) $nilai;
                }
                if ($krit->nama === 'biaya') {
                    if ($total <= 500000) $total = 5;
                    else if ($total <= 1000000) $total = 4;
                    else if ($total <= 1500000) $total = 3;
                    else if ($total <= 2000000) $total = 2;
                    else $total = 1;
                }
                $dataKriteria[$alt->id][$krit->id] = $total;
            }
        }

        // Normalisasi
        $pembagi = [];
        foreach ($kriteria as $krit) {
            $jumlahKuadrat = 0;
            foreach ($alternatifs as $alt) {
                $nilai = $dataKriteria[$alt->id][$krit->id] ?? 0;
                $jumlahKuadrat += pow($nilai, 2);
            }
            $pembagi[$krit->id] = $jumlahKuadrat > 0 ? sqrt($jumlahKuadrat) : 1;
        }

        $normalisasi = [];
        foreach ($alternatifs as $alt) {
            foreach ($kriteria as $krit) {
                $nilaiAsli = $dataKriteria[$alt->id][$krit->id] ?? 0;
                $normalisasi[$alt->id][$krit->id] = $nilaiAsli / $pembagi[$krit->id];
            }
        }

        // Hitung yi dengan bobot input user jika ada
        $yi = [];
        foreach ($alternatifs as $alt) {
            $benefit = 0;
            $cost = 0;

            foreach ($kriteria as $krit) {
                $nilai = $normalisasi[$alt->id][$krit->id] ?? 0;
                $bobot = isset($bobotInputUser[$krit->id]) && is_numeric($bobotInputUser[$krit->id])
                    ? (float) $bobotInputUser[$krit->id]
                    : $krit->bobot;

                $terbobot = $nilai * $bobot;

                if (strtolower($krit->type) === 'benefit') {
                    $benefit += $terbobot;
                } else {
                    $cost += $terbobot;
                }
            }
            $yi[$alt->id] = $benefit - $cost;
        }

        // Ranking
        $ranking = collect($yi)->sortDesc()->map(function ($value, $key) use ($alternatifs) {
            $alt = $alternatifs->firstWhere('id', $key);
            return [
                'alternatif' => $alt,
                'yi' => $value
            ];
        })->values();

        $eventAlternatifIds = Event::pluck('alternatif_id')->toArray();

        return view('user.form-bobot', compact(
            'ranking',
            'eventAlternatifIds',
            'kriteria',
            'allBobot',
            'bobotInputUser'
        ));
    }
}
