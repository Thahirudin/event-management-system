<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use Illuminate\Validation\Rule;
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
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'instagram' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'twitter' => 'nullable|string|max:255',
            'email' => 'required|email|unique:tbl_members,email',
            'password' => 'required|string|min:8',
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
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
                'jenis_kelamin' => $request->jenis_kelamin,
                'instagram' => $request->instagram,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
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
                'tempat_lahir' => 'required|string|max:255',
                'tanggal_lahir' => 'required|date',
                'alamat' => 'required|string|max:255',
                'no_hp' => 'required|string|max:20',
                'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
                'instagram' => 'nullable|string|max:255',
                'facebook' => 'nullable|string|max:255',
                'twitter' => 'nullable|string|max:255',
                'email' => ['required', 'email', Rule::unique('tbl_members')->ignore($id)],
                'password' => $request->filled('password') ? 'min:8' : '',
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
                    'tempat_lahir' => $request->tempat_lahir,
                    'tanggal_lahir' => $request->tanggal_lahir,
                    'alamat' => $request->alamat,
                    'no_hp' => $request->no_hp,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'instagram' => $request->instagram,
                    'facebook' => $request->facebook,
                    'twitter' => $request->twitter,
                    'email' => $request->email,
                    'password' => $request->password ? Hash::make($request->password) : $member->password,
                ]);
            } else {
                // Use the existing profile image
                $member->update([
                    'nama' => $request->nama,
                    'tempat_lahir' => $request->tempat_lahir,
                    'tanggal_lahir' => $request->tanggal_lahir,
                    'alamat' => $request->alamat,
                    'no_hp' => $request->no_hp,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'instagram' => $request->instagram,
                    'facebook' => $request->facebook,
                    'twitter' => $request->twitter,
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
    function destroy($id)
    {
        $member = Member::find($id);
        // Hapus data
        $member->delete();
        return redirect('/admin/list-member')->with('sukses', 'Member Berhasil Di Hapus');
    }
    function profil($id)
    {
        $member = member::find($id);
        return view('admin.profil-member', compact('member'));
    }
    function organizerProfil($id)
    {
        $member = member::find($id);
        return view('organizer.profil-member', compact('member'));
    }

    function organizerIndex()
    {
        $members = Member::all();
        return view('organizer.list-member', [
            'members' => $members
        ]);
    }

    function memberProfil($id)
    {
        $member = member::find($id);
        return view('member.profil-member', compact('member'));
    }

    function memberEdit($id)
    {
        $member = Member::find($id);
        return view('member.edit-member', compact('member'));
    }


    
}