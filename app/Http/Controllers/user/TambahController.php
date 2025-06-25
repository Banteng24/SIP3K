<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;

class TambahController extends Controller
{
    public function index() {
    return view('user.pajak.tambah');
}

}