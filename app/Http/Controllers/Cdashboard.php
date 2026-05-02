<?php
namespace App\Http\Controllers;

use App\Models\Mdashboard;
use Illuminate\Http\Request;

class Cdashboard extends Controller
{
	public function tampil()
	{
		$dash = new Mdashboard();
		$jumlah_barang = $dash->jumlah_barang();
		$jumlah_pembeli = $dash->jumlah_pembeli();
		$jumlah_suplier = $dash->jumlah_suplier();
		$jumlah_pesanan = $dash->jumlah_pesanan();
		$jumlah_pembelian = $dash->jumlah_pembelian();
		return view('dashboard.tampil', compact('jumlah_barang', 'jumlah_pembeli', 'jumlah_suplier','jumlah_pesanan','jumlah_pembelian'));
	}
}
