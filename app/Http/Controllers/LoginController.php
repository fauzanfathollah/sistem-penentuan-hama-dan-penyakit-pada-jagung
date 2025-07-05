<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Tampilkan halaman login
    public function index()
    {
        return view('pages.auth.login');
    }

    // Proses login
    public function login_proses(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $data = [
            'username'     => $request->username,
            'password'  => $request->password,
        ];

        if (Auth::attempt($data)) {
            $user = Auth::user();

            if ($user->role == 'Petani') {
                return redirect('/petani/dashboard');
            } elseif ($user->role == 'Ahli') {
                return redirect('/ahli/dashboard');
            } elseif ($user->role == 'Admin') {
                return redirect('/admin/dashboard');
            } else {
                Auth::logout();
                return redirect()->route('login')->with('failed', 'Role tidak dikenali');
            }
        } else {
            return redirect()->route('login')->with('failed', 'username atau password salah');
        }
    }

    // Proses logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Berhasil keluar');
    }
}
