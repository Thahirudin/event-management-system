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
    function adminEdit($id)
    {
        $keuangan = Keuangan::find($id);
        return view('admin.edit-keuangan', compact('keuangan'));
    }
    function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            // Validate the incoming request data
            $request->validate([
                'tanggal' => 'required|date',
                'catatan' => 'required|string',
                'jenis' => 'required|string',
                'total' => 'required|string',
                'organizer_id' => 'required|string',
            ]);

            $keuangan = Keuangan::find($id);
            if (!$keuangan) {
                throw new \Exception('keuangan tidak ditemukan');
            }

            // Check if a new profile image is uploaded
            if ($request->hasFile('bukti')) {
                // Delete the old profile image if it exists
                if ($keuangan->bukti) {
                    $oldImagePath = public_path('uploads/keuangans/' . $keuangan->bukti);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }

                // Upload the new profile image
                $image = $request->file('bukti');
                
                $imageName = now()->format('YmdHis') . '-' . $keuangan->event->nama_event . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/keuangans'), $imageName);

                // Update member data including the new profile image
                $keuangan->update([
                    'tanggal' => $request->tanggal,
                    'catatan' => $request->catatan,
                    'jenis' => $request->jenis,
                    'total' => $request->total,
                    'bukti' => $imageName,
                    'event_id' => $request->event_id,
                    'organizer_id' => $request->organizer_id,
                ]);
            } else {
                // Use the existing profile image
                $keuangan->update([
                    'tanggal' => $request->tanggal,
                    'catatan' => $request->catatan,
                    'jenis' => $request->jenis,
                    'total' => $request->total,
                    'event_id' => $request->event_id,
                    'organizer_id' => $request->organizer_id,
                ]);
            }

            DB::commit(); // Commit the transaction

            return redirect('/admin/keuangan/list-keuangan')->with('sukses', 'Keuangan Berhasil DiEdit');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction in case of an exception
            return redirect()->back()->with('error', 'Gagal mengedit organizer. ' . $e->getMessage());
        }
    }
    function destroy($id){
        $keuangan = Keuangan::find($id);
        // Hapus data
        $keuangan->delete();
        return redirect('/admin/keuangan/list-keuangan')->with('sukses', 'Keuangan Berhasil Di Hapus');
    }
}