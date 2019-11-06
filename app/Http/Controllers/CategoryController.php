<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index')->with('categories', $categories);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {        
        $this->validate($request,[
           'name' =>'required'
        ]);

        $category = new Category();
        $category['name'] = $request['name'];
        $category->save();
        return redirect('admin/categories');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit')->with('category',$category);        
    }

    public function update($id,Request $request)
    {
        $this->validate($request,[
            'name' =>'required'
         ]);
        $category = Category::findOrFail($id);
        $category['name']=$request['name'];
        $category->save();
        return redirect('admin/categories');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->destroy($id);
        return redirect('admin/categories');
    }
}
