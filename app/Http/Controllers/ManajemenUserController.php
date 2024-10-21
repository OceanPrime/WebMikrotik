<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManajemenUserController extends Controller
{
    public function index()
    {
        return view('admin.ManajemenUser.index');
    }

    public function createUser()
    {
        return view('admin.ManajemenUser.tambah');
    }

    public function updateUser()
    {
        return view('admin.ManajemenUser.edit');
    }
}
