<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        $product_latest = Product::with('galleries')->orderby('id', 'desc')->get();
        $products_available = Product::with('galleries')->where('stock', '>', 0)->get();
        return view('welcome', compact('product_latest', 'products_available'));
    }
}
