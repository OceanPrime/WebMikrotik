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
        $credentials = $request->only('ip', 'name', 'pass');
        // session()->put('user', [
        //     'ip' => $credentials['ip'],
        //     'name' => $credentials['name'],
        //     'pass' => $credentials['pass'],
        // ]);

        $request->validate([
            'ip' => 'required',
            'name' => 'required',
            'pass' => 'required',
        ],[
            'ip.required' => 'IP Address is required',
            'name.required' => 'Username is required',
            'pass.required' => 'Password is required',
        ]);
        
        if (Auth::guard('mikrotik')->validate($credentials)) {
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['message' => 'Login gagal, Cek IP, Username, dan password']);
        
        $ip = $request->post('ip'); 
        $name = $request->post('name');
        $pass = $request->post('pass');

        $data = [
            'ip' => $ip,
            'name' => $name,
            'pass' => $pass,
        ];

        // dd($data); 

        $request->session()->put($data);
    }

    function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('Success', 'Kamu berhasil Log Out');
    }
}
