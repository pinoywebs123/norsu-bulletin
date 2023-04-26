<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class UsersController extends Controller
{
    public function users()
    {
        $all = User::all();
        return view('admin.users',compact('all'));
    }

    public function users_check(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|unique:users|max:255',
            'last_name' => 'required|unique:users|max:255',
            'email' => 'required|unique:users|max:255',
            'phone' => 'required|unique:users|max:255',
            'password' => 'required|unique:users|max:255'
        ]);

        User::create($validated);

        return back()->with('success','User Created Successfully!');
        
    }
}
