<form method="POST" action="{{ route('pembeli.simpan') }}">
    <!-- @csrf -->
    ID Pembeli :
    <input type="text" name="id_pembeli" required>
    <br>
    Nama Pembeli :
    <input type="text" name="nama" required>
    <br>
    Jenis Kelamin :
    <select name="jenis_kelamin" required>
        <option value="">Pilih</option>
        <option value="Laki-laki">Laki-laki</option>
        <option value="Perempuan">Perempuan</option>
    </select>
    <br>
    Alamat :
    <textarea name="alamat"></textarea>
    <br>
    Kode Pos :
    <input type="text" name="kode_pos" required>
    <br>
    Tanggal Lahir :
    <input type="date" name="tanggal_lahir" required>
    <br>
    <button type="submit">SAVE</button>
    <a href="{{ route('pembeli.tampilan') }}">Kembali</a>
</form>

