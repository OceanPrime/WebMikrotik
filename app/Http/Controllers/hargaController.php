<?php

namespace App\Http\Controllers;

use App\Models\harga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class hargaController extends Controller
{
    public function index()
    {
        $data = harga::all();
        return view('admin.harga.index', compact('data'));
    }

    public function createHarga()
    {
        return view('admin.harga.tambah');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'gambar_harga' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'harga' => 'required',
            'deskripsi_harga' => 'required'
        ], [
            'gambar_harga.image' => 'File harus berupa gambar',
            'gambar_harga.mimes' => 'Gambar harus berupa file jpeg, png, jpg, atau gif',
            'gambar_harga.max' => 'Ukuran gambar maksimal 2MB',
            'deskripsi_harga.required' => 'Deskripsi harus diisi',
            'harga_required' => 'Harga harus diisi',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('failed', 'Data Gagal Ditambahkan');       
        }

        $gambar_baru = null;

        if($request->hasFile('gambar_harga')) {
            $gambar_file = $request->file('gambar_harga');
            $gambar_ekstensi = $gambar_file->extension();
            $gambar_baru = date('ymdhis') . ".$gambar_ekstensi";
            $gambar_file->move(public_path('/harga'), $gambar_baru);
        }

        $data = harga::create([
            'deskripsi_harga' => $request->deskripsi_harga,
            'harga' => $request->harga,
            'gambar_harga' => $gambar_baru
        ]);

        return redirect()->route('harga.index')->with('success', 'data berhasil ditambahkan'); 
    }

    public function updateHarga($id)
    {
        $data = harga::findOrFail($id);
        return view('admin.harga.edit')->with('data', $data);
    }

    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'gambar_harga' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'deskripsi_harga' => 'required',
                'harga' => 'required'
            ],[
                'gambar_harga.image' => 'File harus berupa gambar',
                'gambar_harga.mimes' => 'Gambar harus berupa file jpeg, png,
                jpg, atau gif',
                'gambar_harga.max' => 'Ukuran gambar maksimal 2MB',
                'deskripsi_harga.required' => 'Deskripsi harus diisi',
                'harga.required' => 'Harga harus diisi',
            ]
        );

        $gambar_baru = null;
        $data = [
            'deskripsi_harga' => $request->deskripsi_harga,
            'harga' => $request->harga,
        ];  

        if($request->hasFile('gambar_harga')) {
            $dataHarga = harga::find($id);
            if($dataHarga->gambar_harga && file_exists(public_path('/harga/' . $dataHarga->gambar_harga))) {
                unlink(public_path('/harga/' . $dataHarga->gambar_harga));
            }
    
            $gambar_file = $request->file('gambar_harga');
            $gambar_baru = date('ymdhis') . '.' . $gambar_file->extension();
            $gambar_file->move(public_path('/harga'), $gambar_baru);
            $data['gambar_harga'] = $gambar_baru;
        }
        
        harga::where('id', $id)->update($data);
        return redirect()->route('harga.index')->with('success', 'Akun User Berhasil diupdate');
    }

    public function destroy($id)
    {
        harga::where('id', $id)->delete();
        return redirect()->route('harga.index')->with('success', 'Akun User Berhasil dihapus');
    }
}
