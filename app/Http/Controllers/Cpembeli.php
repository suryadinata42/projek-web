<?php

namespace App\Http\Controllers;
use App\Models\Mpembeli;
use Illuminate\Http\Request;

class Cpembeli extends Controller
{
    public function tampilan(){
        $pembeli = Mpembeli::all();
        return view("pembeli.tampilan",compact("pembeli"));
    }
    public function tambah()
    {
    return view('pembeli.tambah');
    }
    public function simpan(Request $request)
    {
        $request->validate([
            'id_pembeli'=> 'required|string|max:15|unique:pembeli,id_pembeli',
            'nama' => 'required|regex:/^[\pL\s]+$/u',
        ]);

        $pembeli = new Mpembeli();
        $pembeli->id_pembeli	= $request->id_pembeli;
        $pembeli->nama	        = $request->nama;
        $pembeli->jenis_kelamin   = $request->jenis_kelamin;
        $pembeli->alamat	    = $request->alamat;
        $pembeli->kode_pos	    = $request->kode_pos;
        $pembeli->tanggal_lahir	= $request->tanggal_lahir;
        $pembeli->save();

        return redirect()->route('pembeli.tampilan')->with('Berhasil', 'Berhasil tersimpan');
    }
    public function ubah($id)
    {
        $pembeli = Mpembeli::findOrFail($id);
        return view('pembeli.ubah', compact('pembeli'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pembeli'  => 'required|regex:/^[\pL\s]+$/u',
        ]);

        $pembeli = Mpembeli::findOrFail($id);

        $pembeli->nama 	        = $request->nama;
        $pembeli->jenis_kelamin	= $request->jenis_kelamin;
        $pembeli->alamat	    = $request->alamat;
        $pembeli->kode_pos	    = $request->kode_pos;
        $pembeli->tanggal_lahir	  = $request->tanggal_lahir;
        $pembeli->save();

    return redirect()->route('pembeli.tampilkan')->with('Sukses', 'Berhasil tersimpan');
    }


}