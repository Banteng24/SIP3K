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
        $mutasi->opd_lama = $request->opd_lama;
        $mutasi->jabatan = $request->jabatan;
        $mutasi->opd_baru = $request->opd_baru;
        $mutasi->jabatan_baru = $request->jabatan_baru;
        $mutasi->tanggal_sk = $request->tanggal_sk;
        $mutasi->pimpinan_opd = $request->pimpinan_opd;

        $mutasi->save(); // tambahkan ini untuk menyimpan ke database

        return redirect('admin/mutasi')->with('success','Dikirim');
    }

    function edit($id){
        $mutasi = mutasi::findOrFail($id);
        return view('admin.mutasi.edit', compact('mutasi'));
    }

    public function update(Request $request, $id){
        $mutasi = Mutasi::findOrFail($id);
        $mutasi->nama_pegawai = $request->nama_pegawai;
        $mutasi->nip = $request->nip;
        $mutasi->opd_lama = $request->opd_lama;
        $mutasi->jabatan = $request->jabatan;
        $mutasi->opd_baru = $request->opd_baru;
        $mutasi->jabatan_baru = $request->jabatan_baru;
        $mutasi->tanggal_sk = $request->tanggal_sk;
        $mutasi->pimpinan_opd = $request->pimpinan_opd;
        $mutasi->update();

    return redirect('admin/mutasi');
    }



}