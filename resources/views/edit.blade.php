<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Pegawai</title>
    <style>
        label, button {
            display: block;
        }
    </style>
</head>
<body>
    <h2>Tambah Data Pegawai</h2>

    <a href="/pegawai">Kembali</a>

    @foreach($pegawai as $p)
    <form action="/pegawai/update" method="post">
        @csrf
        <input type="hidden" name="id"value="{{$p->pegawai_id}}">
        <label for="nama">Masukkan Nama : </label>
        <input type="text" name="nama" id="nama" require value="{{$p->pegawai_nama}}">
        <label for="jabatan">Masukkan Jabatan : </label>
        <input type="text" name="jabatan" id="jabatan" require value="{{$p->pegawai_jabatan}}">
        <label for="umur">Umur : </label>
        <input type="number" name="umur" id="umur" require value="{{$p->pegawai_umur}}">
        <label for="alamat">Masukkan Alamat : </label>
        <textarea name="alamat" id="alamat" require>{{$p->pegawai_alamat}}</textarea>
        <button type="submit">Simpan Data</button>
    </form>
    @endforeach
</body>
</html>