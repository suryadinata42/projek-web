<?php

namespace App\Http\Controllers;
use App\Models\Mpembeli;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;
use Symfony\Contracts\Service\Attribute\Required;

class Cpembeli extends Controller
{
    public function tampilan(){
        $judul = 'Data pembeli';    
        $pembeli = Mpembeli::all();
        return view("pembeli.tampilan",compact("pembeli",'judul'));
    }
    public function tambah()
    {
        $judul = 'Tambah Data Pembeli';
        return view('pembeli.tambah', compact('judul'));
    }
    public function simpan(Request $request)
    {
        $request->validate([
            'id_pembeli'=> 'required|string|max:6|unique:pembeli,id_pembeli',
            'nama'  => 'required|min:3|regex:/^[\pL\s]+$/u',
            'kode_pos'=> 'required|numeric',
        ]);

        $pembeli = new Mpembeli();
        $pembeli->id_pembeli	= $request->id_pembeli;
        $pembeli->nama	        = $request->nama;
        $pembeli->jenis_kelamin   = $request->jenis_kelamin;
        $pembeli->alamat	    = $request->alamat;
        $pembeli->kode_pos	    = $request->kode_pos;
        $pembeli->tanggal_lahir	= $request->tanggal_lahir;
        $pembeli->save();

        return redirect()->route('pembeli.tampilan')->with('status', ['judul' => 'Berhasil', 'pesan' => 'Data berhasil disimpan', 'icon' => 'success']);
    }
    public function ubah($id)
    {
        $pembeli = Mpembeli::findOrFail($id);
        $judul = 'Ubah Data Pembeli';
        return view('pembeli.ubah', compact('pembeli', 'judul'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'  => 'required|min:3|regex:/^[\pL\s]+$/u',
            'kode_pos'=> 'required|numeric',
        ]);

        $pembeli = Mpembeli::findOrFail($id);

        $pembeli->nama 	        = $request->nama;
        $pembeli->jenis_kelamin	= $request->jenis_kelamin;
        $pembeli->alamat	    = $request->alamat;
        $pembeli->kode_pos	    = $request->kode_pos;
        $pembeli->tanggal_lahir	  = $request->tanggal_lahir;
        $pembeli->save();

    return redirect()->route('pembeli.tampilan')->with('status', ['judul' => 'Berhasil', 'pesan' => 'Data berhasil disimpan', 'icon' => 'success']);
    }
    public function hapus($id)
    {
        $pembeli = Mpembeli::findOrFail($id);
        $pembeli->delete();
        return redirect()->route('pembeli.tampilan')->with('status', ['judul' => 'Berhasil', 'pesan' => 'Data berhasil disimpan', 'icon' => 'success']);
    }


}