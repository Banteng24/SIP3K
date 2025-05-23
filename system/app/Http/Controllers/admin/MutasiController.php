<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\mutasi;
use Illuminate\Http\Request;

class MutasiController extends Controller
{
    public function index(){
        $mutasi = mutasi::get();
        return view('admin.mutasi.index', compact('mutasi')); // ✅ fixed
    }

    public function create(Request $request){
        $mutasi = new mutasi(); // sebaiknya ubah nama $mutasi jadi $mutasi untuk konsistensi
        $mutasi->nama_pegawai = $request->nama_pegawai;
        $mutasi->nip = $request->nip;
        $mutasi->jabatan = $request->jabatan;
        $mutasi->opd_baru = $request->opd_baru;
        $mutasi->jabatan_baru = $request->jabatan_baru;
        $mutasi->tanggal_sk = $request->tanggal_sk;
        $mutasi->pimpinan_opd = $request->pimpinan_opd;

        $mutasi->save(); // tambahkan ini untuk menyimpan ke database

        return redirect('admin/mutasi')->with('success','Dikirim');
    }


}