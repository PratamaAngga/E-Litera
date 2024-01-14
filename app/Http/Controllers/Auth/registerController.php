<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class registerController extends Controller
{
    public function showRegistForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
    // Validasi data registrasi
       $request->validate([
            'email' => 'required|string|max:48',
            'username' => 'required|string|max:18',
            'nama_lengkap' => 'required|string|max:48',
            'no_telp' => 'required|string|max:15',
            'password' => 'required|string|min:8|confirmed'
        ]);

        // Buat pengguna baru
        $user = User::create([   
            'email' => $request->email,
            'username' => $request->username,
            'nama_lengkap' => $request->nama_lengkap,
            'no_telp' => $request->no_telp,
            'password' => bcrypt($request->password),
        ]);

        // Autentikasi pengguna
        Auth::login($user);

        // Redirect ke halaman yang sesuai
        return redirect('/home'); 
    }
}
