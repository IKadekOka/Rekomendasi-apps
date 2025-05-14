<?php

namespace App\Http\Controllers;

use App\Models\nilai_alternatif;
use Illuminate\Http\Request;
use App\Models\SubKriteria;
use App\Models\alternatif;
use App\Models\kriteria;
use App\Models\Deskripsi;

class NilaiAlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nilaiAlternatif = nilai_alternatif::with(['alternatif', 'kriteria', 'subKriteria'])->get();

        

        return view('nilai_alternatif.nilai_alternatif', compact('nilaiAlternatif'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subkriteria = SubKriteria::all();
        $alternatifs = alternatif::all();
        $kriteria = kriteria::all();
        return view('nilai_alternatif.nilai_alternatif-entry',compact('subkriteria','alternatifs','kriteria'));
    }

    public function getSubKriteria($kriteria_id)
    {
        $subkriteria = SubKriteria::where('kriteria_id', $kriteria_id)->get();
        return response()->json($subkriteria);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'alternatif_id' => 'required',
            'kriteria_id' => 'required',
            'subkriteria_id' => 'required',
            'nilai' => 'required'
        ]);
        
        nilai_alternatif::create([
            'kriteria_id' => $request->kriteria_id,
            'subkriteria_id' => $request->subkriteria_id,
            'alternatif_id' => $request->alternatif_id,
            'nilai' => $request->nilai
        ]);

        return redirect()->route('nilai_alternatif.nilai_alternatif');
    }

    /**
     * Display the specified resource.
     */
    public function show(nilai_alternatif $nilai_alternatif)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) // <- pakai $id ya, bukan type hint model
    {
        $nilaiAlternatif = nilai_alternatif::findOrFail($id);
        $subkriteria = SubKriteria::where('kriteria_id', $nilaiAlternatif->kriteria_id)->get(); // hanya subkriteria terkait
        $kriteria = kriteria::all();
        $alternatifs = alternatif::all();
    
        return view('nilai_alternatif.nilai_alternatif-edit', compact('subkriteria', 'kriteria','alternatifs','nilaiAlternatif'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'alternatif_id' => 'required',
            'kriteria_id' => 'required',
            'subkriteria_id' => 'required',
            'nilai' => 'required'
        ]);

        $nilaiAlternatif = nilai_alternatif::findOrFail($id);
        $nilaiAlternatif->update([
            'kriteria_id' => $request->kriteria_id,
            'subkriteria_id' => $request->subkriteria_id,
            'alternatif_id' => $request->alternatif_id,
            'nilai' => $request->nilai
        ]);
        return redirect()->route('nilai_alternatif.nilai_alternatif');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function hapus($id)
    {
        //
        $nilaiAlternatif = nilai_alternatif::findOrFail($id);
        $nilaiAlternatif->delete();

        return redirect()->route('nilai_alternatif.nilai_alternatif')->with('success', 'Data berhasil dihapus.');
    }

    public function getDeskripsiSkala($id)
    {
        $sub = SubKriteria::find($id);

        if (!$sub) {
            return response()->json(['error' => 'Subkriteria tidak ditemukan'], 404);
        }

        if ($sub->type !== 'skala') {
            return response()->json(['show' => false]);
        }

        $deskripsi = Deskripsi::where('sub_kriteria_id', $id)->select('nilai', 'deskripsi')->get();

        return response()->json([
            'show' => true,
            'data' => $deskripsi
        ]);
    }
}
