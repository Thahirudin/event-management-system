<?php

namespace App\Http\Controllers;

use App\Order;
use App\Event;
use App\Harga;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    function index()
    {
        $orders = Order::with(['harga'])->get();
        return view('admin.list-order', ['orders' => $orders]);
    }
    function listOrderEvent($id)
    {
        $orders = Order::where('id_event', $id)->with(['harga', 'event'])->get();
        return view('admin.list-order-event', ['orders' => $orders]);
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
        $request->validate([
            'id_member' => 'required',
            'id_event' => 'required',
            'status' => 'required',
            'id_harga' => 'required',
            'bukti' => 'required',
        ]);
        DB::beginTransaction(); // Mulai transaksi database
        try {
            $image = $request->file('bukti');
            $imageName = now()->format('YmdHis') . '-' . $request->nama . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/orders'), $imageName);
            $order = Order::create([
                'id_member' => $request->id_member,
                'id_event' => $request->id_event,
                'id_harga' => $request->id_harga,
                'status' => $request->status,
                'bukti' => $imageName,
            ]);
            $harga = Harga::find($request->id_harga);
            $harga->update([
                'jumlah_tiket' => $harga->jumlah_tiket - 1,
            ]);
            DB::commit(); // Commit transaksi database

            // Redirect back or to a success page
            return redirect(route('admin-list-order'))->with('sukses', 'Order Berhasil Ditambahkan');

        } catch (QueryException $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }

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