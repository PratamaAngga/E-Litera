<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\contact;
use Illuminate\Http\Request;

class contactController extends Controller
{
    public function contactPage()
    {
        return view('about-user/contact', ['user' => Auth::user()]);
    }

    public function contactReport(Request $request)
    {
        $validation = $request->validate([
            'user_id' => 'required|exists:users,id_user',
            'deskripsi' => 'required|string|max:24'
        ]);

        $newreport =new contact([
            'deskripsi' => $validation['deskripsi'],
            'id_user' => $validation['user_id'],
        ]);

        $newreport->save();


        return redirect('about-user/contact')->with('success', 'data has been saved!!');
    }
}
