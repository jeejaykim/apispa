<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::get();
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name'=>'required',
        ]);
        $category = Category::create($data);
        return redirect()->route('category.index')->with('success','New Category Added');
    }

    public function show(Category $category)
    {
        return view('category.update',compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $this->validate($request,[
            'name'=>'required',
        ]);

        $category->update($data);
        return back()->with('success','Category Updated');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index')->with('error','Category Removed');
    }
}
