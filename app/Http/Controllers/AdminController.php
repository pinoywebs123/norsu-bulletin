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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $destinationPath = 'cover';
        $myimage = $request->image->getClientOriginalName();
        $request->image->move(public_path($destinationPath), $myimage);

        $validated['image'] = $myimage;

        Bulletin::create($validated);

        return back()->with('success','Bulletin Created Successfully!');
        
    }

    public function bulletin_delete(Request $request)
    {
        $find = Bulletin::find($request->bulletin_id);
        if($find)
        {
            $find->delete();
            return back()->with('success','Bulletin Deleted Successfully!');
        }
    }
}
