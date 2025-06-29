<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Pajak;
use App\Models\Sintari_pegawai;

class PajakController extends Controller
{
    public function index(){
        $datas = Sintari_pegawai::get();
        return view('admin.pajak.index', compact('datas')); // ✅ fixed
    }

    public function detail($id)
    {
        $pegawai = Sintari_pegawai::findOrFail($id);
        return view('admin.pajak.detail', compact('pegawai'));
    }

    

}

