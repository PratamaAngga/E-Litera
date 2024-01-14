<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\MOdels\User;
Use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('name_user', 'password');

        $user = User::where('username', $credentials['name_user'])
                -> orWhere ('email', $credentials['name_user'])
                -> orWhere ('no_telp', $credentials['name_user'])
                -> orWhere ('nama_lengkap', $credentials['name_user'])
                -> first();
        
        if ($user && Hash::check($credentials['password'], $user->password)) {
                Auth::login($user);
                return redirect()->intended('/home');
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
