<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Tambah;
use Illuminate\Http\Request;

class TambahopdController extends Controller
{
    public function index(){
        $tambah = Tambah::get();
        return view('admin.tambah-opd.index', compact('tambah')); // ✅ fixed
    }

    public function create() {
        return view('admin.tambah-opd.tambah');
    }

    public function submit(Request $request){
        $tambah = new Tambah(); // sebaiknya ubah nama $tambah jadi $tambah untuk konsistensi
        $tambah->nama_opd = $request->nama_opd;
        $tambah->email = $request->email;
        $tambah->password = $request->password;

        $tambah->save(); // tambahkan ini untuk menyimpan ke database

        return redirect('admin/tambah-opd')->with('success','Dikirim');
    }

}