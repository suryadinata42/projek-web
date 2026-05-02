<?php

namespace App\Http\Controllers;

use App\Models\Mpesanan;
use App\Models\Mbarang;
use App\Models\Mpembeli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Cpesanan extends Controller
{

    public function tampil()
    {
        $judul = 'Data pesanan';  
        $pesanan = DB::table('pesanan')
        ->leftJoin('barang', 'pesanan.id_barang', '=', 'barang.id_barang')
        ->leftJoin('pembeli', 'pesanan.id_pelanggan', '=', 'pembeli.id_pembeli')
            ->select('pesanan.*', 'barang.nama as nama_barang', 'barang.varian', 'pembeli.nama as nama_pembeli')
        ->orderBy('pesanan.tgl_pesan', 'DESC')
        ->get();
        return view('pesanan.tampil', compact('pesanan'));
    }
    public function tambah()
    {
        $barang = DB::table('barang')->get();
        $pembeli = DB::table('pembeli')->get();
        return view('pesanan.tambah', compact('barang', 'pembeli'));
    }
    public function simpan(Request $request)
    {
        $request->validate([
            'id_pesanan'    => 'required|max:15|unique:pesanan,id_pesanan'
        ]);

        $pesanan = new Mpesanan;
        $pesanan->id_pesanan    = $request->id_pesanan;
        $pesanan->id_barang     = $request->nama_barang;
        $pesanan->id_pelanggan  = $request->nama_pembeli;
        $pesanan->qty           = $request->qty;
        $pesanan->tgl_pesan     = $request->tgl_pesan;
        $pesanan->save();

        return redirect()->route('pesanan.tampil')->with('Sukses', 'Data tersimpan');
    }
    public function ubah($id_pesanan)
    {
        $pesanan = Mpesanan::where('id_pesanan', $id_pesanan)->first();
        $barang = DB::table('barang')->get();
        $pembeli = DB::table('pembeli')->get();
        return view('pesanan.ubah', compact('pesanan', 'barang', 'pembeli'));
    }
    public function update(Request $request, $id_pesanan)
    {
        $pesanan = Mpesanan::where('id_pesanan', $id_pesanan)->first();
        if ($pesanan) {
            $pesanan->id_barang     = $request->nama_barang;
            $pesanan->id_pelanggan  = $request->nama_pembeli;
            $pesanan->qty           = $request->qty;
            $pesanan->tgl_pesan     = $request->tgl_pesan;
            $pesanan->save();
        }

        return redirect()->route('pesanan.tampil')->with('Sukses', 'Data tersimpan');
    }
    public function hapus($id_pesanan)
    {
        $pesanan = Mpesanan::where('id_pesanan', $id_pesanan)->first();
        $pesanan->delete();
        return redirect()->route('pesanan.tampil')->with('Sukses', 'Data tersimpan');
    }

}