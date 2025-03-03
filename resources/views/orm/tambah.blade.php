<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
    @vite(['resources/css/app.css'])
</head>
<body class="p-6 bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-lg bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold mb-4 text-center">Tambah Data Mahasiswa</h2>

        <a href="/pegawai" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700 transition inline-block mb-4">←Kembali</a>

        <form action="/mahasiswa/tambah/store" method="post" class="space-y-4">
            @csrf
            <div>
                <label for="nama" class="block font-medium">Masukkan Nama : </label>
                <input type="text" name="nama" id="nama" class="w-full mt-1 p-2 border border-gray-300 rounded focus:ring focus:ring-blue-300">
                @error('nama')
                    <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                @enderror
            </div>
            <div>
                <label for="nim" class="block font-medium">Masukkan Nim : </label>
                <input type="number" name="nim" id="nim" class="w-full mt-1 p-2 border border-gray-300 rounded focus:ring focus:ring-blue-300">
                @error('nim')
                    <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                @enderror
            </div>
            <div>
                <label for="alamat" class="block font-medium">Masukkan Alamat : </label>
                <textarea name="alamat" id="alamat" class="w-full mt-1 p-2 border border-gray-300 rounded focus:ring focus:ring-blue-300"></textarea>
                @error('alamat')
                    <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                @enderror
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white p-3 rounded hover:bg-blue-700 transition">Simpan Data</button>
        </form>
    </div>
</body>
</html>