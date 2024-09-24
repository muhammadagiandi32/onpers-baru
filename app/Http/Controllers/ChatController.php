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
        return view('pages.chat.index');
    }

    /**
     * Show the form for composing a message.
     */
    public function compose()
    {
        return view('pages.chat.compose'); // Mengarahkan ke tampilan compose
    }

    /**
     * Store a newly created message in storage.
     */
    public function sendMessage(Request $request)
    {
        // Validasi data pesan
        $request->validate([
            'message' => 'required|string|max:255', // Misalnya, validasi untuk pesan
        ]);

        // Simpan pesan baru ke database
        Chat::create([
            'message' => $request->message,
            // Tambahkan kolom lain sesuai dengan struktur tabel Anda
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