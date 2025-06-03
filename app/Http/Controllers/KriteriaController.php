<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kriteria;


class KriteriaController extends Controller
{
    //
    public function index()
    {
        $kriteria = kriteria::all();
        return view('kriteria.kriteria', compact('kriteria'));
    }
    public function create()
    {
        return view('kriteria.kriteria-entry');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'bobot' =>'required',
            'type' =>'required',
        ]);
        kriteria::create([
            'nama' => $request->nama,
            'bobot' => $request->bobot,
            'type' => $request->type,
        ]);

        return redirect('/kriteria')->with('success', 'Data kriteria berhasil ditambahkan!');
    }
    public function edit($id)
    {
        $kriteria = kriteria::find($id);
        return view('kriteria.kriteria-edit', compact('kriteria'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama' => 'required',
            'bobot' => 'required',
            'type' => 'required',
        ]);

        $kriteria = kriteria::find($id);
        $kriteria->update([
            'nama' => $request->nama,
            'bobot' => $request->bobot,
            'type' => $request->type,
        ]);
        return redirect('/kriteria')->with('success', 'Data kriteria berhasil diperbarui!');
    }
    public function hapus($id)
    {
        $kriteria = kriteria::findOrFail($id);
        $kriteria->delete();

        return redirect()->route('kriteria.kriteria')->with('success', 'Data berhasil dihapus.');
    }
}
