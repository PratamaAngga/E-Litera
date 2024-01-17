<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function showHome()
    {
        return view('/home', ['user' => Auth::user()]);
    }
    
}
