<?php

namespace App\Http\Controllers;
use App\Keuangan;
use App\Event;
use Illuminate\Http\Request;

class KeuanganController extends Controller
{
    function index(){
        $keuangans = Keuangan::all();
        return view('admin.keuangan', compact('keuangans'));
    }
    function adminCreate($id){
        $event = Event::find($id);
        return view('admin.tambah-keuangan', compact('event'));
    }
    function store(Request $request, $id){
        $request->validate([
            'tanggal' => 'required|date',
            'catatan' => 'required|string',
            'jenis' => 'required|string',
            'total' => 'required|string',
            'bukti' => 'required|string',
            'event_id' => 'required|string',
            'organizer_id' => 'required|string',
        ]);
        DB::beginTransaction(); // Mulai transaksi database
        try {

            $image = $request->file('bukti');
            $imageName = now()->format('YmdHis') . '-' . $request->catatan . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/keuangans'), $imageName);

            $event = Event::create([
                'tanggal' => $request->tanggal,
                'catatan' => $request->catatan,
                'jenis' => $request->jenis,
                'total' => $request->total,
                'bukti' => $imageName,
                'event_id' => $request->event_id,
                'organizer' => $request->organizer,
            ]);
            DB::commit(); // Commit transaksi database

            return redirect(route('admin-list-keuangan'))->withInput()->with('sukses', 'Data berhasil disimpan');
        }catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }

    }
}