<?php

namespace App\Http\Controllers;

use App\Models\RouterosAPI;
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

    public function store()
    {

    }

    public function editServer()
    {
        return view('admin.pppoe.server.edit');
    }

    public function update()
    {

    }

    public function delete()
    {
        
    }

    // end controller server

    // controller secret
    public function secret()
    {
        $ip = session()->get('ip');
        $name = session()->get('name');
        $pass = session()->get('pass');
        $API = new RouterosAPI();
        $API->debug('false');

        if ($API->connect($ip , $name , $pass)) {
            $secret = $API->comm('/ppp/secret/print');
            $profile = $API->comm('/ppp/profile/print');
        } else {
            return redirect()->route('login')->with('failed', 'Gagal Login');
        }

        $data = [
            'totalSecret' => count($secret),
            'secret' => $secret,
            'profile' => $profile,
        ];
        return view('admin.pppoe.secret.index', $data);
    }
    public function createSecret()
    {
        $ip = session()->get('ip');
        $name = session()->get('name');
        $pass = session()->get('pass');
        $API = new RouterosAPI();
        $API->debug('false');

        if ($API->connect($ip, $name, $pass)) {
            $profile = $API->comm('/ppp/profile/print');
        } else {
            return redirect()->route('login')->with('failed', 'Tidak Bisa Akses Halaman Ini!');
        }

        return view('admin.pppoe.secret.tambah', ['profile' => $profile]);
    }

    public function storeSecret(Request $request)
    {
        $ip = session()->get('ip');
        $name = session()->get('name');
        $pass = session()->get('pass');
        $API = new RouterosAPI();
        $API->debug('false');

        if ($API->connect($ip , $name , $pass)) {
            $API->comm('/ppp/secret/add', array(
                'name' => $request['name'],
                'password' => $request['password'],
                'service' => $request['service'] ?: 'any',
                'profile' => $request['profile'] ?: 'default',
                'local-address' => $request['local-address'] ?: '0.0.0.0',
                'remote-address' => $request['remote-address'] ?: '0.0.0.0',
                'comment' => $request['comment'] ?: '',
            )); 
            return redirect()->route('secret.index')->with('success', 'Akun User Berhasil ditambahkan');
        } else {
            return redirect()->route('admin.pppoe.secret.tambah')->with('failed', 'Gagal Input');
        }  
    }

    public function editSecret($id)
    {
        $ip = session()->get('ip');
        $name = session()->get('name');
        $pass = session()->get('pass');
        $API = new RouterosAPI();
        $API->debug('false');

        if($API->connect($ip, $name, $pass)) {
            $getUser = $API->comm('/ppp/secret/print', [
                '?.id' => '*' . $id,
            ]);

            $secret = $API->comm('/ppp/secret/print');
            $profile = $API->comm('/ppp/profile/print');

            $data = [
                'user' => $getUser[0],
                'secret' => $secret,
                'profile' => $profile,
            ];

            return view('admin.pppoe.secret.edit', $data);
        } else {
            return 'koneksi gagal';
        }
    }

    public function updateSecret(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        $ip = session()->get('ip');
        $name = session()->get('name');
        $pass = session()->get('pass');
        $API = new RouterosAPI();
        $API->debug('false');

        $API->connect($ip, $name, $pass);

        $API->comm('/ppp/secret/set', [
            '.id' => $request['id'],
            'name' => $request['name'] == '' ? '' : $request['name'],
            'password' => $request['password'],
            'service' => $request['service'] ?: '',
            'profile' => $request['profile'] ?: '',
            'local-address' => $request['local-address'] ?: '',
            'remote-address' => $request['remote-address'] ?: '',
            'disabled' => $request['disabled'] ?: '',
            'comment' => $request['comment'] ?: '',
        ]);
        // dd($request->all());
        
        return redirect()->route('secret.index');
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
