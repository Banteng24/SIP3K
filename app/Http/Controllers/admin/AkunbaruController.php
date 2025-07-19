<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Sintari_pegawai;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class AkunbaruController extends Controller
{
    public function index(){
        $akuns = Sintari_pegawai::get();
        return view('admin.akun-baru.index', compact('akuns')); // ✅ fixed
    }

    public function tambah(){
        return view('admin.akun-baru.tambah');
    }

    function edit($id){
        $akuns = Sintari_pegawai::findOrFail($id);
        return view('admin.akun-baru.tambah', compact('akuns'));
    }
    
    public function submit(Request $request)
    {
        // Validasi data
        $request->validate([
            'username' => 'required|unique:sintari_pegawais,username',
            'password' => 'required|min:6',
            'nama' => 'required',
            'nip' => 'required',
            'pegawai_email' => 'required|email|unique:sintari_pegawais,pegawai_email',
            'status' => 'required',
            'jabatan' => 'required',
        ], [
            'username.unique' => 'Username sudah digunakan. Silakan pilih username lain.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 6 karakter.',
            'pegawai_email.required' => 'Email wajib diisi.',
            'pegawai_email.email' => 'Format email tidak valid.',
            'pegawai_email.unique' => 'Email sudah digunakan. Silakan gunakan email lain.',
            'status.required' => 'Status wajib dipilih.',
        ]);

        // Simpan data baru
        $akuns = new Sintari_pegawai();
        $akuns->username = $request->username;
        $akuns->status = $request->status;
        $akuns->nama = $request->nama;
        $akuns->nip = $request->nip;
        $akuns->jabatan = $request->jabatan;
        $akuns->opd = $request->opd;
        $akuns->gol = $request->gol;
        $akuns->tmt_gol = $request->tmt_gol;
        $akuns->tmt_jabatan = $request->tmt_jabatan;
        $akuns->tgl_sk_pengangkatan = $request->tgl_sk_pengangkatan;
        $akuns->pegawai_tgl_sk = $request->pegawai_tgl_sk;
        $akuns->pegawai_no_sk = $request->pegawai_no_sk;
        $akuns->pegawai_tgl_pelantikan = $request->pegawai_tgl_pelantikan;
        $akuns->tgl_spmt = $request->tgl_spmt;
        $akuns->pendidikan_terakhir = $request->pendidikan_terakhir;
        $akuns->tingkat_pendidikan = $request->tingkat_pendidikan;
        $akuns->jurusan_pendidikan = $request->jurusan_pendidikan;
        $akuns->tahun_lulus = $request->tahun_lulus;
        $akuns->tempat_lahir = $request->tempat_lahir;
        $akuns->tanggal_lahir = $request->tanggal_lahir;
        $akuns->pegawai_email = $request->pegawai_email;
        $akuns->tmt_pensiun = $request->tmt_pensiun;
        $akuns->password = bcrypt($request->password);
        $akuns->save();

        return redirect('admin/akun-baru')->with('success', 'Akun baru Sintari berhasil ditambahkan');
    }

    public function update(Request $request, $id){
        // Validasi data untuk update
        $request->validate([
            'username' => 'required|unique:sintari_pegawais,username,' . $id,
            'nama' => 'required',
            'nip' => 'required',
            'pegawai_email' => 'required|email|unique:sintari_pegawais,pegawai_email,' . $id,
            'status' => 'required',
        ], [
            'username.unique' => 'Username sudah digunakan. Silakan pilih username lain.',
            'pegawai_email.required' => 'Email wajib diisi.',
            'pegawai_email.email' => 'Format email tidak valid.',
            'pegawai_email.unique' => 'Email sudah digunakan. Silakan gunakan email lain.',
            'status.required' => 'Status wajib dipilih.',
        ]);

        $akuns = Sintari_pegawai::findOrFail($id);
        $akuns->username = $request->username;
        $akuns->status = $request->status;
        $akuns->nama = $request->nama;
        $akuns->nip = $request->nip;
        $akuns->jabatan = $request->jabatan;
        $akuns->opd = $request->opd;
        $akuns->gol = $request->gol;
        $akuns->tmt_gol = $request->tmt_gol;
        $akuns->tmt_jabatan = $request->tmt_jabatan;
        $akuns->tgl_sk_pengangkatan = $request->tgl_sk_pengangkatan;
        $akuns->pegawai_tgl_sk = $request->pegawai_tgl_sk;
        $akuns->pegawai_no_sk = $request->pegawai_no_sk;
        $akuns->pegawai_tgl_pelantikan = $request->pegawai_tgl_pelantikan;
        $akuns->tgl_spmt = $request->tgl_spmt;
        // $akuns->pendidikan_terakhir = $request->pendidikan_terakhir;
        $akuns->tingkat_pendidikan = $request->tingkat_pendidikan;
        $akuns->jurusan_pendidikan = $request->jurusan_pendidikan;
        $akuns->tahun_lulus = $request->tahun_lulus;
        $akuns->tempat_lahir = $request->tempat_lahir;
        $akuns->tanggal_lahir = $request->tanggal_lahir;
        $akuns->pegawai_email = $request->pegawai_email;
        $akuns->tmt_pensiun = $request->tmt_pensiun;
        
        // Update password hanya jika ada input password baru
        if ($request->filled('password')) {
            $request->validate([
                'password' => 'min:6',
            ], [
                'password.min' => 'Password minimal 6 karakter.',
            ]);
            $akuns->password = bcrypt($request->password);
        }

        $akuns->save();

        return redirect('admin/akun-baru')->with('success', 'Akun Sintari berhasil diperbarui');
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
                    'nama' => $akuns->nama,
                    'nip' => $akuns->nip
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
        $akuns = Sintari_pegawai::findOrFail($id);
        return view('admin.akun-baru.detail', compact('akuns'));
    }

    public function exportPDF($id)
    {
        $pegawai = Sintari_pegawai::findOrFail($id);

        $pdf = Pdf::loadView('admin.akun-baru.pdf', compact('pegawai'))->setPaper('A4', 'portrait');
        return $pdf->stream('data-pegawai-' . $pegawai->nama . '.pdf');
    }

    public function cekUsername($username)
    {
        $exists = Sintari_pegawai::where('username', $username)->exists();
        return response()->json(['exists' => $exists]);
    }

    // public function destroy($id)
    // {
    //     try {
    //         $akuns = Sintari_pegawai::findOrFail($id);
    //         $akuns->delete();
            
    //         return redirect('admin/akun-baru')->with('success', 'Akun berhasil dihapus');
    //     } catch (\Exception $e) {
    //         return redirect('admin/akun-baru')->with('error', 'Gagal menghapus akun: ' . $e->getMessage());
    //     }
    // }
}