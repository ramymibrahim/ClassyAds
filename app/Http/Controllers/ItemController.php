<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Item;
use App\Location;

class ItemController extends Controller
{
    public function index()
    {
        //Get Item with Category name
        $items = Item::with('category')->get();
        //return to view and display results
    }

    public function create()
    {
        //pluck function returns associative array with id as key and name as value
        //[1=>'cars',2=>'phones']

        $categories = Category::pluck('name','id');
        $locations = Location::pluck('name','id');

        return view('items.create')->with([
            'categories'=>$categories,
            'locations'=>$locations
            ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'category_id'=>'required',
            'price'=>'required'

        ]);
        $item=new Item($request->all());
        $item['rate']=0;
        $item['rate_count']=0;
        $item['image']='images/img_4.jpg';
        $item->save();        
        return redirect('admin/items');
    }
    //
    public function show($id)
    {
        
        $item=Item::with('category')->findOrFail($id);        
        return view('items.show')->with('item',$item);
    }
}
