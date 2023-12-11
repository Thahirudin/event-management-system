<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Kategori;
class KategoriController extends Controller
{
    // Function Halaman Admin
    function index(){
        $kategoris = Kategori::all();
        return view('admin.kategori', compact('kategoris'));
    }
    function adminCreate(){
        return view('admin.tambah-kategori');
    }
    function store(Request $request){
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'slug' => 'required',
        ]);
        $kategori = new Kategori($validatedData);
        $kategori->save();

        return redirect('/admin/list-kategori')->with('sukses', 'Kategori Berhasil Ditambah');
    }
    function adminEdit($id)
    {
        $kategori = Kategori::find($id);
        return view('admin.edit-kategori', compact('kategori'));
    }
    function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'slug' => 'required',
        ]);
        $kategori = Kategori::find($id);
        $kategori->update([
            'nama' => $request->nama,
            'slug' => $request->slug,
            // Sesuaikan dengan nama kolom yang ingin Anda edit
        ]);
        return redirect('/admin/list-kategori')->with('sukses', 'Kategori Berhasil DiEdit');
    }
    function destroy($id){
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
        $request->validate([
            'nama' => 'required|max:255',
            'slug' => 'required',
        ]);
        $kategori = Kategori::find($id);
        $kategori->update([
            'nama' => $request->nama,
            'slug' => $request->slug,
            // Sesuaikan dengan nama kolom yang ingin Anda edit
        ]);
        return redirect('/organizer/list-kategori')->with('sukses', 'Kategori Berhasil DiEdit');
    }
    function organizerDestroy($id)
    {
        $kategori = Kategori::find($id);
        // Hapus data
        $kategori->delete();
        return redirect('/organizer/list-kategori')->with('sukses', 'Kategori Berhasil Di Hapus');
    }
}