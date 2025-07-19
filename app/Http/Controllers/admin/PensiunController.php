<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\pensiun;
use App\Models\Sintari_pegawai;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PensiunController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search') ?? $request->get('keyword') ?? null;
        $status = $request->get('status'); // Parameter filter status
        
        $query = Sintari_pegawai::query();
        
        // Filter berdasarkan pencarian
        if (!empty($search)) {
            $query->where(function($q) use ($search) {
                $q->where('nip', 'like', "%$search%")
                  ->orWhere('nama', 'like', "%$search%")
                  ->orWhere('opd', 'like', "%$search%");
            });
        }
        
        $pensiun = $query->orderBy('created_at', 'desc')->get();
        
        // Filter berdasarkan status pensiun (setelah data diambil)
        if ($status === 'sudah_pensiun') {
            // Pegawai yang sudah berumur 60 tahun atau lebih
            $pensiun = $pensiun->filter(function($pegawai) {
                if ($pegawai->tanggal_lahir) {
                    $umur = \Carbon\Carbon::parse($pegawai->tanggal_lahir)->age;
                    return $umur >= 60;
                }
                return false;
            });
        } elseif ($status === 'belum_pensiun') {
            // Pegawai yang belum berumur 60 tahun
            $pensiun = $pensiun->filter(function($pegawai) {
                if ($pegawai->tanggal_lahir) {
                    $umur = \Carbon\Carbon::parse($pegawai->tanggal_lahir)->age;
                    return $umur < 60;
                }
                return true; // Jika tidak ada tanggal lahir, anggap belum pensiun
            });
        }
        // Jika status kosong atau 'semua', tampilkan semua
        
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
        try {
            $pensiun = Sintari_pegawai::findOrFail($id);
            
            // Update data pegawai
            $pensiun->nama = $request->nama_pegawai;
            $pensiun->nip = $request->nip;
            $pensiun->jabatan = $request->jabatan;
            $pensiun->opd = $request->opd;
            $pensiun->tmt_pensiun = $request->tmt_pensiun;
            
            // Set status pensiun dari form atau tentukan otomatis
            if (!empty($request->status_pensiun)) {
                $pensiun->status_pensiun = strtolower(trim($request->status_pensiun));
            } else {
                // Tentukan otomatis berdasarkan umur
                $umur = $pensiun->tanggal_lahir ? 
                       \Carbon\Carbon::parse($pensiun->tanggal_lahir)->age : 0;
                $pensiun->status_pensiun = $umur >= 60 ? 'pensiun' : 'aktif';
            }
            
            // Update kolom status jika ada (untuk backward compatibility)
            if ($pensiun->status_pensiun === 'pensiun') {
                $pensiun->status = 'Sudah Pensiun';
            } elseif ($pensiun->status_pensiun === 'aktif') {
                $pensiun->status = 'Belum Pensiun';
            }
            
            // Simpan perubahan
            $pensiun->save(); // Gunakan save() instead of update()
            
            return redirect('admin/pensiun')
                ->with('success', 'Status Pensiun berhasil diperbarui untuk ' . $pensiun->nama . '! 📄✅');
                
        } catch (\Exception $e) {
            return redirect('admin/pensiun')
                ->with('error', 'Gagal memperbarui status: ' . $e->getMessage());
        }
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

    public function exportPDF($id)
    {
        $pegawai = Sintari_pegawai::findOrFail($id);

        $pdf = Pdf::loadView('admin.pensiun.pdf', compact('pegawai'))->setPaper('A4', 'portrait');
        return $pdf->stream('data-pegawai-' . $pegawai->nama . '.pdf');
    }
}