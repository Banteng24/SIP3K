<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Pajak;

class PajakController extends Controller
{
    public function index(){
        $data = Pajak::get();
        return view('admin.pajak.index', compact('data')); // ✅ fixed
    }

    

}

