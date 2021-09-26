<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function loginAdmin()
    {
        return view('patial.login');
    }
    public function postLogin(Request $request){
        $remember = $request->has('remember_me') ? true: false ;
        if(Auth::attempt ([
            'email' => $request->email,
            'password' => $request->password,
        ], $remember)){
            return redirect()->intended('home');
        }
    }
}
