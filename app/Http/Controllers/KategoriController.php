<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Kategori;

class KategoriController extends Controller
{
    // Function Halaman Admin
    function index()
    {
        $kategoris = Kategori::all();
        return view('admin.kategori', compact('kategoris'));
    }
    function adminCreate()
    {
        return view('admin.tambah-kategori');
    }
    function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'nama' => 'required|max:255',
                'slug' => 'required|unique:tbl_kategoris,slug',
            ]);

            $kategori = new Kategori($validatedData);
            $kategori->save();

            return redirect('/admin/list-kategori')->with('sukses', 'Kategori Berhasil Ditambah');
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
        $kategori = Kategori::find($id);
        return view('admin.edit-kategori', compact('kategori'));
    }
    function update(Request $request, $id)
    {
        try {
            $request->validate([
                'nama' => 'required|max:255',
                'slug' => 'required|unique:tbl_kategoris,slug,' . $id,
            ]);
            $kategori = Kategori::find($id);
            $kategori->update([
                'nama' => $request->nama,
                'slug' => $request->slug,
                // Sesuaikan dengan nama kolom yang ingin Anda edit
            ]);
            return redirect('/admin/list-kategori')->with('sukses', 'Kategori Berhasil DiEdit');
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
        $kategori = Kategori::find($id);
        // Hapus data
        $kategori->delete();
        return redirect('/admin/list-kategori')->with('sukses', 'Kategori Berhasil Di Hapus');
    }

    // Function Halaman Organizer
    function organizerIndex()
    {
        $kategoris = Kategori::all();
        return view('organizer.kategori', compact('kategoris'));
    }
    function organizerCreate()
    {
        return view('organizer.tambah-kategori');
    }
    function organizerStore(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'slug' => 'required',
        ]);
        $kategori = new Kategori($validatedData);
        $kategori->save();

        return redirect('/organizer/list-kategori')->with('sukses', 'Kategori Berhasil Ditambah');
    }
    function organizerEdit($id)
    {
        $kategori = Kategori::find($id);
        return view('organizer.edit-kategori', compact('kategori'));
    }
    function organizerUpdate(Request $request, $id)
    {
        try {
            $request->validate([
                'nama' => 'required|max:255',
                'slug' => 'required|unique:tbl_kategoris,slug,' . $id,
            ]);
            $kategori = Kategori::find($id);
            $kategori->update([
                'nama' => $request->nama,
                'slug' => $request->slug,
                // Sesuaikan dengan nama kolom yang ingin Anda edit
            ]);
            return redirect('/organizer/list-kategori')->with('sukses', 'Kategori Berhasil DiEdit');
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
        $kategori = Kategori::find($id);
        // Hapus data
        $kategori->delete();
        return redirect('/organizer/list-kategori')->with('sukses', 'Kategori Berhasil Di Hapus');
    }
}