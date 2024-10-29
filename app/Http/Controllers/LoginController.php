<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('Auth.login');
    }

    function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email Required ',
            'password.required' => 'Password Required'
        ]); 

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if(Auth::attempt($infologin)) {
            if(Auth::user()->role == 'admin'){
                return redirect('admin')->with('Success', 'Kamu berhasil Log in');
            } elseif (Auth::user()->role == 'user') {
                return redirect()->route('login')->with('failed', 'Akun User Tidak Bisa Diakses Disini');
            } 
        } else {
            return redirect()->route('login')->with('failed', 'Email dan Password salah');
        } 
    }

    function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('Success', 'Kamu berhasil Log Out');
    }
}
