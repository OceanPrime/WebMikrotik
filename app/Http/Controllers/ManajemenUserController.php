<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ManajemenUserController extends Controller
{
    public function index()
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
        Session::flash('name', $request->name);
        Session::flash('email', $request->email);
        Session::flash('password', $request->password);
        Session::flash('role', $request->role);
        Session::flash('no_telepon', $request->no_telepon);
        Session::flash('alamat', $request->alamat);
        Session::flash('gambar', $request->gambar);
        $validator = Validator::make($request->all(), [  
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'role' => 'required',
            'no_telepon' => 'required',
            'alamat' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

        ], [
            'name.required' => 'Nama tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'password.required' => 'Password tidak valid',
            'alamat.required' => 'Alamat harus diisi',
            'role.required' => 'role tidak boleh kosong',
            'gambar.image' => 'File harus berupa gambar',
            'gambar.mimes' => 'Gambar harus berupa file jpeg, png, jpg, atau gif',
            'gambar.max' => 'Ukuran gambar maksimal 2MB',
        ]);

      
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('failed', 'Data Gagal Ditambahkan');       
        }

        $payload = $validator->validated();
        $gambar_baru = null;

        if($request->hasFile('gambar')) {
            $gambar_file = $request->file('gambar');
            $gambar_ekstensi = $gambar_file->extension();
            $gambar_baru = date('ymdhis') . ".$gambar_ekstensi";
            $gambar_file->move(public_path('/gambar'), $gambar_baru);
        }

        $data = User::create([
            'name' => $payload['name'],
            'email' => $payload['email'],
            'password' => bcrypt($payload['password']),
            'no_telepon' => $payload['no_telepon'],
            'gambar' => $gambar_baru,
            'alamat' => $payload['alamat'],
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
                'role' => 'required',
                'no_telepon' => 'required',
                'alamat' => 'required',
                'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ], [
                'name.required' => 'Nama Wajib Diisi',
                'email.required' => 'Email Wajib Diisi',
                'email.email' => 'Format Email Tidak Valid',
                'email.unique' => 'Email Sudah Terdaftar',
                'password.min' => 'Password Minimal 8 Karakter',
                'role.required' => 'Role Wajib Diisi',
                'role.in' => 'Role tidak valid',
                'no_telepon.required' => 'No Telepon Wajib Diisi',
                'alamat.required' => 'Alamat Wajib Diisi',
                'gambar.image' => 'File harus berupa gambar',
                'gambar.mimes' => 'Gambar harus berupa file jpeg, png, jpg, atau gif',
                'gambar.max' => 'Ukuran gambar maksimal 2MB',

            ]
        );
    
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'no_telepon' => $request->no_telepon,
            'alamat' => $request->alamat,
        ];
    
        // Jika password diisi, lakukan hash dan masukkan ke array data
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        if($request->hasFile('gambar')) {
            $user = User::find($id);
            if($user->gambar && file_exists(public_path('/gambar/' . $user->gambar))) {
                unlink(public_path('/gambar/' . $user->gambar));
            }

            $gambar_file = $request->file('gambar');
            $gambar_baru = date('ymdhis') . '.' . $gambar_file->extension();
            $gambar_file->move(public_path('/gambar'), $gambar_baru);
            if ($user->gambar) {
                // Hapus gambar lama jika ada
                $gambar_lama = public_path('/gambar/' . $user->gambar);
                if (file_exists($gambar_lama)) {
                    unlink($gambar_lama);
                }
            }    
            
            $data['gambar'] = $gambar_baru;
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