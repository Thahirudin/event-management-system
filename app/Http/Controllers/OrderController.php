<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Order;
use App\Event;
use App\Harga;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

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
        $event = Event::findOrFail($id);
        return view('admin.list-order-event', compact('orders', 'event'));
    }

    public function admincreate($id)
    {
        $event = Event::find($id);
        return view('admin.tambah-order', compact('event'));
    }

    public function adminedit($id)
    {
        $order = Order::find($id);
        return view('admin.edit-order', ['order' => $order]);
    }
    public function adminTerimaOrder($id)
    {
        $order = Order::find($id);
        $order->update([
            'status' => "sukses",
            'detail' => "Order Berhasil Diterima",
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
            if ($harga) {
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
            } else {
                if ($order) {
                    $order->update([
                        'detail' => $request->detail,
                        'status' => 'ditolak',
                        // Sesuaikan dengan nama kolom yang ingin Anda edit
                    ]);
                    return redirect('/admin/list-order')->with('sukses', 'Order Berhasil Ditolak');
                } else {
                    return redirect()->back()->with('error', 'Order tidak ditemukan.');
                }
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
            $event = Event::findOrFail($request->id_event);
            // Periksa apakah jumlah tiket tersedia lebih besar dari 0
            if ($harga->jumlah_tiket > 0) {
                $image = $request->file('bukti');
                $imageName = now()->format('YmdHis') . '-' . $request->id_member . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/orders'), $imageName);

                $order = Order::create([
                    'id_member' => $request->id_member,
                    'id_event' => $request->id_event,
                    'id_harga' => $request->id_harga,
                    'nama_event' => $event->nama_event,
                    'nama_harga' => $harga->nama_harga,
                    'harga_tiket' => $harga->harga,
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
    function destroy($id)
    {
        try {
            DB::beginTransaction();
            $order = Order::find($id);
            if ($order->bukti) {
                $thumbnailPath = public_path('uploads/orders/' . $order->bukti);
                if (file_exists($thumbnailPath)) {
                    unlink($thumbnailPath);
                }
            }
            // Hapus data
            $order->delete();
            DB::commit();
            return redirect()->back()->with('sukses', 'Order Berhasil Di Hapus');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function adminTiket($orderid)
    {
        try {
            $order = Order::where('status', 'Sukses')->findOrFail($orderid);
            return view('admin.tiket', ['order' => $order]);
        } catch (ModelNotFoundException $e) {
            abort(404, 'Data not found.');
        }
    }
    public function memberTiket($orderid)
    {
        try {
            $order = Order::where('status', 'Sukses')->findOrFail($orderid);
            return view('member.tiket', ['order' => $order]);
        } catch (ModelNotFoundException $e) {
            abort(404, 'Data not found.');
        }
    }
    function organizerIndex()
    {
        $events = Event::where('id_organizer', Auth::user()->id)->get();
        $orders = [];

        foreach ($events as $event) {
            // Menggunakan pluck untuk mengambil nilai kolom 'id' dari hasil relasi
            $eventOrders = $event->orders->pluck('id')->toArray();
            $orders = array_merge($orders, $eventOrders);
        }

        return view('organizer.list-order', ['orders' => $orders]);
    }

    function organizerTerimaOrder($id)
    {
        $order = Order::find($id);

        if (!$order) {
            return redirect()->back()->with('error', 'Order tidak ditemukan.');
        }

        $order->update([
            'status' => 'sukses',
            'detail' => 'Order Berhasil Diterima',
        ]);

        return redirect('/organizer/list-order')->with('sukses', 'Order Berhasil Diterima oleh Organizer');
    }
    public function organizerTolakOrder(Request $request, $id)
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

                return redirect('/organizer/list-order')->with('sukses', 'Order Berhasil Ditolak');
            } else {
                return redirect()->back()->with('error', 'Order tidak ditemukan.');
            }
        } catch (QueryException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    function organizerListOrderEvent($id)
    {
        try {
            $event = Event::where('id_organizer', Auth::user()->id)->findOrFail($id);

            // Mengambil pesanan (orders) yang terkait dengan event yang telah ditemukan
            $orders = $event->orders->pluck('id')->toArray();
            return view('organizer.list-order-event', compact('orders', 'event'));
        } catch (QueryException $e) {
            // Tangani eksepsi di sini, bisa di-log atau memberikan respons yang sesuai
            // Contoh respons:
            abort(404, 'Data not found.');
        }
    }
    function organizerDestroy($id)
    {
        try {
            DB::beginTransaction();
            $order = Order::find($id);
            if ($order->bukti) {
                $thumbnailPath = public_path('uploads/orders/' . $order->bukti);
                if (file_exists($thumbnailPath)) {
                    unlink($thumbnailPath);
                }
            }
            // Hapus data
            $order->delete();
            DB::commit();
            return redirect()->back()->with('sukses', 'Order Berhasil Di Hapus');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    function memberIndex()
    {
        $orders = Order::where('id_member', Auth::guard('member')->user()->id)->get();
        return view('member.list-order', ['orders' => $orders]);
    }
    public function memberCreate($id)
    {
        $event = Event::find($id);
        return view('member.tambah-order', compact('event'));
    }
    public function memberStore(Request $request)
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
            $event = Event::findOrFail($request->id_event);
            // Periksa apakah jumlah tiket tersedia lebih besar dari 0
            if ($harga->jumlah_tiket > 0) {
                $image = $request->file('bukti');
                $imageName = now()->format('YmdHis') . '-' . $request->id_member . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/orders'), $imageName);

                $order = Order::create([
                    'id_member' => $request->id_member,
                    'id_event' => $request->id_event,
                    'id_harga' => $request->id_harga,
                    'nama_event' => $event->nama_event,
                    'nama_harga' => $harga->nama_harga,
                    'harga_tiket' => $harga->harga,
                    'status' => $request->status,
                    'bukti' => $imageName,
                ]);

                // Kurangi jumlah tiket hanya jika tiket tersedia
                $harga->update([
                    'jumlah_tiket' => $harga->jumlah_tiket - 1,
                ]);

                DB::commit(); // Commit transaksi database

                // Redirect back or to a success page
                return redirect(route('member-list-order'))->with('sukses', 'Order Berhasil Ditambahkan');
            } else {
                // Jumlah tiket tidak mencukupi
                DB::rollBack();
                return redirect()->back()->with('error', 'Maaf Tiket Telah Habis ');
            }
        } catch (QueryException $e) {
            // Tangani kesalahan query
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }

    }
}