<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;

class BerandaController extends Controller
{
    public function index() {
    return view('user.beranda');
}

}