<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    function index()
    {
        return view('admin.list-order');
    }

    public function create()
    {
        return view('admin.tambah-order');
    }

    public function edit()
    {
        return view('admin.edit-order');
    }

    function store(Request $request)
    {
        $validatedData = $request->validate([
            'member_id' => 'required',
            'event_id' => 'required',
            'status' => 'required',
            'harga' => 'required',
            'bukti' => 'required',
        ]);
        $order = new Order($validatedData);
        $order->save();

        return redirect('/admin/list-order')->with('sukses', 'Order berhasil ditambahkan');
    }
}
