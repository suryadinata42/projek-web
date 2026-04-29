<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mpesanan extends Model
{
    use HasFactory;
    protected $table = 'pesanan';
    protected $fillable = ['id_pesanan', 'id_pelanggan', 'id_barang', 'qty', 'tgl_pesan'];


// Relasi ke tabel pembeli
    public function pembeli()
    {
 // foreign key = id_pelanggan di tabel pesanan
 // primary key = id_pembeli di tabel pembeli
    return $this->belongsTo(Mpembeli::class, 'id_pelanggan', 'id_pembeli');
    }
 // Relasi ke tabel barang
    public function barang_join()
    {
 // foreign key = id_barang di tabel pesanan
 // primary key = id_barang di tabel barang
    return $this->belongsTo(Mbarang::class, 'id_barang', 'id_barang');
    }
}
