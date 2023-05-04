<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bulletin;
use App\Models\Category;
use Auth;

class AdminController extends Controller
{
    public function category()
    {
        return view('admin.category');
    }

    public function bulletin()
    {
        $all = Bulletin::all();
        $categories = Category::all();
        return view('admin.bulletin',compact('all','categories'));
    }

    public function bulletin_check(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|unique:bulletins|max:255',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'category_id'   => 'required'
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

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function find_bulletin(Request $request)
    {
        $find = Bulletin::find($request->bulletin_id);
        if($find)
        {
            return response()->json( $find );
        }
    }

    public function update_bulletin(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'category_id'   => 'required',
            'bulletin_id'   => 'required'
        ]);
        

       
        
        $find = Bulletin::find($validated['bulletin_id']);
        if($find)
        {
            unset($validated['bulletin_id']);
            $find->update($validated);
            return back()->with('success','Bulletin Updated Successfully!');
        }
    }

    
}
