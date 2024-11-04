<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function verifyPassword(Request $request)
    {
        // Pastikan user terotentikasi
        $user = auth()->user();

        if (!$user) {
            return response()->json(['isValid' => false, 'message' => 'User not authenticated'], 401);
        }

        $password = $request->input('password');

        // Verifikasi password
        if (Hash::check($password, $user->password)) {
            return response()->json(['isValid' => true]);
        } else {
            return response()->json(['isValid' => false]);
        }
    }

    public function editProfile()
{
    $user = Auth::user(); // Ambil user yang sedang login
    return response()->json($user); // Kembalikan data pengguna sebagai respons JSON
}

public function updateProfile(Request $request)
{
    $request->validate(
        [
            'name' => 'required|max:255',
            'password' => 'nullable|min:8', // Password bersifat opsional
        ],
        [
            'name.required' => 'Nama Wajib Diisi',
            'password.min' => 'Password Minimal 8 Karakter',
        ]
    );

    $user = Auth::user(); // Ambil user yang sedang login

    $data = [
        'name' => $request->name,
    ];

    // Jika password diisi, lakukan hash dan masukkan ke array data
    if ($request->filled('password')) {
        $data['password'] = bcrypt($request->password);
    }

    // Update data pengguna
    $user->update($data);

    return response()->json(['message' => 'Profile updated successfully'], 200);
}

}