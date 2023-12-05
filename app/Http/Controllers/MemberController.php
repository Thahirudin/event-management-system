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

    function adminEdit(Member $member)
    {
        return view('admin.edit-member',[
            'member'=>$member
        ]);
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

     function update(Request $request, Member $member)
    {
        $validatedData = validator ($request->all(),[
            'nama' => 'required|string|max:255',
            'profil' => 'required',
            'tanggal_lahir' => 'required|date',
            'email' => 'required|email|unique:tbl_members',
            'password' => 'required',
        ])->validate();
        $member->nama =$validatedData['nama'];
        $member->profil =$validatedData['profil'];
        $member->tanggal_lahir =$validatedData['tanggal_lahir'];
        $member->email =$validatedData['email'];
        $member->password =$validatedData['password'];
        $member->save();

        return redirect(route('admin-list-member'));

    }
}