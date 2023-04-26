<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function login_check(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|max:40',
            'password' => 'required'
        ]);

       if(Auth::attempt($validated))
       {
            return redirect()->route('bulletin');
       }else 
       {
        return back()->with('error','Invalid Email/Password Combination');
       }
    }
}
