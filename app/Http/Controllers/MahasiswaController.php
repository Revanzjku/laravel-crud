<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    //
    public function mahasiswa() {
        $mahasiswa = Mahasiswa::paginate(10);

        return view('orm.mahasiswa', compact('mahasiswa'));
    }
}
