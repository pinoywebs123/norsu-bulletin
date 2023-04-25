<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('admin.bulletin');
    }
}
