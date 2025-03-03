<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PegawaiController extends Controller
{
    //
    public function pegawai() {
        $pegawai = DB::table('pegawai')->orderBy('pegawai_umur')->paginate(10);
        return view('query_builder.pegawai', compact('pegawai'));
    }

    public function search(Request $request) {
        $search = $request->search;

        $pegawai = DB::table('pegawai')
        ->where('pegawai_nama', 'like', "%$search%")
        ->paginate(10)
        ->appends(['search' => $search]);

        return view('query_builder.pegawai', compact('pegawai', 'search'));
    }

    public function tambah() {
        return view('query_builder.tambah');
    }

    public function store(Request $request) {
        $request->validate([
            'nama' => 'required|min:3',
            'jabatan' => 'required',
            'umur' => 'required|numeric|min:17',
            'alamat' => 'required'
        ], [
            'nama.required' => 'Nama tidak boleh kosong!',
            'nama.min' => 'Nama minimal 3 huruf!',
            'jabatan.required' => 'Posisi jabatan tidak boleh kosong!',
            'umur.required' => 'Umur tidak boleh kosong!',
            'umur.numeric' => 'Umur harus berupa angka!',
            'umur.min' => 'Belum cukup umur!',
            'alamat.required' => 'Alamat tidak boleh kosong!'
        ]);

        DB::table('pegawai')->insert([
            'pegawai_nama'=>$request->nama,
            'pegawai_jabatan'=>$request->jabatan,
            'pegawai_umur'=>$request->umur,
            'pegawai_alamat'=>$request->alamat
        ]);

        return redirect('/pegawai')->with('success', 'Data Pegawai Berhasil Ditambahkan!');
    }

    public function edit($id) {
        $pegawai = DB::table('pegawai')->where('pegawai_id', $id)->get();

        return view('query_builder.edit', compact('pegawai'));
    }

    public function update(Request $request) {
        $request->validate([
            'nama' => 'required|min:3',
            'jabatan' => 'required',
            'umur' => 'required|numeric|min:17',
            'alamat' => 'required'
        ], [
            'nama.required' => 'Nama tidak boleh kosong!',
            'nama.min' => 'Nama minimal 3 huruf!',
            'jabatan.required' => 'Posisi jabatan tidak boleh kosong!',
            'umur.required' => 'Umur tidak boleh kosong!',
            'umur.numeric' => 'Umur harus berupa angka!',
            'umur.min' => 'Belum cukup umur!',
            'alamat.required' => 'Alamat tidak boleh kosong!'
        ]);

        DB::table('pegawai')->where('pegawai_id', $request->id)->update([
            'pegawai_nama'=>$request->nama,
            'pegawai_jabatan'=>$request->jabatan,
            'pegawai_umur'=>$request->umur,
            'pegawai_alamat'=>$request->alamat
        ]);

        return redirect('/pegawai')->with('success', 'Data Pegawai Berhasil Diperbarui');
    }

    public function hapus($id) {
        DB::table('pegawai')->where('pegawai_id', $id)->delete();

        return redirect('/pegawai');
    }
}
