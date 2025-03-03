<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    @vite(['resources/css/app.css'])
</head>
<body class="p-6 bg-gray-100">
    <div class="container mx-auto">
        @if (session('success'))
            <p class="bg-green-500 text-white p-3 rounded mb-4">{{ session('success') }}</p>
        @endif
        <a href="/mahasiswa/tambah" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 transition">+Tambah Data Mahasiswa</a>
        <div class="mt-4 mb-4">
            <p class="text-lg font-semibold">Cari Data Pegawai : </p>
            <form action="/mahasiswa/search" method="get" class="flex space-x-2">
                <input type="search" name="search" placeholder="Cari Pegawai..." value="{{request('search')}}" class="border border-gray-300 px-4 py-2 rounded focus:outline-none focus:ring focus:ring-blue-300">
                <button type="submit" value="search" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700 transition">Cari</button>
            </form>
        </div>
        <table class="w-full border-collapse border border-gray-300 shadow-lg bg-white rounded">
            <thead class="bg-gray-200 text-gray-700">
                <tr>
                    <th class="border border-gray-300 px-4 py-2">No. Urut</th>
                    <th class="border border-gray-300 px-4 py-2">Nama Mahasiswa</th>
                    <th class="border border-gray-300 px-4 py-2">NIM</th>
                    <th class="border border-gray-300 px-4 py-2">Alamat</th>
                    <th class="border border-gray-300 px-4 py-2">Opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mahasiswa as $mhs)
                    <tr class="{{ $loop->index % 2 == 0 ? 'bg-gray-50' : 'bg-gray-100' }} hover:bg-gray-200 transition">
                        <td class="border border-gray-300 px-4 py-2">{{$mahasiswa->firstItem() + $loop->index}}</td>
                        <td class="border border-gray-300 px-4 py-2">{{$mhs->nama}}</td>
                        <td class="border border-gray-300 px-4 py-2">{{$mhs->nim}}</td>
                        <td class="border border-gray-300 px-4 py-2">{{$mhs->alamat}}</td>
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            <a href="/mahasiswa/edit/{{ $mhs->id }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-700 transition">Edit</a>
                            <a href="/mahasiswa/hapus/{{ $mhs->id }}" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-700 transition" onclick="return confirm('Yakin?')">Hapus</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{$mahasiswa->links('pagination::tailwind')}}
        </div>
    </div>
</body>
</html>