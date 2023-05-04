<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use Auth;

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
        $find = User::find($request->users_id);
        
        if($find)
        {
            $find->delete();
            return back()->with('success','Users Deleted Successfully!');
        }
    }

    public function users_find(Request $request)
    {
        return response()->json(User::find($request->users_id));
    }

    public function users_update(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|max:255',
            'phone' => 'required|max:255',
        ]);

        $find = User::find($request->user_id);
        if($find)
        {
            $find->update($validated);
            return back()->with('success','User Updated Successfully!');
        }
    }

    public function settings()
    {
        return view('admin.setting');
    }

    public function change_password(Request $request)
    {
         $validated = $request->validate([
            'new_password' => 'required|max:255',
            'repeat_password' => 'required|max:255'
            
        ]);
        $find = User::find(Auth::id());
        if( $find )
        {
            $find->update(['password'=> bcrypt($request->new_password)]);
            return back()->with('success','Password Updated Successfully!');
        }
    }
}
