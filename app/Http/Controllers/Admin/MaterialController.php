<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\MaterialCategory;
use App\Material;
use Illuminate\Validation\Rule;

class MaterialController extends Controller
{
    public function index()
    {
        $categories = MaterialCategory::all()->toHierarchy();

        return view('admin.materials.index', compact('categories'));
    }

    public function create()
    {
        $categories = MaterialCategory::all()->toHierarchy();

        return view('admin.materials.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' =>'required|string|unique:materials',
            'category_material'   =>  'required'
        ]);
    
        Material::create($request->all());
    
        return redirect()->route('materials.index');
    }

    public function show($id)
    {
        $category = MaterialCategory::find($id);

        $name = $category->name;

        $materials = $category->materials;

        return view('admin.materials.show', compact('materials', 'name'));
    }

    public function edit($id)
    {
        $material = Material::find($id);

        $categories = MaterialCategory::all()->toHierarchy();

        return view('admin.materials.edit' ,compact('categories', 'material'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required', Rule::unique('materials')->ignore($id)],
            'category_material'   =>  'required',
            'status' => 'nullable'
        ]);

        Material::find($id)->update($request->all());
    
        return redirect()->route('materials.index');
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
