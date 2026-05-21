<?php

namespace App\Http\Controllers;
use App\Models\Mpembelian;
use App\Models\Mbarang;
use App\Models\Mpembeli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Cpembelian extends Controller
{
    // Mengubah index() menjadi tampil()
    public function tampil()
    {
        $judul = 'Data pembelian';  
        $pembelian = DB::table('pembelian')
        ->leftJoin('barang', 'pembelian.id_barang', '=', 'barang.id_barang')
        ->leftJoin('suplier', 'pembelian.id_suplier', '=', 'suplier.id_suplier')
        ->select('pembelian.*', 'barang.nama as nama_barang', 'barang.varian', 'suplier.nama as nama_suplier')
        ->orderBy('pembelian.tgl', 'DESC')
        ->get();
        return view('pembelian.tampil', compact('pembelian','judul'));
    }
    public function tambah()
    {
        $barang = DB::table('barang')->get();
        $suplier = DB::table('suplier')->get();
        return view('pembelian.tambah', compact('barang', 'suplier'));
    }
    public function simpan(Request $request)
    {
        $request->validate([
            'id_pembelian'    => 'required|max:15|unique:pembelian,id_pembelian'
        ]);

        $pembelian = new Mpembelian;
        $pembelian->id_pembelian    = $request->id_pembelian;
        $pembelian->id_barang     = $request->nama_barang;
        $pembelian->id_suplier  = $request->nama_suplier;
        $pembelian->qty           = $request->qty;
        $pembelian->tgl     = $request->tgl;
        $pembelian->save();

        return redirect()->route('pembelian.tampil')->with('status', ['judul' => 'Berhasil', 'pesan' => 'Data berhasil disimpan', 'icon' => 'success']);
    }

    public function ubah($id_pembelian)
    {
        $pembelian = Mpembelian::where('id_pembelian', $id_pembelian)->first();
        $barang = DB::table('barang')->get();
        $suplier = DB::table('suplier')->get();
        return view('pembelian.ubah', compact('pembelian', 'barang', 'suplier'));
    }

    public function update(Request $request, $id_pembelian)
    {
        $pembelian = Mpembelian::where('id_pembelian', $id_pembelian)->first();
        if ($pembelian) {
            $pembelian->id_pembelian    = $request->id_pembelian;
            $pembelian->id_barang     = $request->nama_barang;
            $pembelian->id_suplier  = $request->nama_suplier;
            $pembelian->qty           = $request->qty;
            $pembelian->tgl     = $request->tgl;
            $pembelian->save();
        }

        return redirect()->route('pembelian.tampil')->with('status', ['judul' => 'Berhasil', 'pesan' => 'Data berhasil disimpan', 'icon' => 'success']);
    }
    public function hapus($id_pembelian)
    {
        $pembelian = Mpembelian::where('id_pembelian', $id_pembelian)->first();
        $pembelian->delete();
        return redirect()->route('pembelian.tampil')->with('status', ['judul' => 'Berhasil', 'pesan' => 'Data berhasil disimpan', 'icon' => 'success']);
    }
}
