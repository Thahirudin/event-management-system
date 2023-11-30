<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;

class OrganizerController extends Controller
{
    function index(){
        $organizers = User::all();
        return view('admin.organizer', compact('organizers'));
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
        $validatedData = validator($request->all(), [
            'nama' => 'required|string|max:255',
            'jabatan' => 'required',
            'profil' => 'required',
            'tanggal_lahir' => 'required|date',
            'email' => 'required|email|unique:tbl_organizers',
            'password' => 'required|string|min:8',
        ])->validated();
        DB::beginTransaction(); // Mulai transaksi database

        try {
            $image = $request->file('profil');
            $imageName = now()->format('YmdHis') . '-' . $request->nama . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/organizers'), $imageName);
            $organizer = new User($validatedData);
            $organizer->save();

            DB::commit(); // Commit transaksi database

        // Redirect back or to a success page
        return redirect(route('admin-list-organizer'))->with('success', 'Organizer Berhasil Ditambahkan');

        } catch (QueryException $e) {
            DB::rollBack();
            dd($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }

        // Create a new Organizer instance and save it to the database
        
    }
}
