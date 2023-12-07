<?php

namespace App\Http\Controllers;
use App\Keuangan;
use App\Event;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class KeuanganController extends Controller
{
    function index(){
        $keuangans = Keuangan::all();
        return view('admin.keuangan', compact('keuangans'));
    }
    function listKeuanganEvent($id){
        $keuangans = Keuangan::where('event_id', $id)->get();
        $event = Event::find($id);
        return view('admin.list-keuangan-event', compact('keuangans','event'));
    }
    function listPemasukan(){
        $keuangans = Keuangan::where('jenis', 'Pemasukan')->get();
        return view('admin.list-pemasukan', compact('keuangans'));
    }
    function listPengeluaran(){
        $keuangans = Keuangan::where('jenis', 'Pengeluaran')->get();
        return view('admin.list-pengeluaran', compact('keuangans'));
    }
    function adminCreate($id){
        $event = Event::find($id);
        return view('admin.tambah-keuangan', compact('event'));
    }
    function store(Request $request, $id) {
        $request->validate([
            'tanggal' => 'required|date',
            'catatan' => 'required|string',
            'jenis' => 'required|string',
            'total' => 'required|string',
            'bukti' => 'required',
            'event_id' => 'required|string',
            'organizer_id' => 'required|string',
        ]);

        DB::beginTransaction(); // Mulai transaksi database
        try {
            $event = Event::find($id);
            $image = $request->file('bukti');
            $imageName = now()->format('YmdHis').'-'.$event->nama_event.'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/keuangans'), $imageName);

            $keuangan = Keuangan::create([
                'tanggal' => $request->tanggal,
                'catatan' => $request->catatan,
                'jenis' => $request->jenis,
                'total' => $request->total,
                'bukti' => $imageName,
                'event_id' => $request->event_id,
                'organizer_id' => $request->organizer_id, // Perbaikan: Gunakan organizer_id alih-alih organizer
            ]);

            DB::commit(); // Commit transaksi database

            return redirect(route('admin-list-keuangan'))->withInput()->with('sukses', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback transaksi database dalam kasus exception
            // Tangani exception, log, atau kembalikan respons error
        }
    }

}