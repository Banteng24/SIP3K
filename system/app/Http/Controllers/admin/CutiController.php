<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Cuti;

class CutiController extends Controller
{
    public function index(){
        $cuti = Cuti::get();
        return view('admin.cuti.index', compact('cuti')); // ✅ fixed
    }


}