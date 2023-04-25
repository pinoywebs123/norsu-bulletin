<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Forms;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class CategoryController extends Controller
{
    public function index()
    {
        return view('index');
    }
    
    public function users()
    {
        return view('admin.users');
    }

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
            'category_name' => 'required|unique:category|max:255',
        ]);

        Category::create($validated);

        return back()->with('success','Category Created Successfully!');
        
    }
}