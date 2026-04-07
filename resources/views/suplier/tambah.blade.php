<form method="POST" action="{{ route('suplier.simpan') }}">
    <!-- @csrf -->
    ID Suplier :
    <input type="text" name="id_suplier" required>
    <br>
    Nama Suplier :
    <input type="text" name="nama" required>
    <br>
    Alamat Suplier :
    <textarea name="alamat" required></textarea>
    <br>
    Kode Pos :
    <input type="text" name="kode_pos" required>
    <br>
    Kota :
    <input type="text" name="kota" required>
    <br>
    <button type="submit">SAVE</button>
    <a href="{{ route('suplier.tampil') }}">Kembali</a>
</form>
