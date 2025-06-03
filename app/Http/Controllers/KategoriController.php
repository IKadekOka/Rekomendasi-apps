<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;


class KategoriController extends Controller
{
    //
    public function index()
    {
        $kategori = Kategori::all();
        return view('kategori.kategori', compact('kategori'));
    }
    public function create()
    {
        return view('kategori.kategori-entry');
    }
    public function  store(Request $request){
        // dd($request->all());
        $this->validate($request, [
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);
        kategori::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ]);
        
        return redirect('/kategori')->with('success', 'Data kriteria berhasil ditambahkan!');
    }
    public function edit($id)
    {
        $kategori = Kategori::find($id);
        return view('kategori.kategori-edit', compact('kategori'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);
        $kategori = Kategori::find($id);
        $kategori->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ]);
        return redirect('/kategori')->with('success', 'Data kriteria berhasil diperbarui!');
    }
    public function hapus($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect()->route('kategori.kategori')->with('success', 'Data berhasil dihapus.');
    }
}
