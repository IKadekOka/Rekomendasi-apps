<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubKriteria;
use App\Models\kriteria;

class SubkriteriaController extends Controller
{
    //
    public function index()
    {
        $subkriteria = SubKriteria::all();
        return view('sub_kriteria.sub_kriteria',compact('subkriteria'));
    }
    public function create()
    {
        $kriteria = kriteria::all();
        return view('sub_kriteria.sub_kriteria-entry', compact('kriteria'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'nama' => 'required',
            'kriteria_id' =>'required',
            'type' =>'required',
        ]);
        SubKriteria::create([
            'nama' => $request->nama,
            'kriteria_id' => $request->kriteria_id,
            'type' => $request->type,
        ]);

        return redirect()->route('sub_kriteria.sub_kriteria');
    }
    public function edit($id)
    {
        $subkriteria = SubKriteria::find($id);
        $kriteria = kriteria::all();
        return view('sub_kriteria.sub_kriteria-edit', compact('subkriteria', 'kriteria'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama' => 'required',
            'kriteria_id' => 'required',
            'type' => 'required',
        ]);

        $subkriteria = SubKriteria::find($id);
        $subkriteria->update([
            'nama' => $request->nama,
            'kriteria_id' => $request->kriteria_id,
            'type' => $request->type,
        ]);
        return redirect()->route('sub_kriteria.sub_kriteria');
    }
    public function hapus($id)
    {
        $subkriteria = SubKriteria::findOrFail($id);
        $subkriteria->delete();

        return redirect()->route('sub_kriteria.sub_kriteria')->with('success', 'Data berhasil dihapus.');
    }
}
