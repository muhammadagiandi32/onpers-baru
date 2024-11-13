<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat; // Menggunakan model Chat

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Tampilkan halaman profile
        // $wartawanUsers = auth()->user(); // Ambil user yang sedang login
        $wartawanUsers = User::where('role', 'Umum')->get();

        return view('pages.chat.index', compact('wartawanUsers'));
    }

    /**
     * Show the form for composing a message.
     */
    public function compose(Request $request)
    {
        $email = $request->query(); // Ambil semua query string

        // // atau spesifik ke email
        $email = $request->get('email');
        // dd($email);
        return view('pages.chat.compose', ['email' => $email]);
    }

    /**
     * Store a newly created message in storage.
     */
    public function sendMessage(Request $request)
{
    // Validasi data pesan
    $request->validate([
        'message' => 'required|string|max:255', // Validasi pesan
    ]);

    // Simpan pesan baru ke database
    Chat::create([
        'message' => $request->message, // Isi kolom message
    ]);

    // Redirect atau mengembalikan tampilan setelah pengiriman
    return redirect()->route('chat.index')->with('success', 'Pesan berhasil dikirim!');
}

    public function fetchMessages()
    {
        // Ambil semua pesan dari tabel chat
        $messages = Chat::all();

        // Kembalikan tampilan dengan data pesan
        return view('pages.chat.chat_detail');
    }

    // Metode lain...
}
