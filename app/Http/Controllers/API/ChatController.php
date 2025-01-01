<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    //

    public function getAllUsers()
    {
        $loggedInUser = auth()->user();

        if (!$loggedInUser) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        // Mengambil semua pengguna dengan pesan terkait
        $users = User::with(['messages' => function ($query) {
            $query->select('id', 'sender', 'to', 'message', 'created_at') // Pilih kolom yang diperlukan
                ->orderBy('created_at', 'desc'); // Urutkan berdasarkan waktu terbaru
        }])->where('email', $loggedInUser->email)->get();

        // Proses untuk setiap pengguna
        $result = $users->map(function ($user) use ($loggedInUser) {
            // Ambil pesan terakhir antara sender dan to yang relevan
            $messages = $user->messages->groupBy(function ($message) {
                return $message->sender . '-' . $message->to; // Kelompokkan berdasarkan pasangan sender dan to
            });

            // Ambil pesan terakhir untuk setiap kelompok
            $lastMessages = $messages->map(function ($group) {
                return $group->first(); // Ambil pesan pertama (terbaru) dari setiap grup
            });

            // Return hasil dengan nama pengguna penerima
            return $lastMessages->map(function ($message) use ($loggedInUser) {
                // Cari pengguna penerima berdasarkan email
                $receiver = User::where('email', $message->to)->first(); // Cari pengguna berdasarkan kolom `to`

                return [
                    'id' => $message->id,
                    'sender' => $message->sender,
                    'to' => $message->to,
                    'message' => $message->message,
                    'created_at' => $message->created_at,
                    'updated_at' => $message->updated_at,
                    'name' => $receiver ? $receiver->name : null, // Nama penerima dari kolom `to`
                    'latest_message' => $message->message,
                ];
            });
        });

        // Menggabungkan hasil dan meratakan hasilnya menjadi array datar
        return response()->json($result->flatten(1), 200); // Flatten hasilnya agar lebih datar
    }


    public function postMessages(Request $request)
    {
        // Validasi data
        $request->validate([
            'sender' => 'required|email',
            'to' => 'required|email',
            'message' => 'required|string',
        ]);

        // Simpan pesan ke database
        $message = Message::create([
            'sender' => $request->sender,
            'to' => $request->to,
            'message' => $request->message,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Message sent successfully!',
            'data' => $message,
        ], 201);
    }

    public function fetchMessagesBetween($sender, $receiver)
    {
        // Validasi parameter
        if (!$sender || !$receiver) {
            return response()->json([
                'success' => false,
                'message' => 'Both sender and receiver emails are required.',
            ], 400);
        }

        // Ambil pesan dari database
        $messages = Message::where(function ($query) use ($sender, $receiver) {
            $query->where('sender', $sender)
                ->where('to', $receiver);
        })
            ->orWhere(function ($query) use ($sender, $receiver) {
                $query->where('sender', $receiver)
                    ->where('to', $sender);
            })
            ->orderBy('created_at', 'asc') // Urutkan berdasarkan waktu
            ->get();

        // Kembalikan respons
        return response()->json([
            'success' => true,
            'data' => $messages,
        ], 200);
    }
}
