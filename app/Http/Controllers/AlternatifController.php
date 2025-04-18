<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\wisata;

class AlternatifController extends Controller
{
    public function index()
    {
        $alternatif = wisata::all();
        return view('data_alternatif.alternatif',compact('alternatif'));
    }
    public function create()
    {
        return view('data_alternatif.alternatif-entry');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_wisata' => 'required',
            'kategori' => 'required',
            'harga_tiket' => 'required',
            'estimasi_transport' => 'required',
            'estimasi_penginapan' => 'required',
            'konsumsi' => 'required',
            'parkir' => 'required',
            'toilet' => 'required',
            'tempat_difabel' => 'required',
            'jarak' => 'required',
            'tersedia_transportasi' => 'required',
            'kondisi_jalan' => 'required',
            'rating' => 'required',
            'jumlah_kunjungan' => 'required',
        ]);
        wisata::create([
            'nama_wisata' => $request->nama_wisata,
            'kategori' => $request->kategori,
            'harga_tiket' => $request->harga_tiket,
            'estimasi_transport' => $request->estimasi_transport,
            'estimasi_penginapan' => $request->estimasi_penginapan,
            'konsumsi' => $request->konsumsi,
            'parkir' => $request->parkir,
            'toilet' => $request->toilet,
            'tempat_difabel' => $request->tempat_difabel,
            'jarak' => $request->jarak,
            'tersedia_transportasi' => $request->tersedia_transportasi,
            'kondisi_jalan' => $request->kondisi_jalan,
            'rating' => $request->rating,
            'jumlah_kunjungan' => $request->jumlah_kunjungan,
        ]);

        return redirect('/alternatif');
    }
    public function hapus($id)
    {
        $alternatif = wisata::findOrFail($id);
        $alternatif->delete();

        return redirect()->route('data_alternatif.alternatif')->with('success', 'Data berhasil dihapus.');
    }
}
