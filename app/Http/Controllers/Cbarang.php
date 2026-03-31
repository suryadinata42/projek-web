<?php

namespace App\Http\Controllers;

use App\Models\Mbarang;
use Illuminate\Http\Request;

class Cbarang extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function tampilkan()
    {
        $barang = Mbarang::all();
        return view('barang.tampilkan',compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function tambah()
    {
    return view('barang.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function simpan(Request $request)
    {
        $request->validate([
		'id_barang'=> 'required|string|max:15|unique:barang,id_barang',
		'nama'  => 'required|regex:/^[\pL\s]+$/u',
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

    /**
     * Display the specified resource.
     */
    public function show(Mbarang $mbarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function ubah($id)
    {
        $barang = Mbarang::findOrFail($id);
        return view('barang.ubah',compact('barang'));
    } 

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
		'nama'   => 'required|regex:/^[\pL\s]+$/u',
		'harga_beli'    => 'required|numeric|min:0',
		'harga_jual'    => 'required|numeric|min:0',
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
