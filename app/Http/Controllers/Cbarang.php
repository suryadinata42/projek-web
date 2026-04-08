<?php

namespace App\Http\Controllers;

use App\Models\Mbarang;
use Illuminate\Http\Request;

class Cbarang extends Controller
{
    public function tampilkan()
    {
        $barang = Mbarang::all();
        return view('barang.tampilkan',compact('barang'));
    }
    public function tambah()
    {
    return view('barang.tambah');
    }
    public function simpan(Request $request)
    {
        $request->validate([
            'id_barang'=> 'required|string|max:6|unique:barang,id_barang',
            'nama'  => 'required|min:3|regex:/^[\pL\s]+$/u',
            'harga_beli'=> 'required|numeric|min:1000',
            'harga_jual' => 'required|numeric|min:1000', 
	]);

        $barang = new Mbarang();
        $barang->id_barang	        = $request->id_barang;
        $barang->nama	            = $request->nama;
        $barang->varian   	        = $request->varian;
        $barang->harga_beli     	= $request->harga_beli;
        $barang->harga_jual	        = $request->harga_jual;
        $barang->save();

        return redirect()->route('barang.tampilkan')->with('Berhasil', 'Berhasil tersimpan');

    }

    public function ubah($id)
    {
        $barang = Mbarang::findOrFail($id);
        return view('barang.ubah',compact('barang'));
    } 

    public function update(Request $request,$id)
    {
        $request->validate([
            'nama'      => 'required|min:3|regex:/^[\pL\s]+$/u',
            'harga_beli'=> 'required|numeric|min:1000',
            'harga_jual'=> 'required|numeric|min:1000', 
	]);

        $barang = Mbarang::findOrFail($id);
        $barang->id_barang	        = $request->id_barang;
        $barang->nama 	            = $request->nama;
        $barang->varian	            = $request->varian;
        $barang->harga_beli	        = $request->harga_beli;
        $barang->harga_jual	        = $request->harga_jual;
        $barang->save();

        return redirect()->route('barang.tampilkan')->with('Berhasil', 'Berhasil tersimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function hapus($id)
    {
        $barang = Mbarang::findOrFail($id);
        $barang->delete();
        return redirect()->route('barang.tampilkan')->with('Sukses', 'Data Terhapus');

    }
}
