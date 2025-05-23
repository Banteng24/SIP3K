<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

class CreateConroller extends Controller
{
    public function index() {
    return view('admin.mutasi.create');
}

}