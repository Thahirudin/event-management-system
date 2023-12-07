<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    function index()
    {
        $members = Member::all();
        return view('admin.list-member', [
            'members' => $members
        ]);
    }

    function adminCreate()
    {
        return view('admin.tambah-member');
    }

    function adminEdit($id)
    {
        $member = Member::find($id);
        return view('admin.edit-member', compact('member'));
    }
    function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'nama' => 'required|string|max:255',
            'profil' => 'required',
            'tanggal_lahir' => 'required|date',
            'email' => 'required|email|unique:tbl_members',
            'password' => 'required',
        ]);
        DB::beginTransaction(); // Mulai transaksi database
        $hashedPassword = Hash::make($request->password);
        try {
            $image = $request->file('profil');
            $imageName = now()->format('YmdHis') . '-' . $request->nama . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/members'), $imageName);
            $member = Member::create([
                'nama' => $request->nama,
                'profil' => $imageName,
                'tanggal_lahir' => $request->tanggal_lahir,
                'email' => $request->email,
                'password' => $hashedPassword,
            ]);

            DB::commit(); // Commit transaksi database

            // Redirect back or to a success page
            return redirect(route('admin-list-member'))->with('sukses', 'Member Berhasil Ditambahkan');

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
                'tanggal_lahir' => 'required|date',
                'email' => 'required|email|unique:tbl_members,email,' . $id,
            ]);

            $member = Member::find($id);

            if (!$member) {
                throw new \Exception('Member tidak ditemukan');
            }

            // Check if a new profile image is uploaded
            if ($request->hasFile('profil')) {
                // Delete the old profile image if it exists
                if ($member->profil) {
                    $oldImagePath = public_path('uploads/members/' . $member->profil);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }

                // Upload the new profile image
                $image = $request->file('profil');
                $imageName = now()->format('YmdHis') . '-' . $request->nama . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/members'), $imageName);

                // Update member data including the new profile image
                $member->update([
                    'nama' => $request->nama,
                    'profil' => $imageName,
                    'tanggal_lahir' => $request->tanggal_lahir,
                    'email' => $request->email,
                    'password' => $request->password ? Hash::make($request->password) : $member->password,
                ]);
            } else {
                // Use the existing profile image
                $member->update([
                    'nama' => $request->nama,
                    'tanggal_lahir' => $request->tanggal_lahir,
                    'email' => $request->email,
                    'password' => $request->password ? Hash::make($request->password) : $member->password,
                ]);
            }

            DB::commit(); // Commit the transaction

            return redirect('/admin/list-member')->with('sukses', 'Member Berhasil DiEdit');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction in case of an exception
            return redirect()->back()->with('error', 'Gagal mengedit member. ' . $e->getMessage());
        }
    }
    function destroy($id){
        $member = Member::find($id);
        // Hapus data
        $member->delete();
        return redirect('/admin/list-member')->with('sukses', 'Member Berhasil Di Hapus');
    }

    function organizerIndex()
    {
        $members = Member::all();
        return view('organizer.list-member', [
            'members' => $members
        ]);
    }
}