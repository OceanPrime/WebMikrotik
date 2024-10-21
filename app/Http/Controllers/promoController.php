<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class promoController extends Controller
{
    public function index()
    {
        return view('admin.promo.index');
    }

    public function createPromo()
    {
        return view('admin.promo.edit');
    }

    public function updatePromo()
    {
        return view('admin.promo.tambah');
    }
}
