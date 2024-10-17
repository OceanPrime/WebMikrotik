<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PPPoEController extends Controller
{
    public function index()
    {
        return view('admin.pppoe.server.index');
    }

    public function createServer()
    {
        return view('admin.pppoe.server.tambah');
    }

    


    public function secret()
    {
        return view('admin.pppoe.secret.index');
    }
    public function createSecret()
    {
        return view('admin.pppoe.secret.tambah');
    }


    public function profil()
    {
        return view('admin.pppoe.profil.index');
    }
    public function createProfile()
    {
        return view('admin.pppoe.profil.tambah');
    }

    
    public function aktifKoneksi()
    {
        return view('admin.pppoe.aktifKoneksi.index');
    }
}
