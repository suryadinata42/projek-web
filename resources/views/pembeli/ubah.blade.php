<form method="POST" action="{{ route('pembeli.update', $pembeli->id) }}">
    @csrf
    @method('PUT')
    ID Pembeli :
    <input type="text" name="id_pembeli" required readonly value="{{ old('id_pembeli', $pembeli->id_pembeli) }}">
    <br>
    Nama Pembeli :
    <input type="text" name="nama" required value="{{ old('nama', $pembeli->nama) }}">
    <br>
    Jenis Kelamin :
    <select name="jenis_kelamin" required>
       <option value="">Pilih</option>
        <option value="Laki-laki" {{ $pembeli->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
        <option value="Perempuan" {{ $pembeli->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
    </select>
    <br>

    Alamat :
    <textarea name="alamat">{{ $pembeli->alamat }}</textarea>
    <br>
    Kode Pos :
    <input type="text" name="kode_pos" required value="{{ old('kode_pos', $pembeli->kode_pos) }}">
    <br>
    Tanggal Lahir :
    <input type="date" name="tanggal_lahir" required value="{{ old('tanggal_lahir', $pembeli->tanggal_lahir) }}">
    <br>

    <button type="submit">SAVE</button>
    <a href="{{ route('pembeli.tampilan') }}">Kembali</a>
</form>
