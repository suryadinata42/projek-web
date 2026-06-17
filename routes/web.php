<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cbarang;
use App\Http\Controllers\Cdashboard;
use App\Http\Controllers\Cpembeli;
use App\Http\Controllers\Cpembelian;
use App\Http\Controllers\Csuplier;
use App\Http\Controllers\Cpesanan;
use App\Http\Controllers\Clogin;

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [Clogin::class, 'tampil'])->name('login');
    Route::post('/login', [Clogin::class, 'login_proses'])->name('login_proses');
});

Route::middleware(['auth'])->group(function () {

    // Rute umum setelah login
    Route::get('/', [Cdashboard::class, 'tampil'])->name('home');
    Route::get('/logout', [Clogin::class, 'logout'])->name('logout');

    Route::middleware(['cek_level:admin,kasir,user'])->group(function () {
        Route::get('/barang', [Cbarang::class, 'tampilkan'])->name('barang.tampilkan');
        Route::get('/pembeli', [Cpembeli::class, 'tampilan'])->name('pembeli.tampilan');
        Route::get('/suplier', [Csuplier::class, 'tampil'])->name('suplier.tampil');
        Route::get('/pesanan', [Cpesanan::class, 'tampil'])->name('pesanan.tampil');
        Route::get('/pembelian', [Cpembelian::class, 'tampil'])->name('pembelian.tampil');
    });

    Route::middleware(['cek_level:admin,kasir'])->group(function () {
        // Barang
        Route::get('/barang/tambah', [Cbarang::class, 'tambah'])->name('barang.tambah');
        Route::post('/barang/simpan', [Cbarang::class, 'simpan'])->name('barang.simpan');
        
        // Pembeli
        Route::get('/pembeli/tambah', [Cpembeli::class, 'tambah'])->name('pembeli.tambah');
        Route::post('/pembeli/simpan', [Cpembeli::class, 'simpan'])->name('pembeli.simpan');
        
        // Suplier
        Route::get('/suplier/tambah', [Csuplier::class, 'tambah'])->name('suplier.tambah');
        Route::post('/suplier/simpan', [Csuplier::class, 'simpan'])->name('suplier.simpan');
        
        // Pesanan
        Route::get('/pesanan/tambah', [Cpesanan::class, 'tambah'])->name('pesanan.tambah');
        Route::post('/pesanan/simpan', [Cpesanan::class, 'simpan'])->name('pesanan.simpan');
        
        // Pembelian
        Route::get('/pembelian/tambah', [Cpembelian::class, 'tambah'])->name('pembelian.tambah');
        Route::post('/pembelian/simpan', [Cpembelian::class, 'simpan'])->name('pembelian.simpan');
    });

    Route::middleware(['cek_level:admin'])->group(function () {
        // Barang
        Route::get('/barang/{id}/ubah', [Cbarang::class, 'ubah'])->name('barang.ubah');
        Route::put('/barang/{id}/update', [Cbarang::class, 'update'])->name('barang.update');
        Route::delete('/barang/{id}/hapus', [Cbarang::class, 'hapus'])->name('barang.hapus');
        Route::get('/barang/cetak', [Cbarang::class, 'cetak'])->name('barang.cetak');
        Route::get('/barang/ekspor', [Cbarang::class, 'ekspor'])->name('barang.ekspor');
        
        // Pembeli
        Route::get('/pembeli/{id}/ubah', [Cpembeli::class, 'ubah'])->name('pembeli.ubah');
        Route::put('/pembeli/{id}/update', [Cpembeli::class, 'update'])->name('pembeli.update');
        Route::delete('/pembeli/{id}/hapus', [Cpembeli::class, 'hapus'])->name('pembeli.hapus');
        
        // Suplier
        Route::get('/suplier/{id_suplier}/ubah', [Csuplier::class, 'ubah'])->name('suplier.ubah');
        Route::put('/suplier/{id_suplier}/update', [Csuplier::class, 'update'])->name('suplier.update');
        Route::delete('/suplier/{id_suplier}/hapus', [Csuplier::class, 'hapus'])->name('suplier.hapus');
        
        // Pesanan
        Route::get('/pesanan/{id_pesanan}/ubah', [Cpesanan::class, 'ubah'])->name('pesanan.ubah');
        Route::put('/pesanan/{id_pesanan}/update', [Cpesanan::class, 'update'])->name('pesanan.update');
        Route::delete('/pesanan/{id_pesanan}/hapus', [Cpesanan::class, 'hapus'])->name('pesanan.hapus');
        
        // Pembelian
        Route::get('/pembelian/{id_pembelian}/ubah', [Cpembelian::class, 'ubah'])->name('pembelian.ubah');
        Route::put('/pembelian/{id_pembelian}/update', [Cpembelian::class, 'update'])->name('pembelian.update');
        Route::delete('/pembelian/{id_pembelian}/hapus', [Cpembelian::class, 'hapus'])->name('pembelian.hapus');
    });
});