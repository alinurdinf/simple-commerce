<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\UserRoleView;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::count();

        $widget = [
            'users' => $users,
            'active_users' => User::where('is_active', true)->count(),
            'products' => Product::count(),
            'active_products' => Product::where('status', 'available')->count(),
        ];

        $products = Product::orderby('id', 'desc')->with('galleries')->limit(5)->get();
        return view('home', compact('widget', 'products'));
    }
}
