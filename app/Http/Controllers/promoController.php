<?php

namespace App\Http\Controllers;

use App\Models\promosi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class promoController extends Controller
{
    public function index()
    {
        $data = promosi::all();
        return view('admin.promo.index', compact('data'));
    }

    public function createPromo()
    {
        return view('admin.promo.tambah');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'gambar_promosi' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'required'
        ],[
            'gambar_promosi.image' => 'File harus berupa gambar',
            'gambar_promosi.mimes' => 'Gambar harus berupa file jpeg, png, jpg, atau gif',
            'gambar_promosi.max' => 'Ukuran gambar maksimal 2MB',
            'deskripsi.required' => 'Deskripsi harus diisi'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('failed', 'Data Gagal Ditambahkan');       
        }
        
        $gambar_baru = null;

        if($request->hasFile('gambar_promosi')) {
            $gambar_file = $request->file('gambar_promosi');
            $gambar_ekstensi = $gambar_file->extension();
            $gambar_baru = date('ymdhis') . ".$gambar_ekstensi";
            $gambar_file->move(public_path('/promosi'), $gambar_baru);
        }

        $data = promosi::create([
            'deskripsi' => $request->deskripsi,
        ]);
        
        return redirect()->route('promo.index')->with('success', 'data berhasil ditambahkan'); 
    }

    public function updatePromo($id)
    {
        $data = promosi::findOrFail($id);
        return view('admin.promo.edit')->with('data', $data);
    }

    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'gambar_promosi' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'deskripsi' => 'required'
            ],[
                'gambar_promosi.image' => 'File harus berupa gambar',
                'gambar_promosi.mimes' => 'Gambar harus berupa file jpeg, png,
                jpg, atau gif',
                'gambar_promosi.max' => 'Ukuran gambar maksimal 2MB',
                'deskripsi.required' => 'Deskripsi harus diisi'
            ]
        );

        $gambar_baru = null;
        $data = [
            'deskripsi' => $request->deskripsi
        ];  

        if($request->hasFile('gambar_promosi')) {
            $dataPromo = promosi::find($id);
            if($dataPromo->gambar_promosi && file_exists(public_path('/promosi/' . $dataPromo->gambar_promosi))) {
                unlink(public_path('/promosi/' . $dataPromo->gambar_promosi));
            }
    
            $gambar_file = $request->file('gambar_promosi');
            $gambar_baru = date('ymdhis') . '.' . $gambar_file->extension();
            $gambar_file->move(public_path('/promosi'), $gambar_baru);
            $data['gambar_promosi'] = $gambar_baru;
        }
        
        promosi::where('id', $id)->update($data);
        return redirect()->route('promo.index')->with('success', 'Akun User Berhasil diupdate');
    }

    public function destroy($id)
    {
        promosi::where('id', $id)->delete();
        return redirect()->route('promo.index')->with('success', 'Akun User Berhasil dihapus');
    }
}
