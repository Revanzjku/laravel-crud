<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    //
    public function mahasiswa() {
        $mahasiswa = Mahasiswa::orderBy('nama')->paginate(10);

        return view('orm.mahasiswa', compact('mahasiswa'));
    }

    public function search(Request $request) {
        $search = $request->search;

        $mahasiswa = Mahasiswa::where('nama', 'like', "%$search%")
        ->paginate(10)
        ->appends(['search' => $search]);

        return view('orm.mahasiswa', compact('mahasiswa', 'search'));
    }

    public function tambah() {
        return view('orm.tambah');
    }

    public function store(Request $request) {
        $request->validate([
            'nama' => 'required|min:3',
            'nim' => 'required|numeric',
            'alamat' => 'required'
        ]);

        Mahasiswa::create([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'alamat' => $request->alamat
        ]);

        return redirect('/mahasiswa')->with('success', 'Data Mahasiswa Berhasil Ditambahkan!');
    }
}
