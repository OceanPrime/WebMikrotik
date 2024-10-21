<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class hargaController extends Controller
{
    public function index()
    {
        return view('admin.harga.index');
    }

    public function createHarga()
    {
        return view('admin.harga.edit');
    }

    public function updateHarga()
    {
        return view('admin.harga.tambah');
    }
}
