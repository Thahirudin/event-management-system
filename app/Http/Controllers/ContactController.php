<?php

namespace App\Http\Controllers;

use App\Mail\KontakMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    public function sendEmail(Request $request)
    {
        // Validasi input form
        $request->validate([
            'email' => 'required|email',
            'subjek' => 'required',
            'pesan' => 'required',
        ]);

        // Data yang akan dikirim ke kelas Mailable
        $data = [
            'email' => $request->input('email'),
            'subjek' => $request->input('subjek'),
            'pesan' => $request->input('pesan'),
        ];

        // Membuat objek Mailable dan memberikan data
        $mail = new KontakMailable($data);

        // Mengirim email menggunakan kelas Mail Laravel
        Mail::to('tohiruzain098@gmail.com')->send($mail);

        return redirect('tentang-kami')->with('sukses', 'Email Berhasil Dikirim');
    }
}