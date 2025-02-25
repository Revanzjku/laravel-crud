<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Pegawai</title>
    <style>
        label, button {
            display: block;
        }
    </style>
</head>
<body>
    <h2>Tambah Data Pegawai</h2>

    <a href="/pegawai">Kembali</a>

    <form action="/pegawai/tambah/store" method="post">
        @csrf
        <label for="nama">Masukkan Nama : </label>
        <input type="text" name="nama" id="nama" require>
        <label for="jabatan">Masukkan Jabatan : </label>
        <input type="text" name="jabatan" id="jabatan" require>
        <label for="umur">Umur : </label>
        <input type="number" name="umur" id="umur" require>
        <label for="alamat">Masukkan Alamat : </label>
        <textarea name="alamat" id="alamat" require></textarea>
        <button type="submit">Simpan Data</button>
    </form>
</body>
</html>