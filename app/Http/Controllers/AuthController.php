<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
                                                     // Menampilkan daftar OPD
    public function index() {
        $user = User::all(); // lebih baik pakai $users
        return view('admin.tambah-opd.index', compact('user'));
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
            'password' => 'required|string|min:6',

        ]);
        $user = new User();
        $user->nama_opd = $request->nama_opd;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->password_plain = $request->password; // << ini ditampilkan di view
        $user->save();
        

        return redirect('admin/tambah-opd')->with('success', 'Data OPD berhasil ditambahkan.');
    }
    public function delete($id)
{
    $user = User::findOrFail($id);
    $user->delete();

    return redirect('admin/tambah-opd')->with('success', 'Data berhasil dihapus!');
}


function edit($id){
    $user = User::findOrFail($id);
    return view('admin.tambah-opd.edit', compact('user'));
}

public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->nama_opd = $request->nama_opd;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->password_plain = $request->password; // << ini ditampilkan di view
        $user->save();
    
        return redirect('admin/tambah-opd')->with('success', 'Data Opd berhasil diperbarui.');
    }

    

                                                     // Tampilkan halaman login
    public function login()
    {
        if(Auth::guard('admin')->check()) {
            return redirect('admin');
        }

        if(Auth::guard('user')->check()) {
            return redirect('user');
        }
        return view('admin.login');
    }

    // Proses login admin (gunakan guard default 'web' jika tidak ada guard khusus)
    public function masuk(Request $request) 
    {
          // Cek apakah email ada di tabel admin
          $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ],[
            'email.required' => 'Email is required',
            'email.email' => 'Email must be a valid email address',
            'password.required' => 'Password is required',
        ]);  

        
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('admin')->with('success', 'Login successful');
        }elseif (Auth::guard('user')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('user')->with('success', 'Login successful');
        }else{
            return back()->withErrors([
                'email' => 'Email atau kata sandi salah', 
             ]);
        }
    }

    // Logout
    public function logout(Request $request) {
        Auth::logout(); // logout dari guard default 'web'
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    
}

