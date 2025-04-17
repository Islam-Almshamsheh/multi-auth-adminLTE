<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index',compact('categories'));
    }
    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:100',
        ]);
       
        Category::firstOrCreate([ 'name' => $request->name]);

        return to_route("categories.index")->with('success','Category created successfully');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit',['category'=>$category]);
    }

    public function update(Request $request,Category $category)
    {
        $validated = $request->validate([
            'name'=> 'required|min:3|max:100',
        ]);

        $category->update($validated);
        return to_route('categories.index')->with('success','Category updated successfully');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return to_route('categories.index')->with('success','Category deleted successfully');
    }
}
