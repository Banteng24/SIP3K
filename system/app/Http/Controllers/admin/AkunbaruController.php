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
    public function create(Request $request){
        $pajak = new Pajak(); // sebaiknya ubah nama $pajak jadi $pajak untuk konsistensi
        $pajak->nama_pegawai = $request->nama;
        $pajak->nip = $request->nip;
        $pajak->opd = $request->opd;

        $pajak->save(); // tambahkan ini untuk menyimpan ke database

        return redirect('user/pajak')->with('success','Dikirim');
    }

}