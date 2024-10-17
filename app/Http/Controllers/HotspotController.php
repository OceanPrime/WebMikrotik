<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HotspotController extends Controller
{
    public function aktifKoneksi()
    {
        return view('admin.hotspot.aktifKoneksiHotspot.index');
    }

    public function index()
    {
        return view('admin.hotspot.serverHotspot.index');
    }
    public function create()
    {
        return view('admin.hotspot.serverHotspot.tambah');
    }

    public function secretUser()
    {
        return view('admin.hotspot.secretUser.index');
    }
    public function createSecretUser()
    {
        return view('admin.hotspot.secretUser.tambah');
    }


    public function ServerProfil()
    {
        return view('admin.hotspot.serverProfil.index');
    }
    public function createServerProfil()
    {
        return view('admin.hotspot.serverProfil.tambah');
    }

    public function profilUser()
    {
        return view('admin.hotspot.profilUser.index');
    }

    public function createProfilUser()
    {
        return view('admin.hotspot.profilUser.tambah');
    }
}
