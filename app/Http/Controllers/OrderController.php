<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    function index()
    {
        $orders = order::all();
        return view('admin.list-order', ['orders' => $orders]);
    }

    public function admincreate()
    {
        return view('admin.tambah-order');
    }

    public function adminedit()
    {
        $order = Order::all(); 
        return view('admin.edit-order');
    }

    public function store(Request $request)
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
