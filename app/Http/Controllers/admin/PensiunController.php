<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\pensiun;
use App\Models\Sintari_pegawai;
use Illuminate\Http\Request;
class PensiunController extends Controller
{
    public function index(Request $request)
    {
        // Ambil parameter pencarian NIP saja
        $search = $request->get('search') ?? $request->get('keyword') ?? null;
        
        if (!empty($search)) {
            // Search hanya berdasarkan NIP dengan exact match atau partial match
            $pensiun = Sintari_pegawai::where('nip', 'like', "%$search%")
                         ->orderBy('created_at', 'desc')
                         ->get();
        } else {
            // Jika tidak ada pencarian, kirim collection kosong
            $pensiun = collect();
            $pensiun = Sintari_pegawai::get();
        }
        
        return view('admin.pensiun.index', compact('pensiun'));
    }

    function edit($id){
        $pensiun = Sintari_pegawai::findOrFail($id);
        return view('admin.pensiun.edit', compact('pensiun'));
    }
    function tambah($id){
        $pensiun = Sintari_pegawai::findOrFail($id);
        return view('admin.pensiun.edit', compact('pensiun'));
    }

    public function submit(Request $request, $id)
    {
        $pensiun = Sintari_pegawai::findOrFail($id);
        $pensiun->nama = $request->nama_pegawai;
        $pensiun->nip = $request->nip;
        $pensiun->jabatan = $request->jabatan;
        $pensiun->opd = $request->opd;
        $pensiun->tmt_pensiun = $request->tmt_pensiun;
        $pensiun->update();
    
        return redirect('admin/pensiun')
            ->with('success', 'Status Pensiun Berhasil ditambahkan ' . $pensiun->nama_pegawai . '! 📄✅');
    }
    public function update(Request $request, $id)
    {
        $pensiun = Sintari_pegawai::findOrFail($id);
        $pensiun->nama = $request->nama_pegawai;
        $pensiun->nip = $request->nip;
        $pensiun->jabatan = $request->jabatan;
        $pensiun->opd = $request->opd;
        $pensiun->tmt_pensiun = $request->tmt_pensiun;
        $pensiun->update();
    
        return redirect('admin/pensiun')
            ->with('success', 'Status Pensiun Berhasil Diubah ' . $pensiun->nama_pegawai . '! 📄✅');
    }
    public function show($id)
    {
        $pensiun = Sintari_pegawai::findOrFail($id);
        return view('admin.pensiun.show', compact('pensiun'));
    }

 
}