<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\User;
use Auth;

class MainController extends Controller
{
    public function index()
    {
        $products = Product::getPopularProducts();

        $measures = Product::getMeasure();

        $menu = Category::allLeaves()->where('status', '!=', null)->get();

        return view('front.index', compact('products','menu', 'measures'));
    }
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        $category = $product->categories->name;

        return view('front.show', compact('product', 'category'));
    }
    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $products = $category->products;

        return view('front.category', compact('products', 'category'));
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
        $this->validate($request, [
            'phone' => 'required',
            'password' => 'required'
        ]);

        $result = Auth::attempt([
            'phone' => $request->get('phone'),
            'password' => $request->get('password')
        ]);
        if($result){
            return redirect('/');
        }
        return redirect()->back()->with('status', 'Неправильный телефон или пароль');
    }
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|min:3|max:50|unique:users',
            'email' => 'email|unique:users',
            'phone' => 'required|unique:users',
            'password' => 'confirmed|min:6'
        ]);

        $user = User::add($request->all());
        $user->generatePassword($request->get('password'));

        return redirect('/login')->with('status', 'Вы успешно зарегистрировались!!!');
    }
    public function cart()
    {
        return view('front.cart');
    }
    public function favorite()
    {
        return view('front.favorite');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
