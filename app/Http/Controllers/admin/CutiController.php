<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Cuti;
use App\Models\Sintari_pegawai;
use Barryvdh\DomPDF\Facade\Pdf;

class CutiController extends Controller
{
    public function index(){
        $cuti = Cuti::get();
        return view('admin.cuti.index', compact('cuti')); // ✅ fixed
    }

    public function detail($id)
    {
        $pegawai = Sintari_pegawai::findOrFail($id);
        $cuti = Cuti::findOrFail($id);
        return view('admin.cuti.detail', compact('pegawai', 'cuti'));
    }

        public function exportPDF($id)
    {
        $pegawai = Sintari_pegawai::findOrFail($id);
        $cuti = Cuti::findOrFail($id);

        $pdf = Pdf::loadView('admin.cuti.pdf', compact('pegawai', 'cuti'))->setPaper('A4', 'portrait');
        return $pdf->stream('data-pegawai-' . $pegawai->nama . '.pdf');
    }

    


}