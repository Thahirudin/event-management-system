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

    function adminEdit($id){
        $organizer = User::find($id);
        return view('admin.edit-organizer', compact('organizer'));
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
            'password' => 'required|string',
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
    function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            // Validate the incoming request data
            $request->validate([
                'nama' => 'required|string|max:255',
                'jabatan' => 'required',
                'tanggal_lahir' => 'required|date',
                'email' => 'required|email|unique:tbl_organizers,email,' . $id,
            ]);

            $organizer = User::find($id);

            if (!$organizer) {
                throw new \Exception('Member tidak ditemukan');
            }

            // Check if a new profile image is uploaded
            if ($request->hasFile('profil')) {
                // Delete the old profile image if it exists
                if ($organizer->profil) {
                    $oldImagePath = public_path('uploads/organizers/' . $organizer->profil);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }

                // Upload the new profile image
                $image = $request->file('profil');
                $imageName = now()->format('YmdHis') . '-' . $request->nama . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/organizers'), $imageName);

                // Update member data including the new profile image
                $organizer->update([
                    'nama' => $request->nama,
                    'jabatan' => $request->jabatan,
                    'profil' => $imageName,
                    'tanggal_lahir' => $request->tanggal_lahir,
                    'email' => $request->email,
                    'password' => $request->password ? Hash::make($request->password) : $organizer->password,
                ]);
            } else {
                // Use the existing profile image
                $organizer->update([
                    'nama' => $request->nama,
                    'jabatan' => $request->jabatan,
                    'tanggal_lahir' => $request->tanggal_lahir,
                    'email' => $request->email,
                    'password' => $request->password ? Hash::make($request->password) : $organizer->password,
                ]);
            }

            DB::commit(); // Commit the transaction

            return redirect('/admin/list-organizer')->with('sukses', 'Organizer Berhasil DiEdit');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction in case of an exception
            return redirect()->back()->with('error', 'Gagal mengedit organizer. ' . $e->getMessage());
        }
    }
    function destroy($id){
        $organizer = User::find($id);
        // Hapus data
        $organizer->delete();
        return redirect('/admin/list-organizer')->with('sukses', 'Organizer Berhasil Di Hapus');
    }

    function profil($id){
        $organizer = User::find($id);
        return view('admin.profil-organizer', compact('organizer'));
    }

    function organizerProfil($id){
        $organizer = User::find($id);
        return view('organizer.profil-organizer', compact('organizer'));
    }

    function organizerIndex(){
        $organizers = User::all();
        return view('organizer.list-organizer', compact('organizers'));
    }
}