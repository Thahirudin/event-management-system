<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use App\Event;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;

class EventController extends Controller
{
    function index()
    {
        $events = Event::with(['harga', 'kategori', 'user'])->get();
        return view('admin.list-event', compact('events'));
    }
    function adminEventAkanDatang()
    {
        $events = Event::with(['harga', 'kategori', 'user'])->where('status', 'Akan Datang')->get();
        return view('admin.event-akan-datang', compact('events'));
    }
    function adminEventSelesai()
    {
        $events = Event::with(['harga', 'kategori', 'user'])->where('status', 'Selesai')->get();
        return view('admin.event-akan-datang', compact('events'));
    }
    function adminEventBatal()
    {
        $events = Event::with(['harga', 'kategori', 'user'])->where('status', 'Batal')->get();
        return view('admin.event-akan-datang', compact('events'));
    }
    function adminCreate()
    {
        $kategoris = Kategori::all();
        return view('admin.tambah-event', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_organizer' => 'required|exists:tbl_organizers,id',
            'kategori' => 'required|exists:tbl_kategoris,id',
            'nama_event' => 'required',
            'waktu' => 'required',
            'lokasi' => 'required',
            'detail' => 'required',
            'kontak' => 'required',
            'nama_harga.*' => 'required',
            'harga.*' => 'required',
            'jumlah_tiket.*' => '|integer',
            'status' => 'required',
            'thumbnail' => 'required',
        ]);
        DB::beginTransaction(); // Mulai transaksi database

        try {

            $image = $request->file('thumbnail');
            $imageName = now()->format('YmdHis') . '-' . $request->nama_event . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/events'), $imageName);
            // Simpan data event
            $event = Event::create([
                'id_organizer' => $request->id_organizer,
                'id_kategori' => $request->kategori,
                'nama_event' => $request->nama_event,
                'waktu' => $request->waktu,
                'lokasi' => $request->lokasi,
                'detail' => $request->detail,
                'kontak' => $request->kontak,
                'status' => $request->status,
                'thumbnail' => $imageName,
            ]);

            // Simpan data harga yang terkait dengan event
            foreach ($request->nama_harga as $key => $namaHarga) {
                $event->harga()->create([
                    'nama_harga' => $namaHarga,
                    'harga' => $request->harga[$key],
                    'jumlah_tiket' => $request->harga[$key],
                ]);
            }

            DB::commit(); // Commit transaksi database

            return redirect(route('admin-list-event'))->withInput()->with('sukses', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }
    function adminEdit($id)
    {
        $event = Event::with(['harga', 'kategori', 'user'])->find($id);
        return view('admin.edit-event', compact('event'));
    }
}