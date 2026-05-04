<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cbarang;
use App\Http\Controllers\Cdashboard;
use App\Http\Controllers\Cpembeli;
use App\Http\Controllers\Cpembelian;
use App\Http\Controllers\Csuplier;
use App\Http\Controllers\Cpesanan;
use App\Http\Controllers\Clogin;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('welcome');
}) ->name('home');
// Router buat Dashboard
Route::get('/home', [Cdashboard::class, 'tampil'])->name('home');

// routing buat login 
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [Clogin::class, 'tampil'])->name('login');
    Route::post('/login', [Clogin::class, 'login_proses'])->name('login_proses');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    Route::get('/logout', [Clogin::class, 'logout'])->name('logout');
    Route::get('/dashboard', [Cdashboard::class, 'tampil'])->name('dashboard');
    // Route::resource('/siswa', Csiswa::class);
}); // <-- SEBELUMNYA KAMU KURANG BAGIAN INI





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

// router pesanan 
Route::get('/pesanan', [Cpesanan::class, 'tampil'])->name('pesanan.tampil');
Route::get('/pesanan/tambah', [Cpesanan::class, 'tambah'])->name('pesanan.tambah');
Route::post('/pesanan/simpan', [Cpesanan::class, 'simpan'])->name('pesanan.simpan');
Route::get('/pesanan/{id_pesanan}/ubah', [Cpesanan::class, 'ubah'])->name('pesanan.ubah');
Route::put('/pesanan/{id_pesanan}/update', [Cpesanan::class, 'update'])->name('pesanan.update');
Route::delete('/pesanan/{id_pesanan}/hapus', [Cpesanan::class, 'hapus'])->name('pesanan.hapus');

// router buat pembelian
route::get('/pembelian', [Cpembelian::class,'tampil'])->name('pembelian.tampil');
route::get('/pembelian/tambah', [Cpembelian::class,'tambah'])->name('pembelian.tambah');
route::post('/pembelian/simpan', [Cpembelian::class,'simpan'])->name('pembelian.simpan');
route::get('/pembelian/{id_pembelian}/ubah', [Cpembelian::class,'ubah'])->name('pembelian.ubah');
route::put('/pembelian/{id_pembelian}/update', [Cpembelian::class,'update'])->name('pembelian.update');
route::delete('/pembelian/{id_pembelian}/hapus', [Cpembelian::class,'hapus'])->name('pembelian.hapus');