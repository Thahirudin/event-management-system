<?php

namespace App\Http\Controllers;

use App\Order;
use App\Event;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    function index()
    {
        $orders = order::all();
        return view('admin.list-order', ['orders' => $orders]);
    }

    public function admincreate($id)
    {
        $event = Event::with(['harga', 'kategori', 'user'])->find($id);
        return view('admin.tambah-order', compact('event'));
    }

    public function adminedit($id)
{
    $order = Order::find($id);
    return view('admin.edit-order', ['order' => $order]);
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

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'member_id' => 'required',
            'event_id' => 'required',
            'status' => 'required',
            'harga' => 'required',
            'bukti' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the validation rules for the file
        ]);

        // Find the order by ID
        $order = Order::findOrFail($id);

        // Update the order with the new data
        $order->update([
            'member_id' => $request->input('member_id'),
            'event_id' => $request->input('event_id'),
            'status' => $request->input('status'),
            'harga' => $request->input('harga'),
            // Add other fields as needed
        ]);

        // Handle file upload if a new file is provided
        if ($request->hasFile('bukti')) {
            $file = $request->file('bukti');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('bukti', $fileName, 'public');
            $order->bukti = $fileName;
            $order->save();
        }

        // Redirect or return a response as needed
        return redirect('/admin/list-order')->with('sukses', 'order Berhasil DiEdit');
    }
}
