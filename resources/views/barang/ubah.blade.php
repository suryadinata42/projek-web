<form method="POST" action="{{ route('barang.update', $barang->id) }}">
    <!-- @csrf -->
    @method('PUT')
    ID Barang :
    <input type="text" name="id_barang" required readonly value="{{ old('id_barang', $barang->id_barang) }}">
    <br>
    Nama Barang :
    <input type="text" name="nama" required value="{{ old('nama', $barang->nama) }}">
    <br>
    Varian Barang :
    <select name="varian" required>
        <option value="">Pilih</option>
        <option value="Baru" {{ $barang->varian == 'Baru' ? 'selected' : '' }}>Baru</option>
        <option value="Bekas" {{ $barang->varian == 'Bekas' ? 'selected' : '' }}>Bekas</option>
    </select>
    <br>
    Harga Beli :
    <input type="number" name="harga_beli" required value="{{ old('harga_beli', $barang->harga_beli) }}">
    <br>
    Harga Jual :
    <input type="number" name="harga_jual" required value="{{ old('harga_jual', $barang->harga_jual) }}">
    <br>
    <button type="submit">SAVE</button>
    <a href="{{ route('barang.tampilkan') }}">Kembali</a>
</form>
