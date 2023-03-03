<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\MaterialCategory;
use Illuminate\Validation\Rule;

class MaterialCategoryController extends Controller
{

    public function index()
    {
        $categories = MaterialCategory::all()->toHierarchy();

        return view('admin.material_category.index', compact('categories'));
    }

    public function create()
    {
        $categories = MaterialCategory::getNestedList('name','id','--');
        
        return view('admin.material_category.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' =>'required|string|unique:material_categories',
            'parent_id'   =>  'nullable'
        ]);

        $result = MaterialCategory::create($request->all());
    
        return redirect()->route('material_category.index');
    }

    public function edit($id)
    {
        $categories = MaterialCategory::getNestedList('name','id','--');

        $category = MaterialCategory::find($id);

        return view('admin.material_category.edit', compact('categories', 'category'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' =>['required', Rule::unique('material_categories')->ignore($id)],
            'parent_id'   =>  ['nullable' , Rule::notIn([$id])],
            'status' => 'nullable'
        ]);
        
        $category = MaterialCategory::find($id);

        $result = $category->update($request->all(['name','parent_id','status']));
        
        MaterialCategory::rebuild();

        return redirect()->route('material_category.index');
    }

    public function destroy($id)
    {
        //
    }
}
