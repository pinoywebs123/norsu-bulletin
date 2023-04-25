<?php

namespace App\Http\Controllers;
use App\Models\Forms;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index()
    {
        return view('index');
    }
}
