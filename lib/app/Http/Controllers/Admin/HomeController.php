<?php

namespace App\Http\Controllers\Admin;
use Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function getHome(){
        return view('backend.index');
    }
    public function getLogout(){
        Auth::logout();
        return redirect()->intended('login');
    }
}
