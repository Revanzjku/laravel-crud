<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pegawai</title>
    <style>
        label {
            display: block;
        }
        table {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <a href="/pegawai/tambah">+Tambah Data Pegawai</a>
    @php($i = 1)
    <table border="1" cellspacing="0" cellpadding="10">
        <thead>
            <th>No. Urut</th>
            <th>Nama Pegawai</th>
            <th>Jabatan</th>
            <th>Umur</th>
            <th>Alamat</th>
            <th>Opsi</th>
        </thead>
        <tbody>
            @foreach($pegawai as $p)
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$p->pegawai_nama}}</td>
                    <td>{{$p->pegawai_jabatan}}</td>
                    <td>{{$p->pegawai_umur}}</td>
                    <td>{{$p->pegawai_alamat}}</td>
                    <td>
                        <a href="/pegawai/edit/{{ $p->pegawai_id }}">Edit</a>
                        |
                        <a href="/pegawai/hapus/{{ $p->pegawai_id }}" onclick="return confirm('Yakin?')">Hapus</a>
                    </td>
                </tr>
                @php($i++)
            @endforeach
        </tbody>
    </table>

    <label>Halaman : {{$pegawai->currentPage()}}</label>
    <label>Jumlah Data : {{$pegawai->total()}}</label>
    <label>Data Per Halaman : {{$pegawai->perPage()}}</label>

    {{$pegawai->links()}}
</body>
</html>