<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // <- you need this

class PageController extends Controller
{
    public function home()
    {
        // Fetch the latest 4 products
        $featuredProducts = Product::latest()->take(4)->get();

        // Pass them to the view
        return view('pages.home', compact('featuredProducts'));
    }
}
