<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cbarang;
use App\Http\Controllers\Cpembeli;

Route::get('/', function () {
    return view('welcome');
});

// Router buat barang
Route::get('/barang', [Cbarang::class, 'tampilkan'])->name('barang.tampilkan');
Route::get('/barang/tambah', [Cbarang::class, 'tambah'])->name('barang.tambah');
Route::post('/barang/simpan', [Cbarang::class, 'simpan'])->name('barang.simpan');
Route::get('/barang/{id}/ubah', [Cbarang::class, 'ubah'])->name('barang.ubah');
Route::put('/barang/{id}/update', [Cbarang::class, 'update'])->name('barang.update');
Route::delete('/barang/{id}/hapus', [Cbarang::class, 'hapus'])->name('barang.hapus');
  
// router buat pembeli
route::get('/pembeli', [Cpembeli::class,'tampilan'])->name('pembeli.tampilan');
route::get('/pembeli/tambah', [Cpembeli::class,'tambah'])->name('pembeli.tambah');
route::post('/pembeli/simpan', [Cpembeli::class,'simpan'])->name('pembeli.simpan');
route::get('/pembeli/ubah', [Cpembeli::class,'ubah'])->name('pembeli.ubah');
route::put('/pembeli/update', [Cpembeli::class,'update'])->name('pembeli.update');
route::delete('/pembeli/hapus', [Cpembeli::class,'hapus'])->name('pembeli.hapus');