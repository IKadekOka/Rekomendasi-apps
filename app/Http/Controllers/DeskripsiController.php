<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deskripsi;
use Validator;

class DeskripsiController extends Controller
{
    function index($id)
    {
        $skala_deskripsis = Deskripsi::where('sub_kriteria_id', $id)->get();
        return view('deskripsi.deskripsi',['id' => $id, 'skala_deskripsis' => $skala_deskripsis]);
    }

    function insert(Request $request)
    {
     if($request->ajax())
     {
      $rules = array(

       'nilai.*'  => 'required',
       'deskripsi.*'  => 'required'
      );
      $error = Validator::make($request->all(), $rules);
      if($error->fails())
      {
       return response()->json([
        'error'  => $error->errors()->all()
       ]);
      }

        $nilai = $request->nilai;
        $deskripsi = $request->deskripsi;
        $insert_data = [];

        for($count = 0; $count < count($nilai); $count++) {
            $data = [
                'nilai' => $nilai[$count],
                'deskripsi' => $deskripsi[$count],
                'sub_kriteria_id' => $request->sub_kriteria_id
            ];
            $insert_data[] = $data;
        }

        Deskripsi::insert($insert_data);
            return response()->json([
            'success'  => 'Data Added successfully.'
            ]);
        }
    }
    public function edit($id){
        $skala_deskripsis = Deskripsi::find($id);
        return view('deskripsi.deskripsi-edit', ['id' => $id, 'skala_deskripsis' => $skala_deskripsis]);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nilai' => 'required',
            'deskripsi' => 'required',
        ]);

        $skala_deskripsis = Deskripsi::find($id);
        $skala_deskripsis->update([
            'nilai' => $request->nilai,
            'deskripsi' => $request->deskripsi,
            'sub_kriteria_id' => $skala_deskripsis->sub_kriteria_id
        ]);
        return redirect()->route('deskripsi.deskripsi', ['id' => $skala_deskripsis->sub_kriteria_id]);
    }
    public function hapus($id)
    {
        $skala_deskripsis = Deskripsi::findOrFail($id);
        $skala_deskripsis->delete();

        return redirect()->route('deskripsi.deskripsi', ['id' => $skala_deskripsis->sub_kriteria_id])->with('success', 'Data berhasil dihapus.');
    }
}
