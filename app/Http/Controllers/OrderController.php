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
    function adminListOrderEvent($id)
    {
        $orders = Order::where('id_event', $id)->get();
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
    public function adminTerimaOrder($id){
        $order = Order::find($id);
        $order->update([
            'status' => "sukses",
            'detail'=> "Order Berhasil Diterima",
            // Sesuaikan dengan nama kolom yang ingin Anda edit
        ]);
        return redirect('/admin/list-order')->with('sukses', 'Order Berhasil Diterima');
    }
    public function adminTolakOrder(Request $request, $id)
    {
        try {
            $request->validate([
                'detail' => 'required',
            ]);
            
            $order = Order::find($id);
            $harga = Harga::find($order->id_harga);
            if ($order) {
                $order->update([
                    'detail' => $request->detail,
                    'status' => 'ditolak',
                    // Sesuaikan dengan nama kolom yang ingin Anda edit
                ]);
                $harga->update([
                    'jumlah_tiket' => $harga->jumlah_tiket + 1,
                ]);

                return redirect('/admin/list-order')->with('sukses', 'Order Berhasil Ditolak');
            } else {
                return redirect()->back()->with('error', 'Order tidak ditemukan.');
            }
        } catch (QueryException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
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
            $harga = Harga::find($request->id_harga);

            // Periksa apakah jumlah tiket tersedia lebih besar dari 0
            if ($harga->jumlah_tiket > 0) {
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

                // Kurangi jumlah tiket hanya jika tiket tersedia
                $harga->update([
                    'jumlah_tiket' => $harga->jumlah_tiket - 1,
                ]);

                DB::commit(); // Commit transaksi database

                // Redirect back or to a success page
                return redirect(route('admin-list-order'))->with('sukses', 'Order Berhasil Ditambahkan');
            } else {
                // Jumlah tiket tidak mencukupi
                DB::rollBack();
                return redirect()->back()->with('error', 'Maaf, tiket telah habis.');
            }
        } catch (QueryException $e) {
            // Tangani kesalahan query
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
    function destroy($id){
        try{
            $order = Order::find($id);
        // Hapus data
        $order->delete();
        return redirect()->back()->with('sukses', 'Order Berhasil Di Hapus');
        } catch (QueryException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

public function adminTiket($orderid) {
    $order = Order::find($orderid);

    return view('admin.tiket', ['order' => $order]);
}

    }

    function organizerIndex(){
        $orders = Order::with(['harga'])->get();
        return view('organizer.list-order', ['orders' => $orders]);
    }

    function organizerTerimaOrder($id){
        $order = Order::find($id);

        if (!$order) {
            return redirect()->back()->with('error', 'Order tidak ditemukan.');
        }

        $order->update([
            'status' => 'sukses',
            'detail' => 'Order Berhasil Diterima oleh Organizer',
        ]);

        return redirect('/organizer/list-order')->with('sukses', 'Order Berhasil Diterima oleh Organizer');
    }
<<<<<<< HEAD
=======
    
    function organizerListOrderEvent($id)
    {
        $orders = Order::where('id_event', $id)->get();
        return view('organizer.list-order-event', ['orders' => $orders]);
    }
}
>>>>>>> 54dabdafb346121544906139f3b55295d936ccab
