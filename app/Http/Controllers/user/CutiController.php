<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use App\Models\Cuti;
use App\Models\Sintari_pegawai;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
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
    public function submit_cuti(Request $request): RedirectResponse
    {
        // Validasi input
        $request->validate([
            'nip' => 'required',
            'nama_pegawai' => 'required',
            'nomor_surat' => 'required',
            'tanggal_surat' => 'required|date',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'alasan_cuti' => 'required',
            'jumlah_hari' => 'required|integer|min:1',
            'file_pendukung' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048'
        ], [
            'nip.required' => 'NIP wajib diisi.',
            'nama_pegawai.required' => 'Nama pegawai wajib diisi.',
            'nomor_surat.required' => 'Nomor surat wajib diisi.',
            'tanggal_surat.required' => 'Tanggal surat wajib diisi.',
            'tanggal_surat.date' => 'Tanggal surat tidak valid.',
            'tanggal_mulai.required' => 'Tanggal mulai cuti wajib diisi.',
            'tanggal_mulai.date' => 'Tanggal mulai cuti tidak valid.',
            'tanggal_selesai.required' => 'Tanggal selesai cuti wajib diisi.',
            'tanggal_selesai.date' => 'Tanggal selesai cuti tidak valid.',
            'tanggal_selesai.after_or_equal' => 'Tanggal selesai tidak boleh lebih awal dari tanggal mulai.',
            'alasan_cuti.required' => 'Alasan cuti wajib dipilih.',
            'jumlah_hari.required' => 'Jumlah hari cuti wajib diisi.',
            'jumlah_hari.integer' => 'Jumlah hari cuti harus berupa angka.',
            'jumlah_hari.min' => 'Jumlah hari cuti minimal 1 hari.',
            'file_pendukung.file' => 'File pendukung harus berupa file.',
            'file_pendukung.mimes' => 'Format file harus PDF, DOC, DOCX, JPG, JPEG, atau PNG.',
            'file_pendukung.max' => 'Ukuran file pendukung maksimal 2MB.',
        ]);
        

        // Hitung jumlah hari cuti berdasarkan tanggal
        $tanggal_mulai = Carbon::parse($request->tanggal_mulai);
        $tanggal_selesai = Carbon::parse($request->tanggal_selesai);
        $jumlah_hari_calculated = $tanggal_mulai->diffInDays($tanggal_selesai) + 1;

        // Validasi apakah jumlah hari yang diinput sesuai dengan perhitungan
        if ($request->jumlah_hari != $jumlah_hari_calculated) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['jumlah_hari' => 'Jumlah hari tidak sesuai dengan rentang tanggal yang dipilih. Seharusnya: ' . $jumlah_hari_calculated . ' hari']);
        }

        // Cek kuota cuti tahunan untuk NIP tersebut
        $tahun_cuti = $tanggal_mulai->year;
        $total_cuti_tahun_ini = Cuti::where('nip', $request->nip)
            ->whereYear('tanggal_mulai', $tahun_cuti)
            ->where('alasan_cuti', 'CUTI TAHUNAN')
            ->where('status', '!=', 'DITOLAK') // Tidak hitung yang ditolak
            ->sum('jumlah_hari');

        // Validasi kuota cuti tahunan (maksimal 12 hari per tahun)
        if ($request->alasan_cuti == 'CUTI TAHUNAN') {
            $sisa_kuota = 12 - $total_cuti_tahun_ini;
            
            if ($request->jumlah_hari > $sisa_kuota) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors([
                        'jumlah_hari' => "Kuota cuti tahunan tidak mencukupi. Sisa kuota Anda untuk tahun {$tahun_cuti}: {$sisa_kuota} hari. Anda mengajukan: {$request->jumlah_hari} hari."
                    ]);
            }
        }

        // Cek apakah ada cuti yang bertabrakan tanggal
        $cuti_bentrok = Cuti::where('nip', $request->nip)
            ->where('status', '!=', 'DITOLAK')
            ->where(function($query) use ($tanggal_mulai, $tanggal_selesai) {
                $query->whereBetween('tanggal_mulai', [$tanggal_mulai, $tanggal_selesai])
                      ->orWhereBetween('tanggal_selesai', [$tanggal_mulai, $tanggal_selesai])
                      ->orWhere(function($q) use ($tanggal_mulai, $tanggal_selesai) {
                          $q->where('tanggal_mulai', '<=', $tanggal_mulai)
                            ->where('tanggal_selesai', '>=', $tanggal_selesai);
                      });
            })
            ->exists();

        if ($cuti_bentrok) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['tanggal_mulai' => 'Terdapat cuti lain yang bertabrakan dengan tanggal yang Anda pilih.']);
        }

        // Simpan data cuti
        $cuti = new Cuti();
        $cuti->nip = $request->nip;
        $cuti->nama_pegawai = $request->nama_pegawai;
        $cuti->nomor_surat = $request->nomor_surat;
        $cuti->tanggal_surat = $request->tanggal_surat;
        $cuti->tanggal_mulai = $request->tanggal_mulai;
        $cuti->tanggal_selesai = $request->tanggal_selesai;
        $cuti->alasan_cuti = $request->alasan_cuti;
        $cuti->jumlah_hari = $request->jumlah_hari;
        $cuti->status = 'Berhasil'; // Default status
        
        // Handle file upload
        if ($request->hasFile('file_pendukung')) {
            $file = $request->file('file_pendukung');
            $filename = time() . '_' . preg_replace('/[^A-Za-z0-9\-\.]/', '', $file->getClientOriginalName());
            $file->move(public_path('uploads/'), $filename);
            $cuti->file_pendukung = $filename;
        }

        $cuti->save();
        

        return redirect()->to('user/cuti')->with('success', 'Pengajuan cuti berhasil disimpan.');
    }

    // Method untuk mendapatkan sisa kuota cuti (untuk AJAX)
    public function getSisaKuota(Request $request)
    {
        $nip = $request->nip;
        $tahun = $request->tahun ?? date('Y');
        
        $total_cuti_tahun_ini = Cuti::where('nip', $nip)
            ->whereYear('tanggal_mulai', $tahun)
            ->where('alasan_cuti', 'CUTI TAHUNAN')
            ->where('status', '!=', 'DITOLAK')
            ->sum('jumlah_hari');

        $sisa_kuota = 12 - $total_cuti_tahun_ini;

        return response()->json([   
            'total_terpakai' => $total_cuti_tahun_ini,
            'sisa_kuota' => $sisa_kuota,
            'tahun' => $tahun
        ]);
    }

    // Method yang diperbaiki di CutiController.php

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
        $cuti = Sintari_pegawai::where('nip', $nip)->first();
    
        if ($cuti) {
            return response()->json([
                'status' => 'success',
                'nama' => $cuti->nama,
                'nip' => $cuti->nip
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

    public function detail($id)
    {
        $pegawai = Sintari_pegawai::findOrFail($id);
        $cuti = Cuti::findOrFail($id);
        return view('user.cuti.detail', compact('pegawai', 'cuti'));
    }

    public function edit($id)
    {
        $cuti = Cuti::findOrFail($id);
        return view('user.cuti.edit', compact('cuti'));
    }

    public function update(Request $request, $id)
    {
        $cuti = Cuti::findOrFail($id);
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
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $cuti->file_pendukung = $filename;
        }
    
        $cuti->save();
    
        return redirect('user/cuti')->with('success', 'Data cuti berhasil diperbarui.');
    }
    

    
}
    
