<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hasil;
use App\Models\Kategori;
use App\Models\alternatif;
class HasilController extends Controller
{
    //
    public function index(Request $request)
    {
        // Ambil daftar kategori dari tabel kategori
        $kategoriList = Kategori::all();

        // Ambil filter kategori_id dari request
        $kategoriId = $request->input('kategori');

        // Query hasil beserta alternatif dan kategori
        $query = Hasil::with(['alternatif.kategori']);

        if ($kategoriId) {
            $query->whereHas('alternatif', function ($q) use ($kategoriId) {
                $q->where('kategori_id', $kategoriId);
            });
        }

        // Urutkan hasil
        $hasil = $query->orderBy('ranking')->get();

        return view('user.hasil-kategori', compact('hasil', 'kategoriList', 'kategoriId'));
    }

}
