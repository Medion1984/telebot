<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class MainController extends Controller
{
    public function index()
    {
        $products = Product::getPopularProducts();

        $menu = Category::allLeaves()->where('status', '!=', null)->get();

        return view('front.index', compact('products','menu'));
    }
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        $category = $product->categories->name;

        return view('front.show', compact('product', 'category'));
    }
    public function cart()
    {
        return view('front.cart');
    }
    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $products = $category->products;

        return view('front.category', compact('products', 'category'));
    }
    public function favorite()
    {
        return view('front.favorite');
    }
    public function loginForm()
    {
        return view('front.login');
    }
    public function registerForm()
    {
        return view('front.register');
    }
    public function login(Request $request)
    {
        return view('front.login');
    }
    public function register(Request $request)
    {
        dd($request->all());
    }
}
