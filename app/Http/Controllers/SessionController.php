<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    function index()
    {
        // return view('admin.dashboard');
    }
    function user()
    {
        echo "Halo, Selamat Datang di halaman user";
        echo "<h1>".Auth::user()->name."</h1>";
        echo "<a href='/logout'>Logout >></a>";
    }
    
}
