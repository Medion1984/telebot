<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all()->toHierarchy();

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::getNestedList('name','id','--');
        
        return view('admin.categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' =>'required|string|unique:categories',
            'parent_id'   =>  'nullable'
        ]);

        Category::create($request->all());
    
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::getNestedList('name','id','--');

        $category = Category::find($id);

        return view('admin.categories.edit', compact('categories', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' =>['required', Rule::unique('categories')->ignore($id)],
            'parent_id'   =>  ['nullable' , Rule::notIn([$id])],
            'status' => 'nullable'
        ]);
        
        $category = Category::find($id);
        $result = $category->update($request->all(['name','parent_id','status','sort']));
        
        Category::rebuild();

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
