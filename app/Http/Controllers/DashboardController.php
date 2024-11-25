<?php

namespace App\Http\Controllers;

use App\Models\RouterosAPI;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index()
    {
        $ip = session()->get('ip');
        $name = session()->get('name');
        $pass = session()->get('pass');
        $API = new RouterosAPI();
        $API->debug('false');

        if ($API->connect($ip , $name , $pass)) {
            $identitas = $API->comm('/system/identity/print');
            $routerModel = $API->comm('/system/resource/print');
        } else {
            return redirect()->route('login')->with('failed', '☠️Akses Ditolak!!☠️');
        }

        $data = [
            'identitas' => $identitas[0]['name'],
            'routerModel' => $routerModel[0]['board-name'],
        ];
        // dd($data);
        return view('admin.dashboard', $data);
    }
} 
