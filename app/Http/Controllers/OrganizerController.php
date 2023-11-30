<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;

class OrganizerController extends Controller
{
    function index(){
        $organizers = User::all();
        return view('admin.list-organizer', compact('organizers'));
    }

    function adminCreate(){

        return view('admin.tambah-organizer');
    }

    function adminEdit(){

        return view('admin.edit-organizer');
    }

    function store(Request $request)
    {
        // Validate the incoming request data
       $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required',
            'profil' => 'required',
            'tanggal_lahir' => 'required|date',
            'email' => 'required|email|unique:tbl_organizers',
            'password' => 'required|string|min:8',
        ]);
        DB::beginTransaction(); // Mulai transaksi database
        $hashedPassword = Hash::make($request->password);
        try {
            $image = $request->file('profil');
            $imageName = now()->format('YmdHis') . '-' . $request->nama . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/organizers'), $imageName);
            $organizer = User::create([
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
                'profil' => $imageName,
                'tanggal_lahir' => $request->tanggal_lahir,
                'email' => $request->email,
                'password' => $hashedPassword,
            ]);

            DB::commit(); // Commit transaksi database

        // Redirect back or to a success page
        return redirect(route('admin-list-organizer'))->with('sukses', 'Organizer Berhasil Ditambahkan');

        } catch (QueryException $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }

        // Create a new Organizer instance and save it to the database
        
    }
}