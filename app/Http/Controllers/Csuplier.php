<?php

namespace App\Http\Controllers;
use App\Models\Msuplier;
use Illuminate\Http\Request;

class Csuplier extends Controller
{
    public function tampil()
    {
        $suplier = Msuplier::all();
        return view("suplier.tampil", compact("suplier"));
    }
        public function tambah()
    {
        return view('suplier.tambah');
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'id_suplier'    => 'required|max:6|unique:suplier,id_suplier',
            'nama'  => 'required|min:3|regex:/^[\pL\s]+$/u',
            'kode_pos'=> 'required|numeric',
        ]);

        Msuplier::create([
            'id_suplier'    => $request->id_suplier,
            'nama'          => $request->nama,
            'alamat'        => $request->alamat,
            'kode_pos'      => $request->kode_pos,
            'kota'          => $request->kota,
        ]);

        return redirect()->route('suplier.tampil')->with('Berhasil', 'Data tersimpan');
    }
    public function ubah($id_suplier)
    {
        $sup = Msuplier::where('id_suplier', $id_suplier)->first();
        return view('suplier.ubah', compact('sup'));
    }
    public function update(Request $request, $id_suplier)
    {
        $request -> validate([
            'nama'=> 'required|string|min:6|unique:barang,id_barang',
            'kode_pos'=> 'required|numeric',
        ]);
        $suplier = Msuplier::where('id_suplier', $id_suplier)->first();

        $suplier->nama      = $request->nama;
        $suplier->alamat    = $request->alamat;
        $suplier->kode_pos  = $request->kode_pos;
        $suplier->kota      = $request->kota;
        $suplier->save();

        return redirect()->route('suplier.tampil')->with('Berhasil', 'Data tersimpan');
    }

    public function hapus($id_suplier)
    {
        $suplier = Msuplier::where('id_suplier', $id_suplier)->first();
        $suplier->delete();
        return redirect()->route('suplier.tampil')->with('Berhasil', 'Data terhapus');
    }
}



