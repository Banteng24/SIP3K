<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Pajak;
use Illuminate\Http\Request;

class PajakController extends Controller
{
    public function index(){
        $pajak = Pajak::get();
        return view('user.pajak.index', compact('pajak')); // ✅ fixed
    }

    public function create(Request $request){
        $pajak = new Pajak(); // sebaiknya ubah nama $pajak jadi $pajak untuk konsistensi
        $pajak->nama_pegawai = $request->nama;
        $pajak->nip = $request->nip;
        $pajak->opd = $request->opd;

        $pajak->save(); // tambahkan ini untuk menyimpan ke database

        return redirect('user/pajak')->with('success','Dikirim');
    }

    function edit($id){
        $pajak = Pajak::findOrFail($id);
        return view('user/pajak.edit', compact('pajak'));
    }

    public function update(Request $request, $id) {
        $pajak = Pajak::findOrFail($id);
        $pajak->nama_pegawai = $request->nama_pegawai;
        $pajak->nip = $request->nip;
        $pajak->opd = $request->opd;
    
        // Cek apakah ada file baru yang diupload
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $namaFile = time() . '_' . $file->getClientOriginalName(); // nama file unik
    
            // Hapus file lama jika ada
            if ($pajak->file && file_exists(public_path('uploads/' . $pajak->file))) {
                unlink(public_path('uploads/' . $pajak->file));
            }
    
            // Pindahkan file ke folder uploads
            $file->move(public_path('uploads'), $namaFile);
    
            // Simpan nama file baru ke database
            $pajak->file = $namaFile;
        }
    
        $pajak->update();
    
        return redirect('user/pajak')->with('success', 'Data berhasil diperbarui');
    }
    function delete($id){
        $pajak = Pajak::findOrFail($id);
        $pajak->delete();
        return redirect('user/pajak')->with('success', 'Data Berhasil Di Hapus');
    }
    
    
}
