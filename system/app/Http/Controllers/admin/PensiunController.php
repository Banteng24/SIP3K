<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

class PensiunController extends Controller
{
    public function index() {
    return view('admin.pensiun.index');
}

}