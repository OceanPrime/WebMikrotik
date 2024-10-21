<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PPPoEController extends Controller
{
    // controller server

    public function index()
    {
        return view('admin.pppoe.server.index');
    }

    public function createServer()
    {
        return view('admin.pppoe.server.tambah');
    }

    public function editServer()
    {
        return view('admin.pppoe.server.edit');
    }

    // end controller server

    // controller secret
    public function secret()
    {
        return view('admin.pppoe.secret.index');
    }
    public function createSecret()
    {
        return view('admin.pppoe.secret.tambah');
    }
    public function editSecret()
    {
        return view('admin.pppoe.secret.edit');
    }
    // end controller secret

    // controller profil
    public function profil()
    {
        return view('admin.pppoe.profil.index');
    }
    public function createProfile()
    {
        return view('admin.pppoe.profil.tambah');
    }
    public function editProfile()
    {
        return view('admin.pppoe.profil.edit');
    }
    //end controller profil
    
    //controller aktifkoneksi
    public function aktifKoneksi()
    {
        return view('admin.pppoe.aktifKoneksi.index');
    }
    //end controller aktifkoneksi
}
