<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Menampilkan daftar OPD
    public function index() {
        $users = User::all(); // lebih baik pakai $users
        return view('admin.tambah-opd.index', compact('users'));
    }

    // Form tambah OPD
    public function create() {
        return view('admin.tambah-opd.tambah');
    }

    // Simpan data OPD baru
    public function submit(Request $request) {
        $request->validate([
            'nama_opd' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed', // pakai password confirmation
        ]);

        $user = new User();
        $user->nama_opd = $request->nama_opd; // pastikan kolom ini ada di tabel users
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('admin/tambah-opd')->with('success', 'Data OPD berhasil ditambahkan.');
    }

    // Tampilkan halaman login
    public function login() {
        return view('admin.login');
    }

    // Proses login admin (gunakan guard default 'web' jika tidak ada guard khusus)
    public function masuk(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) { // gunakan Auth::attempt() pakai guard default
            $request->session()->regenerate();
            return redirect()->intended('user/')->with('success', 'Login berhasil!');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput();
    }

    // Logout
    public function logout(Request $request) {
        Auth::logout(); // logout dari guard default 'web'
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
