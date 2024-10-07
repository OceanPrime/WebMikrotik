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
                return redirect('admin');
            } elseif (Auth::user()->role == 'user') {
                return redirect('admin/user');
            } 
        } else {
            return redirect('')->withErrors('Wrong Email and Password')->withInput();
        } 
    }

    function logout()
    {
        Auth::logout();
        return redirect('');
    }
}
