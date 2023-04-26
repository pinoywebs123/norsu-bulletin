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
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|unique:users|max:255',
            'phone' => 'required|unique:users|max:255',
            'password' => 'required|max:255'
        ]);

        $validated ['password'] = bcrypt($validated['password']);

        User::create($validated);

        return back()->with('success','User Created Successfully!');
        
    }

    public function users_delete(Request $request)
    {
        $find = User::find($request->id);
        if($find)
        {
            $find->delete();
            return back()->with('success','User Deleted Successfully!');
        }
    }
}
