<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index() {
    return view('admin.beranda');
}
    public function profile() {
    return view('admin.profile');
}

}