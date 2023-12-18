<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Harga;
use App\Event;

class HargaController extends Controller
{
    function index($id)
    {
        $hargas = Harga::where('id_event', $id)->get();
        $event = Event::findOrFail($id);
        return view('admin.list-harga', compact('hargas', 'event'));
    }
    function adminCreate($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.tambah-harga', compact('event'));
    }
    function store(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'id_event' => 'required',
                'nama_harga' => 'required|max:255',
                'harga' => 'required',
                'jumlah_tiket' => 'required',
            ]);

            $harga = new Harga($validatedData);
            $harga->save();

            return redirect()->route('admin-list-harga', ['id' => $id])->with('sukses', 'Harga Berhasil Ditambah');
        } catch (ValidationException $e) {
            // Tangani pengecualian validasi
            return redirect()
                ->back()
                ->withErrors($e->errors())
                ->withInput(); // Untuk mempertahankan nilai lama (old value)
        } catch (\Exception $e) {
            // Tangani pengecualian di sini
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
    function adminEdit($id)
    {
        $harga = Harga::find($id);
        return view('admin.edit-harga', compact('harga'));
    }
    function update(Request $request, $id)
    {
        try {
            $request->validate([
                'id_event' => 'required',
                'nama_harga' => 'required',
                'harga' => 'required',
                'jumlah_tiket' => 'required',
            ]);
            $harga = Harga::find($id);
            $harga->update([
                'nama_harga' => $request->nama_harga,
                'harga' => $request->harga,
                'jumlah_tiket' => $request->jumlah_tiket,
                // Sesuaikan dengan nama kolom yang ingin Anda edit
            ]);
            return redirect()->route('admin-list-harga', ['id' => $request->id_event])->with('sukses', 'Harga Berhasil Diedit');
        } catch (ValidationException $e) {
            // Tangani pengecualian validasi
            return redirect()
                ->back()
                ->withErrors($e->errors())
                ->withInput(); // Untuk mempertahankan nilai lama (old value)
        } catch (\Exception $e) {
            // Tangani pengecualian di sini
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
    function destroy($id)
    {
        $harga = Harga::find($id);
        // Hapus data
        $harga->delete();
         return redirect()->back()->with('sukses', 'Harga Berhasil Dihapus');
    }
    function organizerIndex($id)
    {
        $hargas = Harga::where('id_event', $id)->get();
        $event = Event::findOrFail($id);
        return view('organizer.list-harga', compact('hargas', 'event'));
    }
    function organizerCreate($id)
    {
        $event = Event::findOrFail($id);
        return view('organizer.tambah-harga', compact('event'));
    }
    function organizerStore(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'id_event' => 'required',
                'nama_harga' => 'required|max:255',
                'harga' => 'required',
                'jumlah_tiket' => 'required',
            ]);

            $harga = new Harga($validatedData);
            $harga->save();

            return redirect()->route('organizer-list-harga', ['id' => $id])->with('sukses', 'Harga Berhasil Ditambah');
        } catch (ValidationException $e) {
            // Tangani pengecualian validasi
            return redirect()
                ->back()
                ->withErrors($e->errors())
                ->withInput(); // Untuk mempertahankan nilai lama (old value)
        } catch (\Exception $e) {
            // Tangani pengecualian di sini
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
    function organizerEdit($id)
    {
        $harga = Harga::find($id);
        return view('organizer.edit-harga', compact('harga'));
    }
    function organizerUpdate(Request $request, $id)
    {
        try {
            $request->validate([
                'id_event' => 'required',
                'nama_harga' => 'required',
                'harga' => 'required',
                'jumlah_tiket' => 'required',
            ]);
            $harga = Harga::find($id);
            $harga->update([
                'nama_harga' => $request->nama_harga,
                'harga' => $request->harga,
                'jumlah_tiket' => $request->jumlah_tiket,
                // Sesuaikan dengan nama kolom yang ingin Anda edit
            ]);
            return redirect()->route('organizer-list-harga', ['id' => $request->id_event])->with('sukses', 'Harga Berhasil Diedit');
        } catch (ValidationException $e) {
            // Tangani pengecualian validasi
            return redirect()
                ->back()
                ->withErrors($e->errors())
                ->withInput(); // Untuk mempertahankan nilai lama (old value)
        } catch (\Exception $e) {
            // Tangani pengecualian di sini
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
    function organizerDestroy($id)
    {
        $harga = Harga::find($id);
        // Hapus data
        $harga->delete();
        return redirect()->back()->with('sukses', 'Harga Berhasil Dihapus');
    }
}