<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Akun;
use Illuminate\Http\Request;

class AkunbaruController extends Controller
{
    public function index(){
        $akuns = Akun::get();
        return view('admin.akun-baru.index', compact('akuns')); // ✅ fixed
    }

    public function tambah() {
        return view('admin.akun-baru.tambah');
    }
    

    public function submit(Request $request){
        $akuns = new Akun(); // sebaiknya ubah nama $akuns jadi $akuns untuk konsistensi
        $akuns->username = $request->username;
        $akuns->nama = $request->nama;
        $akuns->nip = $request->nip;
        $akuns->jabatan = $request->jabatan;
        $akuns->opd = $request->opd;
        $akuns->status = $request->status;
        $akuns->tgl_sk_pengangkatan = $request->tgl_sk_pengangkatan;
        $akuns->tgl_spmt = $request->tgl_spmt;
        $akuns->pendidikan_terakhir = $request->pendidikan_terakhir;
        $akuns->password = $request->password;

        $akuns->save(); // tambahkan ini untuk menyimpan ke database

        return redirect('admin/akun-baru')->with('success','Dikirim');
    }

}