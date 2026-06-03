<?php

namespace App\Http\Controllers;

use App\Models\Mbarang;
use Illuminate\Http\Request;

class Cbarang extends Controller
{
    public function tampilkan()
    {
        $judul = 'Data barang';           
        $barang = Mbarang::all();
        return view('barang.tampilkan',compact('barang','judul'));
    }
    public function tambah()
    {

        $judul = 'Tambah Data Barang';
        return view('barang.tambah', compact('judul',));
    }
    public function simpan(Request $request)
    {
        $request->validate([
            'id_barang'=> 'required|string|max:6|unique:barang,id_barang',
            'nama'  => 'required|min:3|regex:/^[\pL\s]+$/u',
            'harga_beli'=> 'required|numeric|min:1000',
            'harga_jual' => 'required|numeric|min:1000', 
	]);
        $foto = $request->file('foto');
        $filename = null;
        if ($foto) {
            $extension = $foto->getClientOriginalExtension();
            $filename = date('YmdHis') . '.' . $extension;
            $foto->move(public_path('uploads/fotoBarang'), $filename);
        }

        Mbarang::create([
            'id_barang' => $request->id_barang,
            'nama' => $request->nama,
            'varian' => $request->varian,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'foto' => $filename,
        ]);

        return redirect()->route('barang.tampilkan')->with('status', ['judul' => 'Berhasil', 'pesan' => 'Data berhasil disimpan', 'icon' => 'success']);


    }

    public function ubah($id)
    {
        $judul = 'Ubah Data Barang';
        $barang = Mbarang::findOrFail($id);
        return view('barang.ubah',compact('barang','judul'));
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

        return redirect()->route('barang.tampilkan')->with('status', ['judul' => 'Berhasil', 'pesan' => 'Data berhasil disimpan', 'icon' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function hapus($id)
    {
        $barang = Mbarang::findOrFail($id);
        $barang->delete();
        return redirect()->route('barang.tampilkan')->with('status', ['judul' => 'Berhasil', 'pesan' => 'Data berhasil disimpan', 'icon' => 'success']);

    }
    public function cetak()
    {
        $barang = Mbarang::get();
        return view('barang.cetak', compact('barang'));
    }

    public function ekspor()
    {
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=nama_file.xls");
        $barang = Mbarang::get();
        return view('barang.ekspor', compact('barang'));
    }
}
