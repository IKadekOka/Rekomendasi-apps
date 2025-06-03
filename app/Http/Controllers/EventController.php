<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\alternatif;
use App\Models\Event;

class EventController extends Controller
{
    //
    public function index()
    {
        $event = Event::all();
        return view('event.event',compact('event'));
    }
    public function create()
    {
        $alternatif = alternatif::all();
        return view('event.event-entry', compact('alternatif'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'alternatif_id' =>'required',
            'nama' => 'required',
            'tanggal_mulai' =>'required',
            'tanggal_berakhir' =>'required',
            'deskripsi' =>'required',
        ]);
        Event::create([
            'alternatif_id' => $request->alternatif_id,
            'nama' => $request->nama,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_berakhir' => $request->tanggal_berakhir,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('event.event')->with('success', 'Data kriteria berhasil ditambahkan');
    }
    public function edit($id)
    {
        $event = Event::find($id);
        $alternatif = alternatif::all();
        return view('event.event-edit', compact('event', 'alternatif'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'alternatif_id' => 'required',
            'nama' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_berakhir' => 'required',
            'deskripsi' => 'required',
        ]);

        $event = Event::find($id);
        $event->update([
            'alternatif_id' => $request->alternatif_id,
            'nama' => $request->nama,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_berakhir' => $request->tanggal_berakhir,
            'deskripsi' => $request->deskripsi,
        ]);
        return redirect()->route('event.event')->with('success', 'Data kriteria berhasil diperbarui!');
    }
    public function hapus($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('event.event')->with('success', 'Data berhasil dihapus.');
    }
    public function detailByAlternatif($id)
    {
        $alternatif = Alternatif::with('event')->findOrFail($id);
        return view('user.detailevent', compact('alternatif'));
    }

}
