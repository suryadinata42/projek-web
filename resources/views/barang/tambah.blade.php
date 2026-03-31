<form method="POST" action="{{ route('barang.simpan') }}">
    @csrf
    ID Barang:
    <input type="text" name="id_barang" required>
    <br>
    Nama Barang:
    <input type="text" name="nama" required>
    <br>
    Varian Barang:
    <input type="text" name="varian" required>
    <br>
    Harga Beli:
    <input type="number" name="harga_beli" required>
    <br>
    harga Jual:
    <input type="number" name="harga_jual" required>
    <br>

    <button type="submit">SAVE</button>
    <a href="{{ route('barang.tampilkan') }}">RESET</button>
</form>