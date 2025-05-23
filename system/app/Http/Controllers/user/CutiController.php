<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use App\Models\Cuti;
use Illuminate\Http\Request;
class CutiController extends Controller
{
    public function index(){
        $cuti = Cuti::get();
        return view('user.cuti.index', compact('cuti')); // ✅ fixed
    }

    public function create_cuti(){
        return view('user.cuti.create');
    }
    public function submit_cuti(Request $request){
        $cuti = new Cuti();
        $cuti->nip = $request->nip;
        $cuti->nama_pegawai = $request->nama_pegawai;
        $cuti->nomor_surat = $request->nomor_surat;
        $cuti->tanggal_surat = $request->tanggal_surat;
        $cuti->tanggal_mulai = $request->tanggal_mulai;
        $cuti->tanggal_selesai = $request->tanggal_selesai;
        $cuti->alasan_cuti = $request->alasan_cuti;
        $cuti->jumlah_hari = $request->jumlah_hari;
    
        if ($request->hasFile('file_pendukung')) {
            $file = $request->file('file_pendukung');
            $namaFile = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
            $file->move(public_path('uploads/file_pendukung'), $namaFile);
            $cuti->file_pendukung = 'file_pendukung/' . $namaFile;
        }
    
        $cuti->save();
    
        return redirect('user/cuti')->with('success', 'Pengajuan cuti berhasil disimpan.');
    }
}
    
