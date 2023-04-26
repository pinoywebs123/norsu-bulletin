<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Bulletin;

class AuthController extends Controller
{

    public function home()
    {
        $bulletins = Bulletin::latest()->limit(3)->get();
         return view('home',compact('bulletins'));
    }
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
