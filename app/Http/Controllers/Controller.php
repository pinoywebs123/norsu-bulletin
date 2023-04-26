<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Bulletin;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function news()
    {
        // sample pagination only
        $bulletins = Bulletin::latest()->paginate(10);

        return view('news', compact('bulletins'));
    }

    public function show_news($id)
    {
        return view('show_news');
    }
}
