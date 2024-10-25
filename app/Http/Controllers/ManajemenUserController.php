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

        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages())->setStatusCode(422);        
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
                'email' => 'required',
                'password' => 'required',
                'role' => 'required'
            ],[
                'name.required' => 'Nama Wajib Diisi',
                'email.required' => 'Email Wajib Diisi',
                'password.required' => 'Password Wajib Diisi',
                'role.required' => 'Email Wajib Diisi',

            ]
        );

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ];
        User::where('id', $id)->update($data);
        return redirect()->route('admin.ManajemenUser.index')->with('success', 'Akun User Berhasil diupdate');
    }

    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return redirect()->route('admin.ManajemenUser.index')->with('success', 'Akun User Berhasil dihapus');
    }
}