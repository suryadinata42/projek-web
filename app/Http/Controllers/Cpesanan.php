<?php

namespace App\Http\Controllers;

use App\Models\Mpesanan;
use App\Models\Mbarang;
use App\Models\Mpembeli;
use Illuminate\Http\Request;

class Cpesanan extends Controller
{
    // index() diubah menjadi tampil()
    public function tampil()
    {
        // Ambil semua data pesanan + relasi ke barang & pembeli
        $data = Mpesanan::with(['barang', 'pembeli'])->get();
        
        // Sesuaikan nama view dengan nama method
        return view('pesanan.tampil', compact('data'));
    }

    // create() diubah menjadi tambah()
    public function tambah()
    {
        $pembeli = Mpembeli::all();
        $barang = Mbarang::all();
        return view('pesanan.tambah', compact('pembeli', 'barang'));
    }

    // store() diubah menjadi simpan()
    public function simpan(Request $request)
    {
        $request->validate([
            'id_pesanan' => 'required|unique:pesanan,id_pesanan',
            'qty' => 'required|integer|min:1',
        ]);

        Mpesanan::create($request->all());

        // Sesuaikan nama route redirect
        return redirect()->route('pesanan.tampil')->with('Sukses', 'Data berhasil disimpan');
    }

    // edit() diubah menjadi ubah()
    public function ubah($id)
    {
        $pesanan = Mpesanan::findOrFail($id);
        $pembeli = Mpembeli::all();
        $barang = Mbarang::all();

        return view('pesanan.ubah', compact('pesanan', 'pembeli', 'barang'));
    }

    // update() tetap update()
    public function update(Request $request, $id)
    {
        $pesanan = Mpesanan::findOrFail($id);
        $pesanan->update($request->all());

        return redirect()->route('pesanan.tampil')->with('Sukses', 'Data berhasil diupdate');
    }

    // destroy() diubah/ditambah menjadi hapus()
    public function hapus($id)
    {
        $pesanan = Mpesanan::findOrFail($id);
        $pesanan->delete();

        return redirect()->route('pesanan.tampil')->with('Sukses', 'Data berhasil dihapus');
    }
}