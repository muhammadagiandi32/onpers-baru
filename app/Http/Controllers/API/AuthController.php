<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Autentikasi pengguna
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'error_code' => 401,
                'success' => false,
                'message' => 'Invalid credentials',
            ], 401);
        }

        // Ambil pengguna yang sedang login
        $user = Auth::user();

        // Periksa role atau permission (jika menggunakan Spatie)
        if (!$user->hasRole('admin')) {
            return response()->json([
                'error_code' => 403,
                'success' => false,
                'message' => 'Access denied',
            ], 403);
        }

        // Buat token
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'error_code' => 200,
            'success' => true,
            'message' => 'Login successful',
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'roles' => $user->getRoleNames(), // Dapatkan roles dari Spatie
            ],
        ]);
    }


    public function logout(Request $request)
    {
        // Hapus token pengguna saat ini
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'error_code' => 200,
            'success' => true,
            'message' => 'Logged out successfully',
        ]);
    }
}