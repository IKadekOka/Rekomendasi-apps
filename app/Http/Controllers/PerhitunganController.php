<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubKriteria;
use App\Models\alternatif;
use App\Models\nilai_alternatif;
use App\Models\kriteria;

class PerhitunganController extends Controller
{
    //
    public function index()
    {
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
    
        // Buat array [id_alternatif][id_kriteria] => total_nilai
        $dataKriteria = [];
        foreach ($alternatifs as $alt) {
            foreach ($kriteria as $krit) {
                $total = 0;
                foreach ($krit->sub_kriterias as $sub) {
                    $nilai = $dataNilai[$alt->id][$sub->id] ?? 0;
                    $total += (float) $nilai;
                }
                $dataKriteria[$alt->id][$krit->id] = $total;
            }
        }
    
        return view('perhitungan.perhitungan', compact(
            'alternatifs',
            'subkriteria',
            'dataNilai',
            'kriteria',
            'dataKriteria' // << hasil perhitungan ditambahkan
        ));
    }
    

}
