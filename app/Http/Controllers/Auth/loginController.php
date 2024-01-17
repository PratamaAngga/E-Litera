<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('name_user', 'password');

        $user = User::where('username', $credentials['name_user'])
            ->orWhere('email', $credentials['name_user'])
            ->orWhere('no_telp', $credentials['name_user'])
            ->orWhere('nama_lengkap', $credentials['name_user'])
            ->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::login($user);
            $redirectPath = '/home';

            // Memeriksa hak akses dan mengarahkan ke rute yang sesuai
            if ($user->hak_akses == 'petugas') {
                $redirectPath = 'admin/homepage';
            } elseif ($user->hak_akses == 'administrator') {
                $redirectPath = 'admin/homepage';
            }

            return redirect()->intended($redirectPath);
        }

        return back()->withErrors(['Email atau kata sandi salah.']);
    }


    public function username()
    {
        return 'name_user';
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/auth/login');
    }
}
