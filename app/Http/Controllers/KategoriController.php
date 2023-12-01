<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
class KategoriController extends Controller
{
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
}