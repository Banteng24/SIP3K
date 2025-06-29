<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Akun;
use App\Models\Sintari_pegawai;
use Illuminate\Http\Request;

class AkunbaruController extends Controller
{
    public function index(Request $request)
    {
        // Ambil parameter pencarian NIP saja
        $search = $request->get('search') ?? $request->get('keyword') ?? null;
        
        if (!empty($search)) {
            // Search hanya berdasarkan NIP dengan exact match atau partial match
            $akuns = Sintari_pegawai::where('nip', 'like', "%$search%")
                         ->orderBy('created_at', 'desc')
                         ->get();
        } else {
            // Jika tidak ada pencarian, kirim collection kosong
            $akuns = collect();
        }
        
        return view('admin.akun-baru.index', compact('akuns'));
    }


    function edit($id){
        $akuns = Sintari_pegawai::findOrFail($id);
        return view('admin.akun-baru.tambah', compact('akuns'));
    }
    

    public function submit(Request $request, $id){
        $akuns = Sintari_pegawai::findOrFail($id);
        $akuns->username = $request->username;
        $akuns->nama = $request->nama;
        $akuns->nip = $request->nip;
        $akuns->jabatan = $request->jabatan;
        $akuns->opd = $request->opd;
        $akuns->status = $request->status;
        $akuns->tgl_sk_pengangkatan = $request->tgl_sk_pengangkatan;
        $akuns->tgl_spmt = $request->tgl_spmt;
        $akuns->pendidikan_terakhir = $request->pendidikan_terakhir;
        $akuns->password = $request->password;

        $akuns->save(); // tambahkan ini untuk menyimpan ke database

        return redirect('admin/akun-baru')->with('success','Dikirim');
    }

    public function getPegawaiByNip($nip)
{
    try {
        // Validasi format NIP
        if (strlen($nip) < 18) {
            return response()->json([
                'status' => 'error',
                'message' => 'Format NIP tidak valid. NIP harus 18 digit.'
            ], 400);
        }

        // Cari pegawai berdasarkan NIP
       $akuns = Sintari_pegawai::where('nip', $nip)->first();
    
        if ($akuns) {
            return response()->json([
                'status' => 'success',
                'nama' =>$akuns->nama,
                'nip' =>$akuns->nip
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Pegawai dengan NIP tersebut tidak ditemukan'
            ], 404);
        }
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => 'Terjadi kesalahan sistem: ' . $e->getMessage()
        ], 500);
    }
}

}