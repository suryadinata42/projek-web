<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mpesanan extends Model
{
    use HasFactory;
    protected $table = 'pesanan';
    protected $fillable = ['id_pesanan', 'id_barang', 'id_pelanggan', 'qty', 'tgl_pesan'];
}
