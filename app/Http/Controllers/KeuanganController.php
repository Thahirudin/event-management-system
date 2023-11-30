<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KeuanganController extends Controller
{
    function index(){
        $keuangans = Keuangan::all();
        return view('admin.keuangan', compact('keuangans'));
    }
    function adminCreate(){
        return view('admin.tambah-keuangan');
    }
}
