<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLoginController extends Controller
{
    public function index()
    {
        return view('Auth.user_login'); // Ganti dengan view yang sesuai untuk login pengguna
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'Email Diperlukan',
            'email.email' => 'Format Email Tidak Valid',
            'password.required' => 'Password Diperlukan'
        ]);

        $credentials = $request->only('email', 'password');

        // Mencoba untuk login
        if (Auth::attempt($credentials)) {
            // Ambil user yang berhasil login
            $user = Auth::user();

            // Cek apakah pengguna adalah user biasa
            if ($user->role === 'user') {
                $token = $user->createToken('API Token')->plainTextToken; // Menghasilkan token

                return response()->json([
                    'user' => $user,
                    'token' => $token,
                ], 200);
            }

            return response()->json(['message' => 'Unauthorized. Only users can login.'], 403);
        }

        // Jika login gagal
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    public function logout()
    {
        Auth::logout();
        return response()->json(['message' => 'Logged out successfully'], 200);
    }
}