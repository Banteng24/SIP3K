<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\mutasi;
use App\Models\Sintari_pegawai;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class MutasiController extends Controller
{
    public function index(Request $request)
    {
        // Ambil parameter pencarian NIP saja
        $search = $request->get('search') ?? $request->get('keyword') ?? null;
        
        if (!empty($search)) {
            // Search hanya berdasarkan NIP dengan exact match atau partial match
            $mutasi = Sintari_pegawai::where('nip', 'like', "%$search%")
                         ->orderBy('created_at', 'desc')
                         ->get();
        } else {
            // Jika tidak ada pencarian, kirim collection kosong
            $mutasi = collect();
            $mutasi = Sintari_pegawai::get();
        }
        
        return view('admin.mutasi.index', compact('mutasi'));
    }

    // public function create(Request $request){
    //     $mutasi = new mutasi(); // sebaiknya ubah nama $mutasi jadi $mutasi untuk konsistensi
    //     $mutasi->nama_pegawai = $request->nama_pegawai;
    //     $mutasi->nip = $request->nip;
    //     $mutasi->opd_lama = $request->opd_lama;
    //     $mutasi->jabatan = $request->jabatan;
    //     $mutasi->opd_baru = $request->opd_baru;
    //     $mutasi->jabatan_baru = $request->jabatan_baru;
    //     $mutasi->tanggal_sk = $request->tanggal_sk;
    //     $mutasi->pimpinan_opd = $request->pimpinan_opd;

    //     $mutasi->save(); // tambahkan ini untuk menyimpan ke database

    //     return redirect('admin/mutasi')->with('success','Dikirim');
    // }
    function tambah($id){
        $mutasi = Sintari_pegawai::findOrFail($id);
        return view('admin.mutasi.tambah', compact('mutasi'));
    }
    function edit($id){
        $mutasi = Sintari_pegawai::findOrFail($id);
        return view('admin.mutasi.edit', compact('mutasi'));
    }

    public function submit(Request $request, $id)
    {
        $mutasi = Sintari_pegawai::findOrFail($id);
        $mutasi->nama = $request->nama_pegawai;
        $mutasi->nip = $request->nip;
        $mutasi->opd = $request->opd_lama;
        $mutasi->jabatan = $request->jabatan;   
        $mutasi->opd_baru = $request->opd_baru;
        $mutasi->jabatan = $request->jabatan_baru;
        $mutasi->pegawai_tgl_sk = $request->pegawai_tgl_sk;
        // $mutasi->pimpinan_opd = $request->pimpinan_opd;
        $mutasi->update();
    
        return redirect('admin/mutasi')
            ->with('success', 'mutasi berhasil ditambahkan untuk ' . $mutasi->nama . '! 📄✅');
    }
    public function update(Request $request, $id)
    {
        $mutasi = Sintari_pegawai::findOrFail($id);
        $mutasi->nama = $request->nama_pegawai;
        $mutasi->nip = $request->nip;
        $mutasi->opd = $request->opd_lama;
        $mutasi->jabatan = $request->jabatan;   
        $mutasi->opd_baru = $request->opd_baru;
        $mutasi->jabatan = $request->jabatan_baru;
        $mutasi->pegawai_tgl_sk = $request->pegawai_tgl_sk;
        // $mutasi->pimpinan_opd = $request->pimpinan_opd;
        $mutasi->update();
    
        return redirect('admin/mutasi')
            ->with('success', 'mutasi berhasil diperbarui untuk ' . $mutasi->nama . '! 📄✅');
    }

    public function cari(Request $request)
    {
        $keyword = $request->keyword;
        return redirect()->route('admin.mutasi.index', ['search' => $keyword]);
    }

    // API untuk autocomplete NIP
    public function autocomplete(Request $request)
    {
        $search = $request->get('query');
        
        $data = mutasi::where('nip', 'like', "%$search%")
                    ->select('nip', 'nama')
                    ->distinct()
                    ->limit(20)
                    ->get();
        
        return response()->json($data);
    }

    public function show($id)
    {
        $mutasi = Sintari_pegawai::findOrFail($id);
        return view('admin.mutasi.show', compact('mutasi'));
    }

    public function exportPDF($id)
    {
        $pegawai = Sintari_pegawai::findOrFail($id);

        $pdf = Pdf::loadView('admin.mutasi.pdf', compact('pegawai'))->setPaper('A4', 'portrait');
        return $pdf->stream('data-pegawai-' . $pegawai->nama . '.pdf');
    }



}