<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cbarang;
use App\Http\Controllers\Cpembeli;
use App\Http\Controllers\Csuplier;

Route::get('/', function () {
    return view('layout.menu');
}) ->name('home');

Route::get('/dashboard', function () {
    return view('home'); 
})->name('dashboard');

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
route::get('/pembeli/{id}/ubah', [Cpembeli::class,'ubah'])->name('pembeli.ubah');
route::put('/pembeli/{id}/update', [Cpembeli::class,'update'])->name('pembeli.update');
route::delete('/pembeli/{id}/hapus', [Cpembeli::class,'hapus'])->name('pembeli.hapus');

// router buat suplier
route::get('/suplier', [Csuplier::class,'tampil'])->name('suplier.tampil');
route::get('/suplier/tambah', [Csuplier::class,'tambah'])->name('suplier.tambah');
route::post('/suplier/simpan', [Csuplier::class,'simpan'])->name('suplier.simpan');
route::get('/suplier/{id_suplier}/ubah', [Csuplier::class,'ubah'])->name('suplier.ubah');
route::put('/suplier/{id_suplier}/update', [Csuplier::class,'update'])->name('suplier.update');
route::delete('/suplier/{id_suplier}/hapus', [Csuplier::class,'hapus'])->name('suplier.hapus');

