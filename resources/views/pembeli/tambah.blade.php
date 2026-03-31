<form method="POST" action="{{ route('pembeli.simpan') }}">
    @csrf
    ID Pembeli :
    <input type="text" name="id_pembeli" required>
    @error('id_pembeli') {{ $message }} @enderror
    <br />

    Nama Pembeli :
    <input type="text" name="nama" required>
    @error('nama') {{ $message }} @enderror
    <br />

    Jenis Kelamin :
    <select name="jenis_kelamin" required>
        <option value="">Pilih</option>
        <option value="Laki-laki">Laki-laki</option>
        <option value="Perempuan">Perempuan</option>
        <option value="Perempuan">Apel</option>
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
    <input type="date" name="tanggal_lahir" required>
    @error('tgl_lahir') {{ $message }} @enderror
    <br /><br />

    <button type="submit">SAVE</button>
    <a href="{{ route('pembeli.tampilan') }}">Kembali</a>
</form>

