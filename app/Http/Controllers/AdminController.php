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
        return $request->all();
    }
}
