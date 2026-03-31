<form method="POST" action="{{ route('suplier.update', $sup->id_suplier) }}">
    @csrf
    @method('PUT')
    ID Suplier :
    <input type="text" name="id_suplier" required readonly value="{{ old('id_suplier', $sup->id_suplier) }}">
    <br />

    Nama Suplier :
    <input type="text" name="nama" required value="{{ old('nama', $sup->nama) }}">
    <br />

    Alamat Suplier :
    <textarea name="alamat" required>{{ old('alamat', $sup->alamat) }}</textarea>
    <br />

    Kode Pos :
    <input type="text" name="kode_pos" required value="{{ old('kode_pos', $sup->kode_pos) }}">
    <br />

    Kota :
    <input type="text" name="kota" required value="{{ old('kota', $sup->kota) }}">
    <br /><br />

    <button type="submit">SAVE</button>
    <a href="{{ route('suplier.tampil') }}">Kembali</a>
</form>
