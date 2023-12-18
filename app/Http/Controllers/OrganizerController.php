<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
class OrganizerController extends Controller
{
    function index()
    {
        $organizers = User::all();
        return view('admin.list-organizer', compact('organizers'));
    }

    function adminCreate()
    {

        return view('admin.tambah-organizer');
    }

    function adminEdit($id)
    {
        $organizer = User::find($id);
        return view('admin.edit-organizer', compact('organizer'));
    }

    function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'profil' => 'required',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'nama_bank' => 'required|string|',
            'nomor_rekening' => 'required|string|max:20',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'instagram' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'twitter' => 'nullable|string|max:255',
            'email' => 'required|email|unique:tbl_organizers,email',
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
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
                'nama_bank' => $request->nama_bank,
                'nomor_rekening' => $request->nomor_rekening,
                'jenis_kelamin' => $request->jenis_kelamin,
                'instagram' => $request->instagram,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'email' => $request->email,
                'password' => $hashedPassword,
            ]);

            DB::commit(); // Commit transaksi database

            // Redirect back or to a success page
            return redirect(route('admin-list-organizer'))->with('sukses', 'Organizer Berhasil Ditambahkan');

        } catch (\Exception $e) {
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
                'jabatan' => 'required|string|max:255',
                'tempat_lahir' => 'required|string|max:255',
                'tanggal_lahir' => 'required|date',
                'alamat' => 'required|string|max:255',
                'no_hp' => 'required|string|max:20',
                'nama_bank' => 'required|string|',
                'nomor_rekening' => 'required|string|max:20',
                'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
                'instagram' => 'nullable|string|max:255',
                'facebook' => 'nullable|string|max:255',
                'twitter' => 'nullable|string|max:255',
                'email' => ['required', 'email', Rule::unique('tbl_organizers')->ignore($id)],
                'password' => $request->filled('password') ? 'min:8' : '',
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
                    'tempat_lahir' => $request->tempat_lahir,
                    'tanggal_lahir' => $request->tanggal_lahir,
                    'alamat' => $request->alamat,
                    'no_hp' => $request->no_hp,
                    'nama_bank' => $request->nama_bank,
                    'nomor_rekening' => $request->nomor_rekening,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'instagram' => $request->instagram,
                    'facebook' => $request->facebook,
                    'twitter' => $request->twitter,
                    'email' => $request->email,
                    'password' => $request->password ? Hash::make($request->password) : $organizer->password,
                ]);
            } else {
                // Use the existing profile image
                $organizer->update([
                    'nama' => $request->nama,
                    'jabatan' => $request->jabatan,
                    'tempat_lahir' => $request->tempat_lahir,
                    'tanggal_lahir' => $request->tanggal_lahir,
                    'alamat' => $request->alamat,
                    'no_hp' => $request->no_hp,
                    'nama_bank' => $request->nama_bank,
                    'nomor_rekening' => $request->nomor_rekening,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'instagram' => $request->instagram,
                    'facebook' => $request->facebook,
                    'twitter' => $request->twitter,
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
    function destroy($id)
    {
        $organizer = User::find($id);
        // Hapus data
        $organizer->delete();
        return redirect('/admin/list-organizer')->with('sukses', 'Organizer Berhasil Di Hapus');
    }

    function profil($id)
    {
        $organizer = User::find($id);
        return view('admin.profil-organizer', compact('organizer'));
    }

    function organizerProfil($id)
    {
        $organizer = User::find($id);
        return view('organizer.profil-organizer', compact('organizer'));
    }

    function organizerIndex()
    {
        $organizers = User::all();
        return view('organizer.list-organizer', compact('organizers'));
    }
    function memberProfil($id)
    {
        $organizer = User::find($id);
        return view('member.profil-organizer', compact('organizer'));
    }
    function organizerEdit($id)
    {
        $organizer = User::find($id);
        return view('organizer.edit-organizer', compact('organizer'));
    }

   function organizerUpdate(Request $request, $id)
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
                'nama_bank' => 'required|string|',
                'nomor_rekening' => 'required|string|max:20',
                'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
                'instagram' => 'nullable|string|max:255',
                'facebook' => 'nullable|string|max:255',
                'twitter' => 'nullable|string|max:255',
                'email' => ['required', 'email', Rule::unique('tbl_organizers')->ignore($id)],
                'password' => $request->filled('password') ? 'min:8' : '',
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
                    'profil' => $imageName,
                    'tempat_lahir' => $request->tempat_lahir,
                    'tanggal_lahir' => $request->tanggal_lahir,
                    'alamat' => $request->alamat,
                    'no_hp' => $request->no_hp,
                    'nama_bank' => $request->nama_bank,
                    'nomor_rekening' => $request->nomor_rekening,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'instagram' => $request->instagram,
                    'facebook' => $request->facebook,
                    'twitter' => $request->twitter,
                    'email' => $request->email,
                    'password' => $request->password ? Hash::make($request->password) : $organizer->password,
                ]);
            } else {
                // Use the existing profile image
                $organizer->update([
                    'nama' => $request->nama,
                    'tempat_lahir' => $request->tempat_lahir,
                    'tanggal_lahir' => $request->tanggal_lahir,
                    'alamat' => $request->alamat,
                    'no_hp' => $request->no_hp,
                    'nama_bank' => $request->nama_bank,
                    'nomor_rekening' => $request->nomor_rekening,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'instagram' => $request->instagram,
                    'facebook' => $request->facebook,
                    'twitter' => $request->twitter,
                    'email' => $request->email,
                    'password' => $request->password ? Hash::make($request->password) : $organizer->password,
                ]);
            }

            DB::commit(); // Commit the transaction

            return redirect('/organizer/list-organizer')->with('sukses', 'Organizer Berhasil DiEdit');
        } catch (ValidationException $e) {
            // Tangani pengecualian validasi
            return redirect()
                ->back()
                ->withErrors($e->errors())
                ->withInput(); // Untuk mempertahankan nilai lama (old value)
        } catch (\Exception $e) {
            // Tangani pengecualian di sini
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}