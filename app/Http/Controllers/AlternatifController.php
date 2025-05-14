<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\wisata;
use App\Models\alternatif;

class AlternatifController extends Controller
{
    public function index(){
        $alternatifs = alternatif::all();
        return view('alternatif.alternatif', compact('alternatifs'));
    }

    public function create(){
        return view('alternatif.alternatif-entry');
    }

    public function  store(Request $request){
        // dd($request->all());
        $this->validate($request, [
            'nama' => 'required',
            'lokasi' =>'required',
            'longitude' =>'required',
            'latitude' =>'required',
        ]);
        alternatif::create([
            'nama' => $request->nama,
            'lokasi' => $request->lokasi,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
        ]);
        
        return redirect('/alternatif');
    }
    public function edit($id)
    {
        $alternatifs = alternatif::find($id);
        return view('alternatif.alternatif-edit', compact('alternatifs'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama' => 'required',
            'lokasi' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);
        $alternatifs = alternatif::find($id);
        $alternatifs->update([
            'nama' => $request->nama,
            'lokasi' => $request->lokasi,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);
        return redirect('/alternatif');
    }
    public function hapus($id)
    {
        $alternatifs = alternatif::findOrFail($id);
        $alternatifs->delete();

        return redirect()->route('alternatif.alternatif')->with('success', 'Data berhasil dihapus.');
    }
}
