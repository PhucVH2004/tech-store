<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::where('is_featured', true)->take(4)->get();
        $newArrivals = Product::latest()->take(8)->get();
        return view('home', compact('featuredProducts', 'newArrivals'));
    }
}
