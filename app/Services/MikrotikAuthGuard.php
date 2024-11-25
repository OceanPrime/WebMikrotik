<?php

namespace App\Services;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Authenticatable;
use App\Models\RouterosAPI;

class MikrotikAuthGuard implements Guard
{
    protected $user;

    public function __construct()
    {
        $this->user = null;
    }

    // Mengecek apakah user sudah login
    public function check()
    {
        return !is_null($this->user());
    }

    // Mengecek apakah user belum login
    public function guest()
    {
        return is_null($this->user());
    }

    // Mendapatkan user yang sedang login
    public function user()
    {
        if (!$this->user && session()->has('user')) {
            $this->user = session('user');
        }
        return $this->user;
    }

    // Mengecek apakah user sudah disetel
    public function hasUser()
    {
        return !is_null($this->user);
    }

    // Menyetel user yang sedang login
    public function setUser(Authenticatable $user)
    {
        $this->user = $user;
    }

    // Mendapatkan ID user yang sedang login
    public function id()
    {
        return $this->user ? $this->user->name : null;
    }

    // Validasi login berdasarkan kredensial
    public function validate(array $credentials = [])
    {
        $ip = $credentials['ip'] ?? null;
        $name = $credentials['name'] ?? null;
        $pass = $credentials['pass'] ?? null;

        $API = new RouterosAPI();
        if ($API->connect($ip, $name, $pass)) {
            $this->user = (object) [
                'ip' => $ip,
                'name' => $name,
            ];

            // Simpan sesi
            session()->put('ip', $ip);
            session()->put('name', $name);
            session()->put('pass', $pass);

            return true;
        }

        return false;
    }

    // Logout user
    public function logout()
    {
        $this->user = null;
        session()->flush();
    }
}
