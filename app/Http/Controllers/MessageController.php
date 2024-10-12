<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    public function index()
{
    // Ambil semua pesan
    $messages =  DB::table('users')
    ->join('users', 'messages.sender', '=', 'users.email')
    ->select('messages.*', 'users.name as sender_name')  // Pilih kolom yang diinginkan
    ->where('users.email', '=', auth()->user()->email) //
    ->get();// Pastikan Anda menggunakan model yang benar

    // Kirim data ke view
    return view('pages.chat.index', compact('messages'));
}


    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'to' => 'required|string|email|max:255|exists:users,email',
            'message' => 'required|string',
        ], [
            'to.exists' => 'Email yang Anda masukkan tidak terdaftar.',
        ]);


        try {
            DB::beginTransaction();

            // Simpan pesan ke database
            Message::create([
                'sender' => $request->sender, // Email pengirim
                'to' => $request->to, // Email penerima
                'message' => $request->message, // Isi pesan
            ]);

            // Redirect setelah berhasil menyimpan

            DB::commit();
            $userId = User::where('email', '=', $request->to)->first();
             // return the new message as JSON
            return response()->json(['message' => $request->message,
        'sender'=>$request->sender]);
            // return redirect()->route('profile.show', ['id' => $userId])->with('success', 'Pesan berhasil dikirim!');
        } catch (\Throwable $th) {
            $userId = User::where('email', '=', $request->to)->first();
            DB::rollBack(); // Rollback jika terjadi error
            return redirect()->route('profile.show', ['id' => $userId])->with('error', 'Terjadi kesalahan: ' . $th->getMessage());
        }


    }
    public function fetchMessages($id)
    {
        // Ambil pesan berdasarkan ID
        $message = Message::with('user')->find($id);

        if (!$message) {
            return redirect()->back()->with('error', 'Pesan tidak ditemukan.');
        }

        // Lakukan apa pun yang perlu Anda lakukan dengan pesan ini
        return view('chat.message', compact('message'));
    }

}
