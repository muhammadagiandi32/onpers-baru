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

        // Mengambil semua pengguna dengan pesan terkait, urutkan berdasarkan waktu terbaru
        $users = User::with(['messages' => function ($query) {
            $query->select('id', 'sender', 'to', 'message', 'created_at')
                ->orderBy('created_at', 'desc'); // Urutkan dari terbaru ke terlama
        }])->get();

        // Kelompokkan pesan berdasarkan pasangan sender-to, agar hanya pesan terakhir yang diambil
        $lastMessages = collect();

        foreach ($users as $user) {
            foreach ($user->messages as $message) {
                $key = $message->sender . '-' . $message->to;

                // Simpan hanya pesan terbaru antara sender dan to
                if (!$lastMessages->has($key) || $lastMessages[$key]->created_at < $message->created_at) {
                    $lastMessages[$key] = $message;
                }
            }
        }

        // Format hasil akhir
        $formattedUsers = $users->map(function ($user) use ($lastMessages) {
            $userMessages = $lastMessages->filter(function ($message) use ($user) {
                return $message->sender === $user->email || $message->to === $user->email;
            });

            return [
                'id' => $user->id,
                'email' => $user->email,
                'name' => $user->name,
                'messages' => $userMessages->map(function ($message) {
                    $receiver = User::where('email', $message->to)->first();
                    return [
                        'id' => $message->id,
                        'sender' => $message->sender,
                        'to' => $message->to,
                        'message' => $message->message,
                        'created_at' => $message->created_at,
                        'receiver_name' => $receiver ? $receiver->name : null,
                    ];
                })->values(), // Reset index array
            ];
        });

        return response()->json($formattedUsers, 200);
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
            ->orderBy('created_at', 'desc') // Urutkan berdasarkan waktu
            ->get();

        // Kembalikan respons
        return response()->json([
            'success' => true,
            'data' => $messages,
        ], 200);
    }
}
