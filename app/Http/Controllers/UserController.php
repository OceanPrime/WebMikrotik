<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function index()
    {
        echo "Halo, Selamat Datang admin";
        echo "<h1>".Auth::user()->name."</h1>";
        echo "<a href='/logout'>Logout >></a>";
    }
    function user()
    {
        echo "Halo, Selamat Datang di halaman user";
        echo "<h1>".Auth::user()->name."</h1>";
        echo "<a href='/logout'>Logout >></a>";
    }
}
