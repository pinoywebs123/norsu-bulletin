<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Forms;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class CategoryController extends Controller
{
    public function new_category()
    {
        return view('admin.form');
    }
    
    public function category()
    {
        $all = Category::all();
        return view('admin.category',compact('all'));
    }

    public function check_category(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ]);

        Category::create($validated);

        return back()->with('success','Category Created Successfully!');
        
    }

    public function category_delete(Request $request)
    {
        $find = Category::find($request->category_id);
        if($find)
        {
            $find->delete();
            return back()->with('success','Category Deleted Successfully!');
        }
    }

    public function find_category(Request $request)
    {
        return response()->json(Category::find($request->category_id));
    }

    public function update_category(Request $request)
    {
        $find = Category::find($request->category_id);
        if($find)
        {
            $find->update(['category_name'=> $request->category_name]);
            return back()->with('success','Category Updated Successfully!');
        }
    }
}