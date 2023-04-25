<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bulletin;

class AdminController extends Controller
{
    
    public function users()
    {
        return view('admin.users');
    }

    public function category()
    {
        return view('admin.category');
    }

    public function bulletin()
    {
        $all = Bulletin::all();
        return view('admin.bulletin',compact('all'));
    }

    public function bulletin_check(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|unique:bulletins|max:255',
            'description' => 'required',
        ]);

        Bulletin::create($validated);

        return back()->with('success','Bulletin Created Successfully!');
        
    }
}
