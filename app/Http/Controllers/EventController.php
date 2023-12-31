<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Kategori;
use App\Event;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;

class EventController extends Controller
{
    function index()
    {
        $events = Event::orderBy('waktu', 'desc')->get();
        return view('admin.list-event', compact('events'));
    }
    function adminEventAkanDatang()
    {
        $events = Event::orderBy('waktu', 'desc')->where('status', 'Akan Datang')->get();
        return view('admin.event-akan-datang', compact('events'));
    }
    function adminEventSelesai()
    {
        $events = Event::orderBy('waktu', 'desc')->where('status', 'Selesai')->get();
        return view('admin.event-selesai', compact('events'));
    }
    function adminEventBatal()
    {
        $events = Event::orderBy('waktu', 'desc')->where('status', 'Batal')->get();
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
            'status' => 'required',
            'thumbnail' => 'required',
            'slug' => 'required|unique:tbl_events,slug'
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
                'slug' => $request->slug,
            ]);

            DB::commit(); // Commit transaksi database

            return redirect(route('admin-list-event'))->withInput()->with('sukses', 'Data berhasil disimpan');
        } catch (ValidationException $e) {
            // Tangani pengecualian validasi
            DB::rollBack();
            return redirect()
                ->back()
                ->withErrors($e->errors())
                ->withInput(); // Untuk mempertahankan nilai lama (old value)
        } catch (\Exception $e) {
            // Tangani pengecualian di sini
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
    function adminEdit($id)
    {
        $event = Event::with(['harga', 'kategori', 'user'])->find($id);
        $kategoris = Kategori::all();
        return view('admin.edit-event', compact('event', 'kategoris'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_organizer' => 'required|exists:tbl_organizers,id',
            'kategori' => 'required|exists:tbl_kategoris,id',
            'nama_event' => 'required',
            'waktu' => 'required',
            'lokasi' => 'required',
            'detail' => 'required',
            'kontak' => 'required',
            'status' => 'required',
            'slug' => 'required|unique:tbl_events,slug,' . $id,
        ]);
        DB::beginTransaction();

        try {
            // Find the event by ID
            $event = Event::findOrFail($id);

            // Delete existing thumbnail if a new one is provided
            if ($request->hasFile('thumbnail')) {
                $oldThumbnailPath = public_path('uploads/events') . '/' . $event->thumbnail;
                if (file_exists($oldThumbnailPath)) {
                    unlink($oldThumbnailPath);
                }

                $image = $request->file('thumbnail');
                $imageName = now()->format('YmdHis') . '-' . $request->nama_event . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/events'), $imageName);
                $event->thumbnail = $imageName;
            }

            // Update event data
            $event->id_organizer = $request->id_organizer;
            $event->id_kategori = $request->kategori;
            $event->nama_event = $request->nama_event;
            $event->waktu = $request->waktu;
            $event->lokasi = $request->lokasi;
            $event->detail = $request->detail;
            $event->kontak = $request->kontak;
            $event->status = $request->status;
            $event->slug = $request->slug;
            $event->save();

            DB::commit();

            return redirect(route('admin-list-event'))->withInput()->with('sukses', 'Data berhasil diupdate');
        } catch (\Exception $e) {
            DB::rollBack();
            // Handle exception, you can log or return an error response
        }
    }
    function destroy($id)
    {
        try {
            // Menggunakan transaksi untuk memastikan konsistensi data
            DB::beginTransaction();

            $event = Event::find($id);
            foreach ($event->orders as $order) {
                if ($order->bukti) {
                    $thumbnailPath = public_path('uploads/orders/' . $order->bukti);
                    if (file_exists($thumbnailPath)) {
                        unlink($thumbnailPath);
                    }
                }
            }

            // Hapus thumbnail dari events
            if ($event->thumbnail) {
                $thumbnailPath = public_path('uploads/events/' . $event->thumbnail);
                if (file_exists($thumbnailPath)) {
                    unlink($thumbnailPath);
                }
            }
            // Hapus terlebih dahulu catatan terkait di tbl_orders
            $event->orders()->delete();
            $event->delete();

            // Commit transaksi jika semuanya berhasil
            DB::commit();

            return redirect('/admin/list-event')->with('sukses', 'Event Berhasil Dihapus');
        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
            DB::rollBack();

            // Handle kesalahan, misalnya redirect dengan pesan error
            return redirect('/admin/list-event')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    // Function Halaman Organizer
    function organizerListEvent()
    {
        $events = Event::orderBy('waktu', 'desc')->where('id_organizer', Auth::user()->id)->get();
        return view('organizer.list-event', compact('events'));
    }
    function organizerEventAkanDatang()
    {
        $events = Event::orderBy('waktu', 'desc')->where('id_organizer', Auth::user()->id)->where('status', 'Akan Datang')->get();
        return view('organizer.event-akan-datang', compact('events'));
    }
    function organizerEventSelesai()
    {
        $events = Event::orderBy('waktu', 'desc')->where('id_organizer', Auth::user()->id)->where('status', 'Selesai')->get();
        return view('organizer.event-selesai', compact('events'));
    }
    function organizerCreate()
    {
        $kategoris = Kategori::all();
        return view('organizer.tambah-event', compact('kategoris'));
    }
    public function organizerStore(Request $request)
    {
        $request->validate([
            'id_organizer' => 'required|exists:tbl_organizers,id',
            'kategori' => 'required|exists:tbl_kategoris,id',
            'nama_event' => 'required',
            'waktu' => 'required',
            'lokasi' => 'required',
            'detail' => 'required',
            'kontak' => 'required',
            'status' => 'required',
            'thumbnail' => 'required',
            'slug' => 'required|unique:tbl_events,slug'
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
                'slug' => $request->slug,
            ]);

            DB::commit(); // Commit transaksi database

            return redirect(route('organizer-list-event'))->withInput()->with('sukses', 'Data berhasil disimpan');
        } catch (ValidationException $e) {
            // Tangani pengecualian validasi
            DB::rollBack();
            return redirect()
                ->back()
                ->withErrors($e->errors())
                ->withInput(); // Untuk mempertahankan nilai lama (old value)
        } catch (\Exception $e) {
            // Tangani pengecualian di sini
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
    function organizerEdit($id)
    {
        try {
            $event = Event::where('id_organizer', Auth::user()->id)->findOrFail($id);
            $kategoris = Kategori::all();
            return view('organizer.edit-event', compact('event', 'kategoris'));
        } catch (ModelNotFoundException $e) {
            // abort(404, 'Data not found.');

            return redirect()->route('organizer-list-event');
        }
    }
    public function organizerUpdate(Request $request, $id)
    {
        $request->validate([
            'id_organizer' => 'required|exists:tbl_organizers,id',
            'kategori' => 'required|exists:tbl_kategoris,id',
            'nama_event' => 'required',
            'waktu' => 'required',
            'lokasi' => 'required',
            'detail' => 'required',
            'kontak' => 'required',
            'status' => 'required',
            'slug' => 'required|unique:tbl_events,slug,' . $id,
        ]);
        DB::beginTransaction();

        try {
            // Find the event by ID
            $event = Event::findOrFail($id);

            // Delete existing thumbnail if a new one is provided
            if ($request->hasFile('thumbnail')) {
                $oldThumbnailPath = public_path('uploads/events') . '/' . $event->thumbnail;
                if (file_exists($oldThumbnailPath)) {
                    unlink($oldThumbnailPath);
                }

                $image = $request->file('thumbnail');
                $imageName = now()->format('YmdHis') . '-' . $request->nama_event . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/events'), $imageName);
                $event->thumbnail = $imageName;
            }

            // Update event data
            $event->id_organizer = $request->id_organizer;
            $event->id_kategori = $request->kategori;
            $event->nama_event = $request->nama_event;
            $event->waktu = $request->waktu;
            $event->lokasi = $request->lokasi;
            $event->detail = $request->detail;
            $event->kontak = $request->kontak;
            $event->status = $request->status;
            $event->slug = $request->slug;
            $event->save();

            DB::commit();

            return redirect(route('organizer-list-event'))->withInput()->with('sukses', 'Data berhasil diupdate');
        } catch (\Exception $e) {
            DB::rollBack();
            // Handle exception, you can log or return an error response
        }
    }
    function organizerDestroy($id)
    {
        $event = Event::find($id);

        // Hapus terlebih dahulu catatan terkait di tbl_orders
        $event->orders()->delete();

        // Setelah itu, baru hapus acara
        $event->delete();
        return redirect('/organizer/list-event')->with('sukses', 'event Berhasil Di Hapus');
    }

    // Member
    function detailEvent($slug)
    {
        $events = Event::latest('waktu')->take(5)->get();
        $event = Event::where('slug', $slug)->first();
        $kategoris = Kategori::all();
        return view('member.detail-event', compact('event', 'events', 'kategoris'));
    }
    function memberAllEvent()
    {
        $events = Event::latest('waktu')->paginate(9);
        $kategoris = Kategori::all();
        $kategori2 = null;
        return view('member.all-event', compact( 'events', 'kategoris', 'kategori2'));
    }
    function memberEventKategori( $slug)
    {
        $kategori2 = Kategori::where('slug', $slug)->first();
        $events = Event::where('id_kategori', $kategori2->id)->latest('waktu')->paginate(3);
        $kategoris = Kategori::all();
        return view('member.all-event', compact('events', 'kategoris', 'kategori2'));
    }
    
}