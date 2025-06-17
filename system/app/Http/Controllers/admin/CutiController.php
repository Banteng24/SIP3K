<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Cuti;
use App\Models\Sintari_pegawai;

class CutiController extends Controller
{
    public function index(){
        $cuti = Cuti::get();
        return view('admin.cuti.index', compact('cuti')); // ✅ fixed
    }

    public function detail($id)
    {
        $pegawai = Sintari_pegawai::findOrFail($id);
        $cuti = Cuti::findOrFail($id);
        return view('admin.cuti.detail', compact('pegawai', 'cuti'));
    }

    


}