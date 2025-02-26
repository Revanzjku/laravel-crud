<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PegawaiController extends Controller
{
    //
    public function pegawai() {
        $pegawai = DB::table('pegawai')->orderBy('pegawai_umur')->paginate(10);
        return view('pegawai', compact('pegawai'));
    }

    public function search(Request $request) {
        $search = $request->search;

        $pegawai = DB::table('pegawai')
        ->where('pegawai_nama', 'like', "%$search%")
        ->paginate(10)
        ->appends(['search' => $search]);

        return view('pegawai', compact('pegawai', 'search'));
    }

    public function tambah() {
        return view('tambah');
    }

    public function store(Request $request) {
        DB::table('pegawai')->insert([
            'pegawai_nama'=>$request->nama,
            'pegawai_jabatan'=>$request->jabatan,
            'pegawai_umur'=>$request->umur,
            'pegawai_alamat'=>$request->alamat
        ]);

        return redirect('/pegawai');
    }

    public function edit($id) {
        $pegawai = DB::table('pegawai')->where('pegawai_id', $id)->get();

        return view('edit', compact('pegawai'));
    }

    public function update(Request $request) {
        DB::table('pegawai')->where('pegawai_id', $request->id)->update([
            'pegawai_nama'=>$request->nama,
            'pegawai_jabatan'=>$request->jabatan,
            'pegawai_umur'=>$request->umur,
            'pegawai_alamat'=>$request->alamat
        ]);

        return redirect('/pegawai');
    }

    public function hapus($id) {
        DB::table('pegawai')->where('pegawai_id', $id)->delete();

        return redirect('/pegawai');
    }
}
