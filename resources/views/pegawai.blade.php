<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pegawai</title>
    @vite(['resources/css/app.css'])
</head>
<body class="p-6 bg-gray-100">
    <div class="container mx-auto">
        <a href="/pegawai/tambah" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 transition">+Tambah Data Pegawai</a>
        <div class="mt-4 mb-4">
            <p class="text-lg font-semibold">Cari Data Pegawai : </p>
            <form action="/pegawai/search" method="get" class="flex space-x-2">
                <input type="search" name="search" placeholder="Cari Pegawai..." value="{{request('search')}}" class="border border-gray-300 px-4 py-2 rounded focus:outline-none focus:ring focus:ring-blue-300">
                <button type="submit" value="search" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700 transition">Cari</button>
            </form>
        </div>
        <table class="w-full border-collapse border border-gray-300 shadow-lg bg-white rounded">
            <thead class="bg-gray-200 text-gray-700">
                <tr>
                    <th class="border border-gray-300 px-4 py-2">No. Urut</th>
                    <th class="border border-gray-300 px-4 py-2">Nama Pegawai</th>
                    <th class="border border-gray-300 px-4 py-2">Jabatan</th>
                    <th class="border border-gray-300 px-4 py-2">Umur</th>
                    <th class="border border-gray-300 px-4 py-2">Alamat</th>
                    <th class="border border-gray-300 px-4 py-2">Opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pegawai as $p)
                    <tr class="{{ $loop->index % 2 == 0 ? 'bg-gray-50' : 'bg-gray-100' }} hover:bg-gray-200 transition">
                        <td class="border border-gray-300 px-4 py-2">{{$pegawai->firstItem() + $loop->index}}</td>
                        <td class="border border-gray-300 px-4 py-2">{{$p->pegawai_nama}}</td>
                        <td class="border border-gray-300 px-4 py-2">{{$p->pegawai_jabatan}}</td>
                        <td class="border border-gray-300 px-4 py-2">{{$p->pegawai_umur}}</td>
                        <td class="border border-gray-300 px-4 py-2">{{$p->pegawai_alamat}}</td>
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            <a href="/pegawai/edit/{{ $p->pegawai_id }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-700 transition">Edit</a>
                            <a href="/pegawai/hapus/{{ $p->pegawai_id }}" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-700 transition" onclick="return confirm('Yakin?')">Hapus</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{$pegawai->links('pagination::tailwind')}}
        </div>
    </div>
</body>
</html>