<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mpesanan extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'pesanan';
    protected $fillable = ['id_pesanan', 'id_barang', 'id_pelanggan', 'qty', 'tgl_pesan'];
}
