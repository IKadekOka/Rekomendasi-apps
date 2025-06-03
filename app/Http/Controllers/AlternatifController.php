<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\wisata;
use App\Models\alternatif;
use App\Models\Kategori;

class AlternatifController extends Controller
{
    public function index(){
        $alternatifs = alternatif::all();
        return view('alternatif.alternatif', compact('alternatifs'));
    }

    public function create(){
        $kategori = Kategori::all();
        return view('alternatif.alternatif-entry', compact('kategori'));
    }

    public function  store(Request $request){
        // dd($request->all());
        $this->validate($request, [
            'nama' => 'required',
            'lokasi' =>'required',
            'kategori_id' =>'required',
            'longitude' =>'required',
            'latitude' =>'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',   
        ]);
        $gambarPath = $request->file('gambar')->store('gambar', 'public');
        alternatif::create([
            'nama' => $request->nama,
            'lokasi' => $request->lokasi,
            'kategori_id' => $request->kategori_id,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
            'gambar' => $gambarPath,
        ]);
        
        return redirect()->route('alternatif.alternatif')->with('success', 'Data alternatif berhasil ditambahkan!');
    }
    
    
    public function edit($id)
    {
        $kategori = Kategori::all();
        $alternatifs = alternatif::find($id);
        return view('alternatif.alternatif-edit', compact('alternatifs','kategori'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama' => 'required',
            'lokasi' => 'required',
            'kategori_id' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',  
        ]);
        $alternatifs = alternatif::find($id);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($alternatifs->gambar && file_exists(public_path('storage/' . $alternatifs->gambar))) {
                unlink(public_path('storage/' . $alternatifs->gambar));
            }
    
            // Simpan gambar baru
            $gambarBaru = $request->file('gambar')->store('gambar', 'public');
            $alternatifs->gambar = $gambarBaru;
        }

        $alternatifs->update([
            'nama' => $request->nama,
            'lokasi' => $request->lokasi,
            'kategori_id' => $request->kategori_id,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);
        return redirect()->route('alternatif.alternatif')->with('success', 'Data alternatif berhasil diperbarui!');
    }
    public function hapus($id)
    {
        $alternatifs = alternatif::findOrFail($id);
        $alternatifs->delete();

        return redirect()->route('alternatif.alternatif')->with('success', 'Data berhasil dihapus.');
    }
}
