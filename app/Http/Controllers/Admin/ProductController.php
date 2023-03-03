<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\MaterialCategory;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::all()->toHierarchy();

        return view('admin.products.index', compact('categories'));
    }

    public function create()
    {
        $materials = MaterialCategory::all()->toHierarchy();

        $measure = Product::getMeasure();

        $categories = Category::all()->toHierarchy();

        return view('admin.products.create', compact('categories', 'materials', 'measure'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' =>'required|string',
            'category'   =>  'required'
        ]);

        $fields = $request->all(['name','slug','status','category','price_sale','price','popular','measure']);
        $fields['materials'] = json_encode($request->get('materials'));

        $result = Product::create($fields);
        
        return redirect()->route('products.show', $result->category);
    }

    public function show($id)
    {
        $category = Category::find($id);

        $products = $category->products;

        return view('admin.products.show', compact('category','products'));
    }
    public function photo($id)
    {
        $product = Product::find($id);

        return view('admin.products.photo', compact('product'));
    }
    public function storePhoto(Request $request, $id)
    {
        $input = $request->all();
        $image_parts = explode(";base64,", $input['base64image']);
        $image_base64 = base64_decode($image_parts[1]);
        $product = Product::find($id);
        $product->uploadProductImage($image_base64);

        return redirect()->route('products.show', $product->category);
    }
    public function edit($id)
    {
        $categories = Category::all()->toHierarchy();

        $product = Product::find($id);

        $selected = json_decode($product->materials);

        $measure = Product::getMeasure();

        $materials = MaterialCategory::all()->toHierarchy();

        return view('admin.products.edit', compact('categories','materials', 'product', 'selected', 'measure'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' =>'required|string',
            'category'   =>  'required'
        ]);

        $product = Product::find($id);

        $fields = $request->all(['name','slug','status','category','price_sale','price','popular','measure']);
        $fields['materials'] = json_encode($request->get('materials'));

        $product->update($fields);
        
        return redirect()->route('products.show', $product->category);   
    }

    public function destroy($id)
    {
        //
    }
}