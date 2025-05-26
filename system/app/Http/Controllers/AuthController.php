<?php

namespace App\Http\Controllers;

use App\Models\Tambah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Menampilkan daftar OPD
    public function index() {
        $tambah = Tambah::get();
        return view('admin.tambah-opd.index', compact('tambah'));
    }

    // Form tambah OPD
    public function create() {
        return view('admin.tambah-opd.tambah');
    }

    // Simpan data OPD baru
    public function submit(Request $request) {
        $request->validate([
            'nama_opd' => 'required|string|max:255',
            'email' => 'required|email|unique:tambahs,email',
            'password' => 'required|string|min:6',
        ]);

        $tambah = new Tambah();
        $tambah->nama_opd = $request->nama_opd;
        $tambah->email = $request->email;
        $tambah->password = Hash::make($request->password);
        $tambah->save();

        return redirect('admin/tambah-opd')->with('success', 'Data OPD berhasil ditambahkan.');
    }

    // Tampilkan halaman login
    public function login() {
        return view('admin.login');
    }

    // Proses login admin (model Tambah)
    public function masuk(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
    
        $credentials = $request->only('email', 'password');
    
        if (Auth::guard('tambah')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('user/')->with('success', 'Login berhasil!');
        }
    
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput();
    }
    

    // Logout
    public function logout(Request $request) {
        Auth::guard('tambah')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
