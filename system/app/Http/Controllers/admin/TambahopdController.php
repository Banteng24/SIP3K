<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

// class TambahopdController extends Controller
// {
//     public function index(){
//         $tambah = User::get();
//         return view('admin.tambah-opd.index', compact('tambah')); // ✅ fixed
//     }

//     public function create() {
//         return view('admin.tambah-opd.tambah');
//     }

//     public function submit(Request $request){
//         $tambah = new User();
//         $tambah->nama_opd = $request->nama_opd;
//         $tambah->email = $request->email;
//         $tambah->password = Hash::make($request->password); // hash password dulu
    
//         $tambah->save();
    
//         return redirect('admin/tambah-opd')->with('success','Dikirim');
//     }
    

// }