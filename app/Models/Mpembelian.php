<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mpembelian extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ='pembelian';
    protected $fillable =['id_pembelian','id_barang','id_suplier','qty','tgl'];
}
