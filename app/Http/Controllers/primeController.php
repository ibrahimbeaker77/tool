<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tools;
use App\Models\ToolCategories;

class primeController extends Controller
{
    public function toolPrime()
    {
        // $categories=   ToolCategories::all();
        // return view('frontend.index', compact('categories'));

         $categories = ToolCategories::latest()->get();
         return view('frontend.index', compact('categories'));

        // return view('frontend.index');

    }
}
