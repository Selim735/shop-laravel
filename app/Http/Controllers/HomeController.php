<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::with('category')->get();
        $categories = Category::all();
        return view('home', compact('products', 'categories'));
    }

    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminDashboard()
    {
        $productsCount = Product::count();
        $categoriesCount = Category::count();
        return view('admin.dashboard', compact('productsCount', 'categoriesCount'));
    }
}
