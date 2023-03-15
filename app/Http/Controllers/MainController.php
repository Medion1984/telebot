<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\User;
use App\Material;
use App\Notice;
use App\Order;
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

        $measure = Product::getMeasure()[$product->measure];

        $materials = Material::whereIn('id', json_decode($product->materials))->orderBy('category_material')->get();

        $notices = Notice::whereIn('id', json_decode($product->notices))->get();

        return view('front.show', compact('product', 'category', 'materials','measure','notices'));
    }
    public function cart($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        $measure = Product::getMeasure()[$product->measure];

        $notices = Notice::whereIn('id', json_decode($product->notices))->get();

        return view('front.cart', compact('product','measure','notices'));
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
        return redirect()->back()->with('error', 'Неправильный телефон или пароль');
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

        return redirect('/login')->with('success', 'Вы успешно зарегистрировались!!!');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
    public function ordering(Request $request , $slug)
    {
        $fields = [];
        if(Auth::user() != null){
            $this->validate($request, [
                'address' => 'required|min:10'
            ]);
            $fields['address'] = $request->get('address');
            $fields['owner'] = Auth::user()->name;
            $fields['phone'] = Auth::user()->phone;
        } else {
            $this->validate($request, [
                'owner' => 'required|min:3',
                'phone' => 'required',
                'address' => 'required|min:10'
            ]);
            $fields = $request->all();
        }

        if(Order::canMakeOrder($fields['phone'])) return redirect()->back()->with('error', 'You cant');

        $fields['product'] = $slug;

        if(Order::create($fields)){
            return redirect()->route('show', $slug)->with('success', 'Вы успешно сделали заказ! Наш специалист свяжется с вами в ближайшее время.');
        } 
        return redirect()->back()->with('error', 'Что то пошло не так! Попробуйте позже!');
    }
}
