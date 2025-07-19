<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Cuti;
use App\Models\Sintari_pegawai;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $totalmutasi = Sintari_pegawai::whereNotNull('opd_baru')->count();


        $totalcuti = Cuti::where('status', 'BERHASIL')->count();

        $totalpajak = Sintari_pegawai::whereNotNull( 'file')->count();

        return view('admin.beranda', compact('totalmutasi', 'totalcuti', 'totalpajak'));
    }
    public function profile() {
    return view('admin.profile');
}

}