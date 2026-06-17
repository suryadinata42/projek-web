====================================================================================
1. install laravel
    • composer create-project laravel/laravel:^10.0 nama_project (versi tertentu)
        -contoh: composer create-project laravel/laravel:^10.0 toko_online
    • composer create-project laravel/laravel nama_project (versi terbaru)
        -contoh: composer create-project laravel/laravel toko_online
====================================================================================
2. Buka project yang sudah dibuat di Visual Studio Code
    File>Open folder>Disk C>laragon>www
====================================================================================
3. Buka file .env dan setting databasenya
    Bagian ini
        DB_CONNECTION=sqlite
        # DB_HOST=127.0.0.1
        # DB_PORT=3306
        # DB_DATABASE=laravel
        # DB_USERNAME=root
        # DB_PASSWORD=
    edit jadi 
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=nama_project
        DB_USERNAME=root
        DB_PASSWORD=
====================================================================================
4. Lakukan Migrasi tujuannya untuk membuat database sesuai dengan nama database di dalam .env
    • php artisan migrate
        terus pilih (yes)
====================================================================================
5. Pastikan database sudah tercreate, bisa dilihat di Phpmyadmin
    di apk laragon clict database
====================================================================================
6. Coba testing apakah web nya sudah bisa diakses, dengan cara menuliskan php artisan serve di terminal
    • php artisan serve
        Akses di browser dengan mengetikkan : localhost:8000
====================================================================================
7. buat tabel di Phpmyadmin 
    contoh :
        +-------------------+------------------------+----------------------+
        | Field             | Tipe Data              | Contoh Isi           |
        +-------------------+------------------------+----------------------+
        | id                | bigint unsigned (PK)   | 1, 2, 3              |
        | kode_barang       | string(20) / char      | BRG001               |
        | nama_barang       | string(100) / varchar  | Laptop ASUS          |
        | deskripsi         | text / longtext        | Deskripsi panjang... |
        | harga             | integer / int          | 5000000              |
        | harga_jual        | decimal(12,2)          | 5250000.00           |
        | stok              | smallint / int         | 50                   |
        | is_active         | boolean / tinyint      | 1 / 0                |
        | tanggal_masuk     | date                   | 2024-01-15           |
        | waktu_dibuat      | datetime / timestamp   | 2024-01-15 10:30:00  |
        | jam_masuk         | time                   | 08:30:00             |
        | tahun_produksi    | year                   | 2024                 |
        | berat             | float / double         | 1.75                 |
        | rating            | decimal(3,2) / float   | 4.75                 |
        | kode_pos          | char(5)                | 12345                |
        | kategori_enum     | enum                   | Elektronik           |
        | preferensi_json   | json                   | {"warna":"hitam"}    |
        | metadata          | json                   | {...}                |
        | created_at        | timestamp              | 2024-01-15 10:30:00  |
        | updated_at        | timestamp              | 2024-01-15 10:30:00  |
        +-------------------+------------------------+----------------------+
=========================================================================================
8. Buat controller di vscode, ketikkan perintah membuat controller sekaligus nama controllernya
    • php artisan make:controller nama_controller
        contoh:
            php artisan make:controller Cpembeli
        (ada C didepan nama control)
=========================================================================================
9.Buat Model , ketikkan perintah membuat Model sekaligus nama Modelnya
    • php artisan make:Model nama_Model
            contoh:
                php artisan make:Model Mpembeli
            (ada M didepan nama Model)
=========================================================================================
#10. Edit/isi model yang sudah di buat diatas, fungsi model adalah untuk menghubungkan dengan table yang akan digunakan
        <?php
        namespace App\Models;

        use Illuminate\Database\Eloquent\Factories\HasFactory;
        use Illuminate\Database\Eloquent\Model;

        class Mpembeli extends Model
        {
            use HasFactory;
            protected $table = 'pembeli';
            protected $fillabel = [
                'id_pembeli',
                'nama',
                'jns_kelamin',
                'alamat',
                'kode_pos',
                'kota',
                'tgl_lahir',
            ];
        }
==========================================================================================================
#11. Buat routing (pastikan controller sudah dipanggil di bagian atas)
        php
        Route::get('/pembeli', [Cpembeli::class, 'tampilkan'])->name('pembeli.tampilkan');
        Route::get('/pembeli/tambah', [Cpembeli::class, 'tambah'])->name('pembeli.tambah');
        Route::post('/pembeli/simpan', [Cpembeli::class, 'simpan'])->name('pembeli.simpan');
        Route::get('/pembeli/{id}/ubah', [Cpembeli::class, 'ubah'])->name('pembeli.ubah');
        Route::put('/pembeli/{id}/update', [Cpembeli::class, 'update'])->name('pembeli.update');
        Route::delete('/pembeli/{id}/hapus', [Cpembeli::class, 'hapus'])->name('pembeli.hapus');
   
        #Penjelasan :
            #'/pembeli' = URI atau endpoint, yang nantinya dipanggil di url web localhost:8000/pembeli
            #'Cpembeli' = Nama controller
            #'tampilkan' = nama class di controller
            #'name('pembeli.tampilkan') = routingnya diberi nama pembeli.tampilkan
==============================================================================================================
#12. Edit/isi controller, tambahkan class baru sesuai dengan routing diatas, routing diatas nama class yang dipanggil adalah "tampilkan", isi dari class index adalah untuk memanggil halaman yang menampilkan data pembeli sekaligus panggil data dari model
        php
        public function tampilkan()
        {
            $pembeli = Mpembeli::all();
            return view('pembeli.tampilkan', compact('pembeli'));
        }
===============================================================================================================
#13. Buat view sesuai dengan return view diatas, diatas tertulis "pembeli.tampilkan" artinya nama viewnya adalah index yang berada dalam folder pembeli, nama filenya adalah index.blade.php
        <a href="{{ route('pembeli.tambah') }}">Tambah Data</a>
        <table style="width:100%">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Id Pembeli</td>
                    <td>Nama Pembeli</td>
                    <td>JK</td>
                    <td>Alamat</td>
                    <td>Kode Pos</td>
                    <td>Tanggal Lahir</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                @foreach($pembeli as $d)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $d->id_pembeli }}</td>
                    <td>{{ $d->nama }}</td>
                    <td>{{ $d->jns_kelamin }}</td>
                    <td>{!! nl2br($d->alamat) !!}</td>
                    <td>{{ $d->kode_pos }}</td>
                    <td>{{ $d->tgl_lahir }}</td>
                    <td>
                        <form action="{{ route('pembeli.hapus', $d->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('pembeli.ubah', $d->id) }}">Edit</a>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @if(session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
        @endif
==========================================================================================================================================
#14. Menambahkan Data (routing manual)
        #Perhatikan file view blade (tampilkan.blade.php) diatas pada nomor 6, disana sudah ada tombol tambah
        #data yang mengarah ke routing "{{ route('pembeli.tambah') }}", dan routing telah kita buat pada langkah 
        #ke 4 diatas, yaitu: 
            Route::get('/pembeli/tambah', [Cpembeli::class, 'tambah'])->name('pembeli.tambah');

        #Karena tombol tambah data dan routing sudah dibuat diatas, maka Langkah untuk menambah data langsung
        #di lanjutkan ke tahap membuat class pada controller untuk memanggil form tambah data
================================================================================================================================================
#15. Buat class tambah pada controller Cpembeli
        php
        public function tambah()
        {
            return view('pembeli.tambah');
        }
================================================================================================================================================
#16. Buat file view sesuai dengan controller diatas, tambah.blade.php.
        <form method="POST" action="{{ route('pembeli.simpan') }}">
            @csrf
            ID Pembeli :
            <input type="text" name="id_pembeli" required>
            @error('id_pembeli') {{ $message }} @enderror
            <br />
            Nama Pembeli :
            <input type="text" name="nama_pembeli" required>
            @error('nama_pembeli') {{ $message }} @enderror
            <br />
            Jenis Kelamin :
            <select name="jk" required>
                <option value="">Pilih</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            @error('jk') {{ $message }} @enderror
            <br />
            Alamat :
            <textarea name="alamat"></textarea>
            @error('alamat') {{ $message }} @enderror
            <br />
            Kode Pos :
            <input type="text" name="kode_pos" required>
            @error('kode_pos') {{ $message }} @enderror
            <br />
            Tanggal Lahir :
            <input type="date" name="tgl_lahir" required>
            @error('tgl_lahir') {{ $message }} @enderror
            <br /><br />
            <button type="submit">Simpan</button>
            <a href="{{ route('pembeli.tampilkan') }}">Kembali</a>
        </form>
===========================================================================================================================================
#17. Buat/edit class pada controller untuk proses simpan data
        php
        public function simpan(Request $request)
        {
            $request->validate([
                'id_pembeli'=> 'required|string|max:15|unique:pembeli,id_pembeli',
                'nama_pembeli' => 'required|regex:/^[\pL\s]+$/u',
            ]);
            
            $pembeli = new Mpembeli();
            $pembeli->id_pembeli = $request->id_pembeli;
            $pembeli->nama = $request->nama_pembeli;
            $pembeli->jns_kelamin = $request->jk;
            $pembeli->Alamat = $request->alamat;
            $pembeli->kode_pos = $request->kode_pos;
            $pembeli->tgl_lahir = $request->tgl_lahir;
            $pembeli->save();
            
            return redirect()->route('pembeli.tampilkan')->with('Suksek', 'Berhasil tersimpan');
        }
============================================================================================================================================        
#18. Edit Data (routing manual)
    #Perhatikan file view blade (tampilkan.blade.php) diatas pada nomor 6, disana sudah ada tombol edit data yang mengarah ke routing "{{ route('pembeli.ubah', $d->id) }}", dan routing telah kita buat pada langkah ke 4 diatas, yaitu: Route::get('/pembeli/{id}/ubah', [Cpembeli::class, 'ubah'])->name('pembeli.ubah');
    #Karena tombol edit data dan routing sudah dibuat diatas, maka Langkah untuk mengedit data langsung dilanjutkan ke tahap membuat class pada controller untuk memanggil form edit data
    #Buat/edit class pada controller untuk memanggil form edit data
        php
        public function ubah($id)
        {
            $pembeli = Mpembeli::findOrFail($id);
            return view('pembeli.ubah', compact('pembeli'));
        }
=============================================================================================================================================
#19. Buat file view didalam folder pembeli dengan nama file view ubah.blade.php
        #Untuk edit data, kodenya bisa diambil dari form tambah data, hanya 3 hal yang perlu disesuaikan, yaitu :
            #Ganti/sesuaikan route, ubah agar menjadi routing untuk simpan edit data
            #Tambahkan @method('PUT')
            #Tambahkan value untuk menampilkan data yang ada
        #Berikut kodenya, perhatikan teks yang berwarna merah (sengaja ditandai dengan bold atau perhatikan perubahan):
            <form method="POST" action="{{ route('pembeli.update', $pembeli->id) }}">
                @csrf
                @method('PUT')
                ID Pembeli :
                <input type="text" name="id_pembeli" required readonly value="{{ old('id_pembeli', $pembeli->id_pembeli) }}">
                @error('id_pembeli') {{ $message }} @enderror
                <br />
                Nama Pembeli :
                <input type="text" name="nama_pembeli" required value="{{ old('nama_pembeli', $pembeli->nama) }}">
                @error('nama_pembeli') {{ $message }} @enderror
                <br />
                Jenis Kelamin :
                <select name="jk" required>
                    <option value="">Pilih</option>
                    <option value="Laki-laki" {{ $pembeli->jns_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ $pembeli->jns_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
                @error('jk') {{ $message }} @enderror
                <br />
                Alamat :
                <textarea name="alamat">{{ $pembeli->alamat }}</textarea>
                @error('alamat') {{ $message }} @enderror
                <br />
                Kode Pos :
                <input type="text" name="kode_pos" required value="{{ old('kode_pos', $pembeli->kode_pos) }}">
                @error('kode_pos') {{ $message }} @enderror
                <br />
                Tanggal Lahir :
                <input type="date" name="tgl_lahir" required value="{{ old('tgl_lahir', $pembeli->tgl_lahir) }}">
                @error('tgl_lahir') {{ $message }} @enderror
                <br /><br />
                <button type="submit">Simpan</button>
                <a href="{{ route('pembeli.tampilkan') }}">Kembali</a>
            </form>
========================================================================================================================================
#20. Pastikan routing untuk simpan data edit sudah ada (perhatikan pada kode web.php diatas)
=========================================================================================================================================
#21. Buat/edit class pada controller untuk proses simpan Edit data
        php
        public function update(Request $request, $id)
        {
            $request->validate([
                'nama_pembeli' => 'required|regex:/^[\pL\s]+$/u',
            ]);
            
            $pembeli = Mpembeli::findOrFail($id);
            $pembeli->nama = $request->nama_pembeli;
            $pembeli->jns_kelamin = $request->jk;
            $pembeli->Alamat = $request->alamat;
            $pembeli->kode_pos = $request->kode_pos;
            $pembeli->tgl_lahir = $request->tgl_lahir;
            $pembeli->save();
            
            return redirect()->route('pembeli.tampilkan')->with('Sukses', 'Berhasil tersimpan');
        }
==========================================================================================================================
#22. Hapus Data (resource)
        #Buat/edit class pada controller untuk proses hapus data
            php
            public function hapus($id)
            {
                $pembeli = Mpembeli::findOrFail($id);
                $pembeli->delete();
                return redirect()->route('pembeli.tampilkan')->with('success', 'Data siswa berhasil dihapus');
            }
===========================================================================================================================
#Kode Lengkap crud 2
    #web.php (route)
        php
        <?php
        use Illuminate\Support\Facades\Route;
        use App\Http\Controllers\Cbarang;
        use App\Http\Controllers\Cpembeli;

        Route::get('/', function () {
            return view('welcome');
        });

        Route::get('/pembeli', [Cpembeli::class, 'tampilkan'])->name('pembeli.tampilkan');
        Route::get('/pembeli/tambah', [Cpembeli::class, 'tambah'])->name('pembeli.tambah');
        Route::post('/pembeli/simpan', [Cpembeli::class, 'simpan'])->name('pembeli.simpan');
        Route::get('/pembeli/{id}/ubah', [Cpembeli::class, 'ubah'])->name('pembeli.ubah');
        Route::put('/pembeli/{id}/update', [Cpembeli::class, 'update'])->name('pembeli.update');
        Route::delete('/pembeli/{id}/hapus', [Cpembeli::class, 'hapus'])->name('pembeli.hapus');

        Route::resource('barang', Cbarang::class);

    #Mpembeli.php (model)
        php
        <?php
        namespace App\Models;
        use Illuminate\Database\Eloquent\Factories\HasFactory;
        use Illuminate\Database\Eloquent\Model;

        class Mpembeli extends Model
        {
            use HasFactory;
            protected $table = 'pembeli';
            protected $fillabel = [
                'id_pembeli',
                'nama',
                'jns_kelamin',
                'alamat',
                'kode_pos',
                'kota',
                'tgl_lahir',
            ];
        }
    
    #Cpembeli.php (controller)
        php
        <?php
        namespace App\Http\Controllers;
        use Illuminate\Http\Request;
        use App\Models\Mpembeli;

        class Cpembeli extends Controller
        {
            public function tampilkan()
            {
                $pembeli = Mpembeli::all();
                return view('pembeli.tampilkan', compact('pembeli'));
            }
            
            public function tambah()
            {
                return view('pembeli.tambah');
            }
            
            public function simpan(Request $request)
            {
                $request->validate([
                    'id_pembeli'=> 'required|string|max:15|unique:pembeli,id_pembeli',
                    'nama_pembeli' => 'required|regex:/^[\pL\s]+$/u',
                ]);
                
                $pembeli = new Mpembeli();
                $pembeli->id_pembeli = $request->id_pembeli;
                $pembeli->nama = $request->nama_pembeli;
                $pembeli->jns_kelamin = $request->jk;
                $pembeli->alamat = $request->alamat;
                $pembeli->kode_pos = $request->kode_pos;
                $pembeli->tgl_lahir = $request->tgl_lahir;
                $pembeli->save();
                
                return redirect()->route('pembeli.tampilkan')->with('Sukses', 'Berhasil tersimpan');
            }
            
            public function ubah($id)
            {
                $pembeli = Mpembeli::findOrFail($id);
                return view('pembeli.ubah', compact('pembeli'));
            }
            
            public function update(Request $request, $id)
            {
                $request->validate([
                    'nama_pembeli' => 'required|regex:/^[\pL\s]+$/u',
                ]);
                
                $pembeli = Mpembeli::findOrFail($id);
                $pembeli->nama = $request->nama_pembeli;
                $pembeli->jns_kelamin = $request->jk;
                $pembeli->alamat = $request->alamat;
                $pembeli->kode_pos = $request->kode_pos;
                $pembeli->tgl_lahir = $request->tgl_lahir;
                $pembeli->save();
                
                return redirect()->route('pembeli.tampilkan')->with('Sukses', 'Berhasil tersimpan');
            }
            
            public function hapus($id)
            {
                $pembeli = Mpembeli::findOrFail($id);
                $pembeli->delete();
                return redirect()->route('pembeli.tampilkan')->with('Sukses', 'Berhasil tersimpan');
            }
        }

    # tampilkan.blade.php (view)
        <a href="{{ route('pembeli.tambah') }}">Tambah Data</a>
        <table style="width:100%">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Id Pembeli</td>
                    <td>Nama Pembeli</td>
                    <td>JK</td>
                    <td>Alamat</td>
                    <td>Kode Pos</td>
                    <td>Tanggal Lahir</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                @foreach($pembeli as $d)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $d->id_pembeli }}</td>
                    <td>{{ $d->nama }}</td>
                    <td>{{ $d->jns_kelamin }}</td>
                    <td>{!! nl2br($d->alamat) !!}</td>
                    <td>{{ $d->kode_pos }}</td>
                    <td>{{ $d->tgl_lahir }}</td>
                    <td>
                        <form action="{{ route('pembeli.hapus', $d->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('pembeli.ubah', $d->id) }}">Edit</a>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    #tambah.blade.php (view)
        <form method="POST" action="{{ route('pembeli.simpan') }}">
            @csrf
            ID Pembeli :
            <input type="text" name="id_pembeli" required>
            @error('id_pembeli') {{ $message }} @enderror
            <br />
            Nama Pembeli :
            <input type="text" name="nama_pembeli" required>
            @error('nama_pembeli') {{ $message }} @enderror
            <br />
            Jenis Kelamin :
            <select name="jk" required>
                <option value="">Pilih</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            @error('jk') {{ $message }} @enderror
            <br />
            Alamat :
            <textarea name="alamat"></textarea>
            @error('alamat') {{ $message }} @enderror
            <br />
            Kode Pos :
            <input type="text" name="kode_pos" required>
            @error('kode_pos') {{ $message }} @enderror
            <br />
            Tanggal Lahir :
            <input type="date" name="tgl_lahir" required>
            @error('tgl_lahir') {{ $message }} @enderror
            <br /><br />
            <button type="submit">Simpan</button>
            <a href="{{ route('pembeli.tampilkan') }}">Kembali</a>
        </form>

    #ubah.blade.php (view)
        <form method="POST" action="{{ route('pembeli.update', $pembeli->id) }}">
            @csrf
            @method('PUT')
            ID Pembeli :
            <input type="text" name="id_pembeli" required readonly value="{{ old('id_pembeli', $pembeli->id_pembeli) }}">
            @error('id_pembeli') {{ $message }} @enderror
            <br />
            Nama Pembeli :
            <input type="text" name="nama_pembeli" required value="{{ old('nama_pembeli', $pembeli->nama) }}">
            @error('nama_pembeli') {{ $message }} @enderror
            <br />
            Jenis Kelamin :
            <select name="jk" required>
                <option value="">Pilih</option>
                <option value="Laki-laki" {{ $pembeli->jns_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ $pembeli->jns_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
            @error('jk') {{ $message }} @enderror
            <br />
            Alamat :
            <textarea name="alamat">{{ $pembeli->alamat }}</textarea>
            @error('alamat') {{ $message }} @enderror
            <br />
            Kode Pos :
            <input type="text" name="kode_pos" required value="{{ old('kode_pos', $pembeli->kode_pos) }}">
            @error('kode_pos') {{ $message }} @enderror
            <br />
            Tanggal Lahir :
            <input type="date" name="tgl_lahir" required value="{{ old('tgl_lahir', $pembeli->tgl_lahir) }}">
            @error('tgl_lahir') {{ $message }} @enderror
            <br /><br />
            <button type="submit">Simpan</button>
            <a href="{{ route('pembeli.tampilkan') }}">Kembali</a>
        </form>
======================================================================================================================================
# PRAKTEK 4 - MENU SEDERHANA (Laravel)
    #Membuat menu navigasi utama yang menghubungkan halaman CRUD (barang, pembeli, supplier) menggunakan Bootstrap dan layout Blade.
## 1. Buat folder layout di dalam `resources/views`
    #Folder ini akan menyimpan file template menu utama.
## 2. Buat file `menu.blade.php` di `resources/views/layout`,yang isinya:
        <!DOCTYPE html>
        <html>
        <head>
            <title>Praktek Menu</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        </head>
        <body>
        <div class="container">
            <a href="{{ route('beranda') }}">Home</a> |
            <a href="{{ route('barang.index') }}">Barang</a> |
            <a href="{{ route('suplier.index') }}">Suplier</a> |
            <a href="{{ route('pembeli.index') }}">Pembeli</a>
            <hr>
            @yield('konten')
        </div>

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        </body>
        </html>
##3. Buat file dashboard.blade.php di resources/views
        @extends('layout.menu')
        @section('konten')
            <h1>Halaman Utama</h1>
            <p>Selamat datang di aplikasi CRUD sederhana.</p>
        @endsection
#4. Ubah route default (/) di routes/web.php
        php
        Route::get('/', function () {
            return view('welcome');
        })
    #jadi
        php
        Route::get('/', function () {
            return view('dashboard');
        })
##5. Integrasikan layout ke semua halaman CRUD
        #Pada setiap file Blade (index, create, edit) dari modul Barang, Suplier, Pembeli, tambahkan:
            @extends('layout.menu')
            @section('konten')
                <!-- isi halaman asli -->
            @endsection
        #Contoh untuk barang/index.blade.php:
            @extends('layout.menu')
            @section('konten')
            <div class="card">
                <div class="card-header"><b>Data Barang</b></div>
                <div class="card-body">
                    <a href="{{ route('barang.create') }}" class="btn btn-primary btn-sm mb-2">Tambah Data</a>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr><th>No</th><th>Id Barang</th><th>Nama Barang</th><th>Varian</th><th>Harga Beli</th><th>Harga Jual</th><th>Aksi</th></tr>
                        </thead>
                        <tbody>
                            @foreach($barang as $d)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->id_barang }}</td>
                                <td>{{ $d->nama }}</td>
                                <td>{{ $d->varian }}</td>
                                <td>{{ $d->harga_beli }}</td>
                                <td>{{ $d->harga_jual }}</td>
                                <td><a href="{{ route('barang.edit', $d->id) }}" class="btn btn-success btn-sm">Ubah</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endsection
##6. Pastikan semua routing tersedia
        #Contoh route untuk barang (resource) dan lainnya di web.php:
            Route::get('/', function () { return view('dashboard'); })->name('beranda');
            Route::resource('/barang', Cbarang::class);
            Route::resource('/pembeli', Cpembeli::class); // jika pakai resource
            Route::get('/suplier', [Csuplier::class, 'index'])->name('suplier.index');
            // ... route lain sesuai kebutuhan
===========================================================================================================================================
# PRAKTEK 6 - RELASI dengan QUERY BUILDER (Laravel)
    #Menggabungkan tabel pesanan dengan tabel barang dan tabel pembeli menggunakan Query Builder, karena data nama barang, varian, dan nama pembeli tidak ada di tabel pesanan.
## Tujuan
    #Menampilkan data pesanan seperti:
    #| No | ID Pesanan | Nama Barang | Varian | Nama Pembeli | Jumlah | Tanggal Pesan |

## SQL asli yang akan diimplementasikan
    SELECT pesanan.*, 
        barang.nama as nama_barang, 
        barang.varian, 
        pembeli.nama as nama_pembeli
    FROM pesanan
    LEFT JOIN barang ON pesanan.id_barang = barang.id_barang
    LEFT JOIN pembeli ON pesanan.id_pelanggan = pembeli.id_pembeli
##Langkah-langkah
    #1. Buat routing (manual) di routes/web.php
            Route::get('/pesanan', [Cpesanan::class, 'index'])->name('pesanan.index');
            Route::get('/pesanan/tambah', [Cpesanan::class, 'add'])->name('pesanan.add');
            Route::post('/pesanan/simpan', [Cpesanan::class, 'save'])->name('pesanan.save');
            Route::get('/pesanan/{id_pesanan}/ubah', [Cpesanan::class, 'edit'])->name('pesanan.edit');
            Route::put('/pesanan/{id_pesanan}/update', [Cpesanan::class, 'update'])->name('pesanan.update');
            Route::delete('/pesanan/{id_pesanan}/hapus', [Cpesanan::class, 'hapus'])->name('pesanan.hapus');
    #2. Isi model Mpesanan (standar)
            <?php
            namespace App\Models;
            use Illuminate\Database\Eloquent\Factories\HasFactory;
            use Illuminate\Database\Eloquent\Model;
            use Illuminate\Support\Facades\DB;

            class Mpesanan extends Model
            {
                use HasFactory;
                protected $table = 'pesanan';
                protected $fillable = ['id_pesanan', 'id_barang', 'id_pelanggan', 'qty', 'tgl_pesan'];
            }
    #3. Buat class index di controller (Query Builder)
            public function index()
            {
                $pesanan = DB::table('pesanan')
                    ->leftJoin('barang', 'pesanan.id_barang', '=', 'barang.id_barang')
                    ->leftJoin('pembeli', 'pesanan.id_pelanggan', '=', 'pembeli.id_pembeli')
                    ->select('pesanan.*', 'barang.nama as nama_barang', 'barang.varian', 'pembeli.nama as nama_pembeli')
                    ->orderBy('pesanan.tgl_pesan', 'DESC')
                    ->get();

                return view('pesanan.index', compact('pesanan'));
            }
    #4. Buat view index.blade.php
            <a href="{{ route('pesanan.add') }}">Tambah Data</a>
            <table style="width:100%">
                <thead>
                    <tr><th>No</th><th>ID Pesanan</th><th>Nama Barang</th><th>Varian</th><th>Nama Pembeli</th><th>Jumlah</th><th>Tanggal</th><th>Aksi</th></tr>
                </thead>
                <tbody>
                    @foreach($pesanan as $d)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $d->id_pesanan }}</td>
                        <td>{{ $d->nama_barang }}</td>
                        <td>{{ $d->varian }}</td>
                        <td>{{ $d->nama_pembeli }}</td>
                        <td>{{ $d->qty }}</td>
                        <td>{{ $d->tgl_pesan }}</td>
                        <td>
                            <form method="POST" action="{{ route('pesanan.hapus', $d->id_pesanan) }}" onsubmit="return confirm('Yakin ingin menghapus?');">
                                @csrf @method('DELETE')
                                <a href="{{ route('pesanan.edit', $d->id_pesanan) }}">Edit</a>
                                <button type="submit">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    #5. Class add di controller (memanggil form tambah dengan data barang & pembeli)
            public function add()
            {
                $barang = DB::table('barang')->get();
                $pembeli = DB::table('pembeli')->get();
                return view('pesanan.add', compact('barang', 'pembeli'));
            }
    #6 . View add.blade.php (form tambah)
            <form method="POST" action="{{ route('pesanan.save') }}">
                @csrf
                Id Pesanan : <input type="text" name="id_pesanan" required> @error('id_pesanan') {{ $message }} @enderror <br>
                Nama Barang :
                <select name="nama_barang" required>
                    <option value="">Pilih</option>
                    @foreach($barang as $brg)
                        <option value="{{ $brg->id_barang }}">{{ $brg->nama }}</option>
                    @endforeach
                </select><br>
                Nama Pembeli :
                <select name="nama_pembeli" required>
                    <option value="">Pilih</option>
                    @foreach($pembeli as $pem)
                        <option value="{{ $pem->id_pembeli }}">{{ $pem->nama }}</option>
                    @endforeach
                </select><br>
                Jumlah : <input type="number" name="qty" required> @error('qty') {{ $message }} @enderror <br>
                Tgl Pesan : <input type="date" name="tgl_pesan" required> @error('tgl_pesan') {{ $message }} @enderror <br>
                <button type="submit">Simpan</button>
                <a href="{{ route('pesanan.index') }}">Kembali</a>
            </form>
    #7. Class save untuk menyimpan data
            public function save(Request $request)
            {
                $request->validate(['id_pesanan' => 'required|max:15|unique:pesanan,id_pesanan']);
                $pesanan = new Mpesanan;
                $pesanan->id_pesanan = $request->id_pesanan;
                $pesanan->id_barang = $request->nama_barang;
                $pesanan->id_pelanggan = $request->nama_pembeli;
                $pesanan->qty = $request->qty;
                $pesanan->tgl_pesan = $request->tgl_pesan;
                $pesanan->save();
                return redirect()->route('pesanan.index')->with('Sukses', 'Data tersimpan');
            }
    #8. Class edit (form edit)
            public function edit($id_pesanan)
            {
                $pesanan = Mpesanan::where('id_pesanan', $id_pesanan)->first();
                $barang = DB::table('barang')->get();
                $pembeli = DB::table('pembeli')->get();
                return view('pesanan.edit', compact('pesanan', 'barang', 'pembeli'));
            }
    #9. View edit.blade.php (sama seperti add, tapi dengan value dan @method PUT)
            <form method="POST" action="{{ route('pesanan.update', $pesanan->id_pesanan) }}">
                @csrf @method('PUT')
                Id Pesanan : <input type="text" name="id_pesanan" readonly value="{{ old('id_pesanan', $pesanan->id_pesanan) }}"><br>
                Nama Barang :
                <select name="nama_barang" required>
                    @foreach($barang as $brg)
                        <option value="{{ $brg->id_barang }}" {{ $brg->id_barang == $pesanan->id_barang ? 'selected' : '' }}>{{ $brg->nama }}</option>
                    @endforeach
                </select><br>
                Nama Pembeli :
                <select name="nama_pembeli" required>
                    @foreach($pembeli as $pem)
                        <option value="{{ $pem->id_pembeli }}" {{ $pem->id_pembeli == $pesanan->id_pelanggan ? 'selected' : '' }}>{{ $pem->nama }}</option>
                    @endforeach
                </select><br>
                Jumlah : <input type="number" name="qty" value="{{ $pesanan->qty }}" required><br>
                Tgl Pesan : <input type="date" name="tgl_pesan" value="{{ $pesanan->tgl_pesan }}" required><br>
                <button type="submit">Update</button>
                <a href="{{ route('pesanan.index') }}">Kembali</a>
            </form>
    #10. Class update untuk proses edit
            public function update(Request $request, $id_pesanan)
            {
                $pesanan = Mpesanan::where('id_pesanan', $id_pesanan)->first();
                if ($pesanan) {
                    $pesanan->id_barang = $request->nama_barang;
                    $pesanan->id_pelanggan = $request->nama_pembeli;
                    $pesanan->qty = $request->qty;
                    $pesanan->tgl_pesan = $request->tgl_pesan;
                    $pesanan->save();
                }
                return redirect()->route('pesanan.index')->with('Sukses', 'Data tersimpan');
            }
    #11. Class hapus (delete)
            public function hapus($id_pesanan)
            {
                $pesanan = Mpesanan::where('id_pesanan', $id_pesanan)->first();
                $pesanan->delete();
                return redirect()->route('pesanan.index')->with('Sukses', 'Data terhapus');
            }
    #Catatan Penting
        #Query Builder tidak menggunakan model relasi Eloquent, tetapi langsung DB::table().
        #Semua join dan select ditulis manual.
        #Cocok untuk kasus yang membutuhkan kontrol penuh terhadap query SQL.
        #Jangan lupa menyesuaikan nama tabel dan kolom dengan database Anda.
    #Hasil Akhir
        #Data pesanan menampilkan nama barang, varian, dan nama pembeli dari tabel relasi.
        #CRUD (Tambah, Edit, Hapus) berfungsi dengan tetap menyimpan foreign key yang benar.
=================================================================================================================
# PRAKTEK 8 - TEMPLATE (Laravel)
    #Menggunakan template siap pakai (bisa download dari link yang disediakan) dan mengintegrasikannya ke dalam Laravel. Template ini berisi file CSS, JS, gambar, dll.
        ## Link Download Template
        https://drive.google.com/file/d/1hKbVE4HvcqxAC9yMNzph9h8ytmRPQMHU/view?usp=sharing

## Langkah-langkah Penggunaan Template
    # 1. Download dan extract template
        #- Download file zip dari link di atas.
        #- Extract isinya.
    # 2. Buat folder `assets` di dalam `public`
        #public/assets/
    #3. Copy semua folder (css, js, img, lib, dll.) dari hasil extract ke public/assets/
        #Struktur setelah copy:
            #public/assets/
            #├── css/
            #├── js/
            #├── img/
            #├── lib/
            #└── ...
    #4. Buat folder layout di dalam resources/views
        #resources/views/layout/
    #5. Buat file menu.blade.php di dalam resources/views/layout
    #6. Copy isi file index.php (dari template) ke menu.blade.php
    #7. Ubah semua link CSS dan JS agar menggunakan asset()
        #Contoh:
            //<!-- Asli -->
            <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet">
            //<!-- Menjadi -->
            <link href="{{ asset('assets/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    #8. Di dalam menu.blade.php, pada bagian konten utama, ganti dengan @yield('konten')
        #Cari tempat di mana konten halaman ditampilkan (biasanya di dalam <div class="content"> atau sejenis), lalu ganti dengan:
            @yield('konten')
    #9. Ubah welcome.blade.php menjadi
        @extends('layout.menu')
        @section('konten')
            ..... Isi webnya .....
        @endsection
    #10. Tambahkan menu navigasi (sesuai kebutuhan)
        #Contoh menu:
            <li class="nav-item">
                <a href="{{ route('barang.index') }}" class="nav-link {{ Request::is('barang') ? 'active' : '' }}">
                    <i class="fa fa-briefcase"></i>
                    <span>Data Barang</span>
                </a>
            </li>
    #11. Routing ke halaman utama (dashboard)
        #Di routes/web.php:
            Route::get('/', [Cdashboard::class, 'index'])->name('dashboard');
    #12. Pada setiap file blade (CRUD), tambahkan:
        @extends('layout.menu')
        @section('konten')
            <!-- konten asli -->
        @endsection

##Membuat Breadcrumb
    #1. Di menu.blade.php, cari bagian breadcrumb (biasanya class am-pagetitle). Ubah menjadi:
        <div class="am-pagetitle">
            <h5 class="am-title">{{ isset($judul) ? $judul : '' }}</h5>
        </div>
#   2. Di setiap controller method, tambahkan variabel $judul:
        public function index()
        {
            $judul = 'Data Barang';
            $barang = Mbarang::get();
            return view('barang.index', compact('barang', 'judul'));
        }

##Membuat Halaman Dashboard
    #1. Buat model Mdashboard di app/Models
        <?php
        namespace App\Models;
        use Illuminate\Database\Eloquent\Model;
        use Illuminate\Support\Facades\DB;

        class Mdashboard extends Model
        {
            public function jumlah_barang()
            {
                return DB::table('barang')->count();
            }
            public function jumlah_pembeli()
            {
                return DB::table('pembeli')->count();
            }
            public function jumlah_suplier()
            {
                return DB::table('suplier')->count();
            }
        }
    #2. Buat controller Cdashboard
        <?php
        namespace App\Http\Controllers;
        use App\Models\Mdashboard;

        class Cdashboard extends Controller
        {
            public function index()
            {
                $dash = new Mdashboard();
                $jumlah_barang = $dash->jumlah_barang();
                $jumlah_pembeli = $dash->jumlah_pembeli();
                $jumlah_suplier = $dash->jumlah_suplier();
                return view('dashboard.index', compact('jumlah_barang', 'jumlah_pembeli', 'jumlah_suplier'));
            }
        }
    #3. Buat view dashboard/index.blade.php
        @extends('layout.menu')
        @section('konten')
            <div class="row">
                <div class="col-md-4">
                    <div class="card">Total Barang: {{ $jumlah_barang }}</div>
                </div>
                <div class="col-md-4">
                    <div class="card">Total Pembeli: {{ $jumlah_pembeli }}</div>
                </div>
                <div class="col-md-4">
                    <div class="card">Total Suplier: {{ $jumlah_suplier }}</div>
                </div>
            </div>
        @endsection
    #4. Routing dashboard
        Route::get('/home', [Cdashboard::class, 'index'])->name('home');
==================================================================================================================
# PRAKTEK 9 - NOTIFIKASI (Laravel)
    #Menggunakan **SweetAlert2** untuk menampilkan notifikasi yang lebih interaktif dan cantik, serta flashdata biasa untuk pesan sementara.
        #1. Persiapan SweetAlert2
            #Tambahkan CDN SweetAlert2 di bagian `<head>` file template utama (misal `layout/menu.blade.php`).
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        #2. Notifikasi Simpan Data (redirect dengan session)
            #Di Controller (setelah proses simpan berhasil)
                return redirect()->route('siswa.index')->with('status', [
                    'judul' => 'Berhasil',
                    'pesan' => 'Data berhasil disimpan',
                    'icon' => 'success'
                ]);
            #Di View (halaman yang dituju, misal index.blade.php)
                @if(session('status'))
                <script>
                    Swal.fire({
                        title: "{{ session('status')['judul'] }}",
                        text: "{{ session('status')['pesan'] }}",
                        icon: "{{ session('status')['icon'] }}"
                    });
                </script>
                @endif
        #3. Notifikasi Simpan Data (posisi pojok kanan, auto close)
            @if(session('status'))
            <script>
                Swal.fire({
                    position: "top-end",
                    icon: "{{ session('status')['icon'] }}",
                    title: "{{ session('status')['judul'] }}",
                    showConfirmButton: false,
                    timer: 1500
                });
            </script>
            @endif
        #4. Notifikasi Hapus Data (konfirmasi sebelum hapus)
            #Di View (tombol hapus dengan konfirmasi SweetAlert)
                <form id="delete-form-{{ $d->id }}" method="POST" action="{{ route('siswa.destroy', $d->id) }}">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('siswa.edit', $d->id) }}" class="btn btn-success btn-sm">Edit</a>
                    <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $d->id }})">Hapus</button>
                </form>

                <script>
                    function confirmDelete(id) {
                        Swal.fire({
                            title: 'Yakin hapus data?',
                            text: "Data yang dihapus tidak dapat dikembalikan!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Ya, hapus!',
                            cancelButtonText: 'Batal'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                document.getElementById('delete-form-' + id).submit();
                            }
                        });
                    }
                </script>
        #5. Flashdata (tanpa SweetAlert, menggunakan alert Bootstrap)
            #Di Controller
                return redirect()->route('mhs.index')->with('success', 'Data Berhasil Disimpan!');
            #Di View
                @if(session('success'))
                <div class="alert alert-success" id="flash">
                    {{ session('success') }}
                </div>
                @endif

                <script>
                    setTimeout(function() {
                        document.getElementById('flash').style.display = 'none';
                    }, 3000);
                </script>
        #6. Contoh Lengkap (Controller + View)
            #Controller (store)
                public function store(Request $request)
                {
                    // validasi dan simpan data ...
                    return redirect()->route('barang.index')->with('status', [
                        'judul' => 'Berhasil',
                        'pesan' => 'Data barang berhasil disimpan',
                        'icon' => 'success'
                    ]);
                }
            #View index.blade.php (dengan SweetAlert)
                @extends('layout.menu')
                @section('konten')
                    <!-- konten tabel dll. -->

                    @if(session('status'))
                    <script>
                        Swal.fire({
                            title: "{{ session('status')['judul'] }}",
                            text: "{{ session('status')['pesan'] }}",
                            icon: "{{ session('status')['icon'] }}",
                            confirmButtonText: 'OK'
                        });
                    </script>
                    @endif
                @endsection
=======================================================================================================================
# PRAKTEK 10 - LOGIN (Laravel)
    #Membuat sistem login, logout, serta pembatasan akses berdasarkan level user menggunakan authentication bawaan Laravel dan middleware.
# Langkah-langkah
    #1. Migrasi tabel users (tambah field username & level)
        #Edit file migrasi `database/migrations/2014_10_12_000000_create_users_table.php`:
            public function up(): void
            {
                Schema::create('users', function (Blueprint $table) {
                    $table->id();
                    $table->string('name');
                    $table->string('username')->unique();     // tambahan
                    $table->string('email')->unique();
                    $table->timestamp('email_verified_at')->nullable();
                    $table->string('password');
                    $table->string('level');                  // tambahan
                    $table->rememberToken();
                    $table->timestamps();
                });
            }
        #Jalankan migrasi:
            php artisan migrate
    #2. Update model User (app/Models/User.php)
        #Tambahkan username dan level ke $fillable:
            protected $fillable = [
                'name',
                'email',
                'username',
                'level',
                'password',
            ];
    #3. Buat Seeder untuk data user
        php artisan make:seeder UserSeeder
            #Isi database/seeders/UserSeeder.php:
                <?php
                namespace Database\Seeders;
                use App\Models\User;
                use Illuminate\Database\Seeder;
                use Illuminate\Support\Facades\Hash;

                class UserSeeder extends Seeder
                {
                    public function run(): void
                    {
                        $users = [
                            [
                                'username' => 'admin',
                                'name' => 'Administrator',
                                'email' => 'admin@gmail.com',
                                'level' => 'admin',
                                'password' => Hash::make('123456')
                            ],
                            [
                                'username' => 'user1',
                                'name' => 'Akun User1',
                                'email' => 'user1@gmail.com',
                                'level' => 'user',
                                'password' => Hash::make('123456')
                            ],
                            [
                                'username' => 'user2',
                                'name' => 'Akun User2',
                                'email' => 'user2@gmail.com',
                                'level' => 'user',
                                'password' => Hash::make('123456')
                            ],
                        ];
                        foreach ($users as $user) {
                            User::create($user);
                        }
                    }
                }
        #Jalankan seeder:
            php artisan db:seed --class=UserSeeder
    #4. Buat controller Clogin
        php artisan make:controller Clogin
    #5. Routing di routes/web.php
        <?php
        use App\Http\Controllers\Clogin;
        use App\Http\Controllers\Cdashboard;

        // Guest (belum login)
        Route::middleware(['guest'])->group(function () {
            Route::get('/login', [Clogin::class, 'index'])->name('login');
            Route::post('/login', [Clogin::class, 'login_proses'])->name('login_proses');
        });

        // Auth (sudah login)
        Route::middleware(['auth'])->group(function () {
            Route::get('/', function () { return view('welcome'); })->name('home');
            Route::get('/logout', [Clogin::class, 'logout'])->name('logout');
            Route::get('/dashboard', [Cdashboard::class, 'index'])->name('dashboard');
            // Route resource CRUD dll. bisa ditambahkan di sini
        });
    #6. Membuat form login
        #Buat folder auth di resources/views lalu file login.blade.php:
            <form action="{{ route('login_proses') }}" method="post">
                @csrf
                <div class="form-group">
                    <label>Username :</label>
                    <input type="text" name="username" class="form-control" placeholder="Enter your username">
                    @error('username') <span style="color:crimson">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label>Password :</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter your password">
                    @error('password') <span style="color:crimson">{{ $message }}</span> @enderror
                </div>
                <button type="submit" class="btn btn-block">Login</button>
            </form>
    #7. Controller Clogin (method index, login_proses, logout)
        <?php
        namespace App\Http\Controllers;
        use Illuminate\Http\Request;
        use App\Models\User;
        use Illuminate\Support\Facades\Auth;

        class Clogin extends Controller
        {
            public function index()
            {
                return view('auth.login');
            }

            public function login_proses(Request $request)
            {
                $request->validate([
                    'username' => 'required',
                    'password' => 'required',
                ], [
                    'username.required' => 'Username wajib diisi',
                    'password.required' => 'Password wajib diisi',
                ]);

                $credentials = $request->only('username', 'password');
                $user = User::where('username', $request->username)->first();

                if (!$user) {
                    return redirect()->route('login')->withErrors(['username' => 'Username tidak ditemukan']);
                }
                if (!Auth::attempt($credentials)) {
                    return redirect()->route('login')->withErrors(['password' => 'Password salah']);
                }
                if (Auth::attempt($credentials)) {
                    return redirect()->route('home');
                } else {
                    return redirect()->route('login')->with('failed', 'Username atau password salah');
                }
            }

            public function logout()
            {
                Auth::logout();
                return redirect()->route('login')->with('logout', 'Berhasil Logout');
            }
        }
    #8. Logout (tampilan tombol/link)
        #Logout dalam bentuk link:
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        #Logout dalam bentuk button:
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
    #9. Pembatasan tombol/menu berdasarkan level
        #Tombol hanya untuk admin:
            @if(auth()->user()->level === 'admin')
                <a href="{{ route('anggota.edit', $anggota->id) }}" class="btn btn-warning btn-sm">Edit</a>
            @else
                <button class="btn btn-warning btn-sm" disabled>Edit</button>
            @endif
        #Menu hanya muncul untuk admin:
            @if(auth()->user()->level === 'admin')
                <li class="nav-item">
                    <a href="#" class="nav-link">Data Anggota</a>
                </li>
            @endif
    #10. Menampilkan session user (nama yang login)
        <div class="info">
            <a href="#" class="d-block">{{ auth()->user()->name }}</a>
        </div>
    #Kode Lengkap (ringkasan)
        #web.php
            <?php
            use App\Http\Controllers\Clogin;
            use App\Http\Controllers\Cdashboard;

            Route::middleware(['guest'])->group(function () {
                Route::get('/', [Clogin::class, 'index'])->name('login');
                Route::post('/', [Clogin::class, 'login_proses'])->name('login_proses');
            });
            Route::get('/home', function () { return redirect('dashboard'); });
            Route::middleware(['auth'])->group(function () {
                Route::get('/logout', [Clogin::class, 'logout'])->name('logout');
                Route::get('/dashboard', [Cdashboard::class, 'index'])->name('dashboard');
                // tambahkan route resource CRUD di sini jika perlu
            });
        #Clogin.php (lengkap)
            <?php
            namespace App\Http\Controllers;
            use Illuminate\Http\Request;
            use App\Models\User;
            use Illuminate\Support\Facades\Auth;

            class Clogin extends Controller
            {
                public function index() { return view('auth.login'); }
                public function login_proses(Request $request) { ... } // sesuai di atas
                public function logout() { Auth::logout(); return redirect()->route('login'); }
            }
        #dashboard.blade.php (contoh halaman setelah login)
            Ini halaman dashboard<br>
            Selamat datang {{ Auth::user()->name }}<br>
            <a href="{{ route('logout') }}">Logout</a>
=======================================================================================================================
# PRAKTEK 11 - MIDDLEWARE (Laravel)
    #Middleware berfungsi sebagai filter request sebelum masuk ke controller. Digunakan untuk otentikasi, otorisasi (level user), modifikasi request, CORS, dll.
# Fungsi Utama Middleware
    #- **Otentikasi**: Memastikan user sudah login.
    #- **Otorisasi**: Membatasi akses berdasarkan level (admin, user, dll).
    #- **Modifikasi Request**: Memvalidasi/mengubah data request.
    #- **Pengaturan Bahasa**: Set locale berdasarkan preferensi user.
# Langkah-langkah Membuat Middleware Custom (Level_user)
    # 1. Buat Middleware baru
        php artisan make:middleware Level_user
    #2. Isi middleware app/Http/Middleware/Level_user.php
        <?php
        namespace App\Http\Middleware;
        use Closure;
        use Illuminate\Http\Request;
        use Symfony\Component\HttpFoundation\Response;

        class Level_user
        {
            public function handle(Request $request, Closure $next, ...$roles): Response
            {
                // Cek apakah user sudah login dan levelnya ada dalam array $roles
                if (auth()->check() && in_array(auth()->user()->level, $roles)) {
                    return $next($request);
                }
                // Jika tidak punya akses, tampilkan error 403
                abort(403, 'Akses ditolak');
            }
        }
    #3. Daftarkan middleware di bootstrap/app.php (Laravel 11+)
        // Dalam file bootstrap/app.php
        use App\Http\Middleware\Level_user;

        ->withMiddleware(function (Middleware $middleware) {
            $middleware->alias([
                'role' => Level_user::class,
            ]);
        })
        #Catatan: Untuk Laravel 10 ke bawah, pendaftaran dilakukan di app/Http/Kernel.php pada property $routeMiddleware.
    #4. Gunakan middleware pada route di routes/web.php
        #Contoh 1: Route hanya bisa diakses admin dan petugas
            Route::middleware(['auth', 'role:admin,petugas'])->group(function () {
                Route::get('/dashboard-admin', function () {
                    return view('admin.dashboard');
                });
                Route::resource('/user', UserController::class);
            });
        #Contoh 2: Route hanya bisa diakses admin (satu role)
            Route::middleware(['auth', 'role:admin'])->group(function () {
                Route::get('/laporan', [LaporanController::class, 'index']);
                Route::post('/laporan/cetak', [LaporanController::class, 'cetak']);
            });
        #Contoh 3: Menerapkan pada resource controller
            Route::resource('/barang', BarangController::class)->middleware(['auth', 'role:admin']);
    #5. Contoh implementasi pembatasan di Blade (opsional, hanya tampilan)
        @if(auth()->check() && auth()->user()->level === 'admin')
            <a href="{{ route('barang.create') }}" class="btn btn-primary">Tambah Barang</a>
        @else
            <button class="btn btn-secondary" disabled>Tambah Barang (hanya admin)</button>
        @endif
    #Middleware Bawaan Laravel yang Sering Digunakan
        ----------------------------------------------------------------------
       |Middleware      |Fungsi                                               |
        ----------------------------------------------------------------------
       |auth	        |Memastikan user sudah login                          |
       |guest	        |Memastikan user belum login (halaman login/register) |
       |throttle:60,1	|Membatasi request maksimal 60 per menit              |
       |verified	    |Memastikan email sudah diverifikasi                  |
       |cors	        |Menangani Cross-Origin Resource Sharing              |
        ----------------------------------------------------------------------
    #Contoh Middleware untuk CORS (jika perlu)
        // app/Http/Middleware/Cors.php
        public function handle($request, Closure $next)
        {
            return $next($request)
                ->header('Access-Control-Allow-Origin', '*')
                ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
                ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
        }
=====================================================================================================================================
# PRAKTEK 14 - Kode atau Nomor Otomatis (Laravel)
    #Membuat kode ID otomatis, misal kode barang `B-0001`, `B-0002`, dst., atau format berisi tahun/bulan dan reset per periode.
        #1. Kode Barang Otomatis (format B-0001, B-0002, ...)
            #Tambahkan method `kode_barang()` di controller (contoh: `Cbarang.php`)
                private function kode_barang()
                {
                    $nomor_terakhir = Mbarang::orderBy('id_barang', 'desc')->first();
                    if (!$nomor_terakhir) {
                        $kode_baru = 'B-0001';
                    } else {
                        $lastKode = (int) substr($nomor_terakhir->id_barang, 2);
                        $nomor_baru = $lastKode + 1;
                        $kode_baru = 'B-' . str_pad($nomor_baru, 4, '0', STR_PAD_LEFT);
                    }
                    return $kode_baru;
                }
            #Panggil method tersebut di method create() (form tambah data)
                public function create()
                {
                    $kode_barang = $this->kode_barang();
                    return view('barang.tambah', compact('kode_barang'));
                }
            #Tampilkan kode barang otomatis di form tambah (view tambah.blade.php)
                ID Barang :
                <input type="text" name="id_barang" class="form-control" required value="{{ $kode_barang }}">
                @error('id_barang') {{ $message }} @enderror
        #2. Kode Barang Mengandung Tahun/Bulan dan Reset Per Periode
            #Contoh: B-24010001 (B- tahun bulan 0001). Setiap bulan akan reset mulai 0001 lagi.
                #Method kode_barang() dengan format tahun+bulan
                    private function kode_barang()
                    {
                        $tahun = date('y');
                        $bulan = date('m');
                        $tahun_bulan = $tahun . $bulan;   // misal 2401 untuk Januari 2024

                        $nomor_terakhir = Mbarang::where('id_barang', 'like', 'B-' . $tahun_bulan . '%')
                            ->orderBy('id_barang', 'desc')
                            ->first();

                        if (!$nomor_terakhir) {
                            $kode_baru = 'B-' . $tahun_bulan . '0001';
                        } else {
                            $lastKode = (int) substr($nomor_terakhir->id_barang, 7); // panjang prefix "B-2401" = 6? hitung: B- + 4 digit = 6 karakter? sesuaikan.
                            // Atau lebih aman: explode('-')
                            $parts = explode('-', $nomor_terakhir->id_barang);
                            $lastNumber = (int) $parts[1];
                            $newNumber = $lastNumber + 1;
                            $kode_baru = 'B-' . $tahun_bulan . str_pad($newNumber, 4, '0', STR_PAD_LEFT);
                        }
                        return $kode_baru;
                    }
                    #Catatan: Panjang string $tahun_bulan adalah 4 digit. Maka substr($nomor_terakhir->id_barang, 6) jika format B-24010001 (indeks ke-6 setelah B-?). Lebih aman gunakan explode seperti di atas.

                #Alternatif dengan explode (lebih rapi)
                    private function kode_barang()
                    {
                        $tahun_bulan = date('ym');
                        $last = Mbarang::where('id_barang', 'like', 'B-' . $tahun_bulan . '%')
                            ->orderBy('id_barang', 'desc')
                            ->first();

                        if (!$last) {
                            $newKode = 'B-' . $tahun_bulan . '0001';
                        } else {
                            $lastNumber = (int) substr($last->id_barang, -4);
                            $newNumber = $lastNumber + 1;
                            $newKode = 'B-' . $tahun_bulan . str_pad($newNumber, 4, '0', STR_PAD_LEFT);
                        }
                        return $newKode;
                    }
        #3. Penggunaan di Form Tambah (sama seperti cara pertama)
            public function create()
            {
                $kode_barang = $this->kode_barang();
                return view('barang.create', compact('kode_barang'));
            }
        #Di view:
            <div class="form-group">
                <label>Kode Barang</label>
                <input type="text" name="id_barang" class="form-control" value="{{ $kode_barang }}" readonly>
            </div>
========================================================================================================================================
# PRAKTEK 15 - Upload File
    #Tempat Penyimpanan File (public vs storage)
        #- **public/uploads** : mudah diakses via URL, cocok untuk file publik (gambar profil, produk), tetapi kurang aman.
        #- **storage/app/public** : lebih aman, perlu `php artisan storage:link`, disarankan untuk file sensitif.
    # Langkah Upload ke folder `public/uploads/foto_barang`
        #1. Buat folder di `public/uploads/foto_barang`
            public/uploads/foto_barang/
        #2. Tambahkan field foto pada tabel (migration)
            Schema::table('barang', function (Blueprint $table) {
                $table->string('foto')->nullable();
            });
        #3. Tambahkan foto ke $fillable di model
            protected $fillable = ['id_barang', 'nama', 'varian', 'harga_beli', 'harga_jual', 'foto'];
        #4. Tambahkan enctype="multipart/form-data" pada form di view
            <form method="POST" action="{{ route('barang.store') }}" enctype="multipart/form-data">
                @csrf
                ...
                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" name="foto" class="form-control" accept=".jpg,.jpeg,.png">
                </div>
                ...
            </form>
        #5. Controller store (proses upload)
            public function store(Request $request)
            {
                $request->validate([
                    'id_barang' => 'required|max:10|unique:barang,id_barang',
                    'nama_barang' => 'required|regex:/^[\pL\s]+$/u',
                    'harga_beli' => 'required|numeric|min:0',
                    'harga_jual' => 'required|numeric|min:0',
                    'foto' => 'image|mimes:jpeg,jpg,png|max:2048', // 2MB
                ]);

                $filename = null;
                if ($request->hasFile('foto')) {
                    $file = $request->file('foto');
                    $extension = $file->getClientOriginalExtension();
                    $filename = date('YmdHis') . '.' . $extension;
                    $file->move(public_path('uploads/foto_barang'), $filename);
                }

                Mbarang::create([
                    'id_barang' => $request->id_barang,
                    'nama' => $request->nama_barang,
                    'varian' => $request->varian,
                    'harga_beli' => $request->harga_beli,
                    'harga_jual' => $request->harga_jual,
                    'foto' => $filename,
                ]);

                return redirect()->route('barang.index')->with('Sukses', 'Data Tersimpan');
            }
        #6. Tampilkan foto di index
            <td>
                @if($d->foto)
                    <img src="{{ asset('uploads/foto_barang/' . $d->foto) }}" style="width: 100px; height: auto;">
                @else
                    No Foto
                @endif
            </td>
===============================================================================================================================
#PRAKTEK 16 - Cetak
    #Langkah Membuat Cetak Data (tanpa library)
        #1. Tambahkan tombol cetak di view index
            <a href="{{ route('barang.cetak') }}" target="_blank" class="btn btn-danger btn-sm">Cetak</a>
        #2. Buat routing di web.php
            Route::get('/barang/cetak', [Cbarang::class, 'cetak'])->name('barang.cetak');
            #Jika menggunakan resource, tambahkan ->except(['show']) atau buat manual.

        #3. Controller method cetak
            public function cetak()
            {
                $barang = Mbarang::get();
                return view('barang.cetak', compact('barang'));
            }
        #4. View cetak.blade.php (otomatis print & close)
            <!DOCTYPE html>
            <html>
            <head>
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
                <style>
                    @media print {
                        @page {
                            size: A4;
                            margin: 20mm 20mm 20mm 20mm;
                        }
                        body { margin: 0; -webkit-print-color-adjust: exact; }
                    }
                </style>
            </head>
            <body onload="window.print(); window.onafterprint = closeWindow;">
                <h1>Data Barang</h1>
                <table class="table">
                    <thead><tr><th>ID Barang</th><th>Nama</th><th>Harga Beli</th><th>Harga Jual</th></tr></thead>
                    <tbody>
                        @foreach($barang as $item)
                        <tr><td>{{ $item->id_barang }}</td><td>{{ $item->nama }}</td><td>{{ $item->harga_beli }}</td><td>{{ $item->harga_jual }}</td></tr>
                        @endforeach
                    </tbody>
                </table>
                <script>
                    function closeWindow() { window.close(); }
                </script>
            </body>
            </html>
        #5. Mengatur Landscape
            @page {
                size: A4 landscape;
                margin: 20mm;
            }
=============================================================================================================================
#PRAKTEK 17 - Export Ke Excel
    #Export menggunakan HTML table (tanpa library eksternal) dengan format .xls yang tetap bisa dibuka di Excel.
        #Langkah-langkah
            #1. Tambahkan tombol export di view index
                <a href="{{ route('barang.excel') }}" class="btn btn-success btn-sm">Export Excel</a>
            #2. Buat routing di web.php
                Route::get('/barang/excel', [Cbarang::class, 'excel'])->name('barang.excel');
            #3. Controller method excel
                public function excel()
                {
                    header("Content-type: application/vnd-ms-excel");
                    header("Content-Disposition: attachment; filename=Data_Barang.xls");
                    $barang = Mbarang::get();
                    return view('barang.excel', compact('barang'));
                }
            #4. View excel.blade.php (isi tabel seperti biasa)
                <!DOCTYPE html>
                <html>
                <head><meta charset="UTF-8"></head>
                <body>
                    <h2>Data Barang</h2>
                    <table border="1">
                        <thead>
                            <tr>
                                <th>ID Barang</th>
                                <th>Nama</th>
                                <th>Varian</th>
                                <th>Harga Beli</th>
                                <th>Harga Jual</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($barang as $d)
                            <tr>
                                <td>{{ $d->id_barang }}</td>
                                <td>{{ $d->nama }}</td>
                                <td>{{ $d->varian }}</td>
                                <td>{{ $d->harga_beli }}</td>
                                <td>{{ $d->harga_jual }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </body>
                </html>
            #Catatan: File .xls ini adalah file HTML yang dibaca Excel, cukup untuk kebutuhan sederhana. Untuk export lebih kompleks (formatasi, multi-sheet), gunakan library Maatwebsite atau PhpSpreadsheet
=============================================================================================================================================================================