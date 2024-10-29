<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ManajemenUserController extends Controller
{
    public function index(): View
    {
        $users = User::all();
        return view('admin.ManajemenUser.index', compact('users'));
    }


    public function createUser()
    {
        return view('admin.ManajemenUser.tambah');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'role' => 'required',

        ], [
            'name.required' => 'Nama tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'password.required' => 'Password tidak valid',
            'role.required' => 'role tidak boleh kosong',
        ]);

        if ($validator->fails()) {
            redirect()->route('ManajemenUser.store')->with('failed', 'Akun User Gagal Ditambahkan');       
        }

        $payload = $validator->validated();

        $user = User::create([
            'name' => $payload['name'],
            'email' => $payload['email'],
            'password' => bcrypt($payload['password']),
            'role' => $payload['role'],
        ]);
        return redirect()->route('admin.ManajemenUser.index')->with('success', 'Akun User Berhasil ditambahkan');

    }

    public function editUser($id)
    {
        $data = User::findOrFail($id);
        return view('admin.ManajemenUser.edit')->with('data', $data);
    }

    public function updateUser(Request $request, string $id)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email,' . $id,
                'password' => 'nullable|min:8',
                'role' => 'required|in:admin,user' // Sesuaikan dengan role yang ada
            ],
            [
                'name.required' => 'Nama Wajib Diisi',
                'email.required' => 'Email Wajib Diisi',
                'email.email' => 'Format Email Tidak Valid',
                'email.unique' => 'Email Sudah Terdaftar',
                'password.min' => 'Password Minimal 8 Karakter',
                'role.required' => 'Role Wajib Diisi',
                'role.in' => 'Role tidak valid',
            ]
        );
    
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ];
    
        // Jika password diisi, lakukan hash dan masukkan ke array data
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }
    
        User::where('id', $id)->update($data);
        return redirect()->route('admin.ManajemenUser.index')->with('success', 'Akun User Berhasil diupdate');
    }
            

    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return redirect()->route('admin.ManajemenUser.index')->with('success', 'Akun User Berhasil dihapus');
    }
}