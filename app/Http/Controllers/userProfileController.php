<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\User; 

class UserProfileController extends Controller
{
    public function showProfile($id)
    {
        $user = User::findOrFail($id);
        return view('about-user.profile', compact('user'));
    }
    
    public function editProfile(Request $request, $id)
    {
        // Validasi form
        $request->validate([
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'email' => 'required|email',
            'username' => 'required|string',
            'nama_lengkap' => 'required|string',
            'no_telp' => 'required|string',
            'alamat' => 'required|string',
        ]);
    
        // Upload foto jika ada
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('profile_photos', 'public');
        } else {
            $photoPath = null;
        }

    
        $user = User::findOrFail($id);
    
        // Simpan data pengguna
        $user->email = $request->input('email');
        $user->username = $request->input('username');
        $user->nama_lengkap = $request->input('nama_lengkap');
        $user->no_telp = $request->input('no_telp');
        $user->alamat = $request->input('alamat');
        $user->photo = $photoPath;

        $user->save();
    
        return redirect()->back()->with('success', 'Profil berhasil diperbarui');
    }
}    