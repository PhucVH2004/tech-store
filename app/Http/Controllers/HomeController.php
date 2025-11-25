<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $newProducts = Product::latest()->take(8)->get();
        $bestSellers = Product::inRandomOrder()->take(8)->get();
        return view('home', compact('newProducts', 'bestSellers'));
    }
}
