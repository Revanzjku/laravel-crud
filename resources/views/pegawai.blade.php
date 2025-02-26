<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pegawai</title>
    <style type="text/css">
		.pagination li{
			float: left;
			list-style-type: none;
			margin:5px;
		}
	</style>
</head>
<body>
    <a href="/pegawai/tambah">+Tambah Data Pegawai</a>
    <p>Cari Data Pegawai : </p>
    <form action="/pegawai/search" method="get">
        <input type="search" name="search" placeholder="Cari Pegawai..." value="{{request('search')}}">
        <button type="submit" value="search">Cari</button>
    </form>
    <br>
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
                    <td>{{$pegawai->firstItem() + $loop->index}}</td>
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
            @endforeach
        </tbody>
    </table>

    {{$pegawai->links()}}
</body>
</html>