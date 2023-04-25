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

    public function category()
    {
        $categories = Category::all();
        return view('admin.category', compact('categories'));
    }

    public function new_category()
    {
        return view('admin.form');
    }

    public function check_category(Request $request)
    {
        $category = new Category;
        $category->category_name = $request->category_name;
        $category->save();
        return 'Category successfully created!';
    }

    public function bulletin()
    {
        return view('admin.bulletin');
    }
}