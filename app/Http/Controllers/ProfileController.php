<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Message;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }
    public function index()
    {
        // $wartawanUsers = auth()->user(); // Ambil user yang sedang login
        $wartawanUsers = User::where('role', 'Umum')->get();

        return view('profile.index', compact('wartawanUsers'));
        // Tampilkan halaman profile
    }

    public function show(User $id)
    {
        // Ambil data user yang sedang login
        $user = auth()->user();  // Ambil user yang sedang login (misalnya admin)
        $to = User::find($id)->first();
        // Ambil pesan berdasarkan pengirim dan penerima
        $messages = Message::where(function ($query) use ($user, $id) {
                // Ambil pesan yang dikirim oleh user atau yang diterima oleh user
                $query->where('sender', $user->email)
                    ->where('to', $id->email);
            })
            ->orWhere(function ($query) use ($user, $id) {
                // Ambil pesan yang dikirim oleh orang lain ke user atau diterima oleh orang lain dari user
                $query->where('sender', $id->email)
                    ->where('to', $user->email);
            })
            ->join('users', 'messages.sender', '=', 'users.email')  // Join untuk mendapatkan data nama pengirim
            ->orderBy('messages.created_at', 'asc')  // Urutkan pesan berdasarkan waktu
            ->get();

        return view('profile.index', compact('user', 'messages', 'to'));
    }




    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
