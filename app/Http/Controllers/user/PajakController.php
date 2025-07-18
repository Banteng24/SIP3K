<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Cuti;
use App\Models\Pajak;
use App\Models\Sintari_pegawai;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PajakController extends Controller
{
    public function index(Request $request)
    {
        
        // Ambil parameter pencarian NIP saja
        $search = $request->get('search') ?? $request->get('keyword') ?? null;
        
        if (!empty($search)) {
            // Search hanya berdasarkan NIP dengan exact match atau partial match
            $pajak = Sintari_pegawai::where('nip', 'like', "%$search%")
                         ->orderBy('created_at', 'desc')
                         ->get();
        } else {
            // Jika tidak ada pencarian, kirim collection kosong
            $pajak = collect();
            $pajak = Sintari_pegawai::whereNotNull('file')->get();
            // $pajak = Sintari_pegawai::get();
        }
        

        
        
        return view('user.pajak.index', compact('pajak'));
    }

    // public function create(Request $request)
    // {
    //     $pajak = new Sintari_pegawai();
    //     $pajak->nama_pegawai = $request->nama;
    //     $pajak->nip = $request->nip;
    //     $pajak->opd = $request->opd;

    //     $pajak->save();

    //     return redirect('user/pajak')->with('success', 'Data berhasil ditambahkan');
    // }

    public function edit($id)
    {
        $pajak = Sintari_pegawai::findOrFail($id);
        return view('user.pajak.edit', compact('pajak'));
    }

   // In your PajakController update method
   public function submit(Request $request, $id) 
   {
       try {
           // Validasi file yang diupload
           $request->validate([
               'file' => 'nullable|file|mimes:pdf,doc,docxz,jpg,jpeg,png|max:2048'
           ], [
               'file.mimes' => 'Format file harus berupa PDF, DOC, DOCX, JPG, atau PNG.',
               'file.max' => 'Ukuran file maksimal 2MB.',
           ]);
   
           // Cari data pajak berdasarkan ID
           $pajak = Sintari_pegawai::findOrFail($id);
           
           // Simpan nama pegawai untuk pesan notifikasi
           $namaPegawai = $pajak->nama;
           
           // Proses upload file jika ada file yang diupload
           if ($request->hasFile('file')) {
               // Hapus file lama jika ada
               if ($pajak->file && file_exists(public_path('uploads/' . $pajak->file))) {
                   unlink(public_path('uploads/' . $pajak->file));
               }
               
               // Buat nama file baru dengan timestamp
               $fileName = time() . '_' . $request->file('file')->getClientOriginalName();
               
               // Buat folder uploads jika belum ada
               if (!file_exists(public_path('uploads'))) {
                   mkdir(public_path('uploads'), 0755, true);
               }
               
               // Pindahkan file ke folder uploads
               $request->file('file')->move(public_path('uploads'), $fileName);
               
               // Simpan nama file ke database
               $pajak->file = $fileName;
               $pajak->save();
           }
           
           // Redirect ke halaman edit dengan pesan sukses
           return redirect('user/pajak')
           ->with('success', 'File pajak berhasil diupload untuk ' . $namaPegawai . '! 📄✅');
       
               
       } catch (\Illuminate\Validation\ValidationException $e) {
           // Jika validasi gagal, kembali ke halaman sebelumnya dengan error
           return redirect()->back()
               ->withErrors($e->errors())
               ->withInput();
               
       } catch (\Exception $e) {
           // Jika terjadi error lain, tampilkan pesan error umum
           return redirect()->back()
               ->with('error', 'Terjadi kesalahan saat mengupload file. Silakan coba lagi.')
               ->withInput();
       }
   }

   public function update(Request $request, $id)
   {
    try {
        // Validasi file yang diupload
        $request->validate([
            'file' => 'nullable|file|mimes:pdf,doc,docxz,jpg,jpeg,png|max:2048'
        ], [
            'file.mimes' => 'Format file harus berupa PDF, DOC, DOCX, JPG, atau PNG.',
            'file.max' => 'Ukuran file maksimal 2MB.',
        ]);

        // Cari data pajak berdasarkan ID
        $pajak = Sintari_pegawai::findOrFail($id);
        
        // Simpan nama pegawai untuk pesan notifikasi
        $namaPegawai = $pajak->nama;
        
        // Proses upload file jika ada file yang diupload
        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if ($pajak->file && file_exists(public_path('uploads/' . $pajak->file))) {
                unlink(public_path('uploads/' . $pajak->file));
            }
            
            // Buat nama file baru dengan timestamp
            $fileName = time() . '_' . $request->file('file')->getClientOriginalName();
            
            // Buat folder uploads jika belum ada
            if (!file_exists(public_path('uploads'))) {
                mkdir(public_path('uploads'), 0755, true);
            }
            
            // Pindahkan file ke folder uploads
            $request->file('file')->move(public_path('uploads'), $fileName);
            
            // Simpan nama file ke database
            $pajak->file = $fileName;
            $pajak->save();
        }
        
        // Redirect ke halaman edit dengan pesan sukses
        return redirect('user/pajak')
        ->with('success', 'File pajak berhasil diperbarui untuk ' . $namaPegawai . '! 📄✅');
    
            
    } catch (\Illuminate\Validation\ValidationException $e) {
        // Jika validasi gagal, kembali ke halaman sebelumnya dengan error
        return redirect()->back()
            ->withErrors($e->errors())
            ->withInput();
            
    } catch (\Exception $e) {
        // Jika terjadi error lain, tampilkan pesan error umum
        return redirect()->back()
            ->with('error', 'Terjadi kesalahan saat mengupload file. Silakan coba lagi.')
            ->withInput();
    }
}


    public function cari(Request $request)
    {
        $keyword = $request->keyword;
        return redirect()->route('user.pajak.index', ['search' => $keyword]);
    }

    // API untuk autocomplete NIP
    public function autocomplete(Request $request)
    {
        $search = $request->get('query');
        
        $data = Pajak::where('nip', 'like', "%$search%")
                    ->select('nip', 'nama')
                    ->distinct()
                    ->limit(20)
                    ->get();
        
        return response()->json($data);
    }

    public function detail($id)
    {
        $pegawai = Sintari_pegawai::findOrFail($id);
        return view('user.pajak.detail', compact('pegawai',));
    }

    public function exportPDF($id)
    {
        $pegawai = Sintari_pegawai::findOrFail($id);

        $pdf = Pdf::loadView('user.pajak.pdf', compact('pegawai'))->setPaper('A4', 'portrait');
        return $pdf->stream('data-pegawai-' . $pegawai->nama . '.pdf');
    }
}