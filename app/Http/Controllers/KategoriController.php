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
}