<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use App\Location;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(Request $request)
    {    
        $categories = Category::all();        
        $locations=Location::all();

        $items=Item::with('category');
        if($request->has('keywords') && !empty($request['keywords'])){
            $items=$items->where('name','like','%'.$request['keywords'].'%');
        }
        if($request->has('location_id') && !empty($request['location_id'])){
            
        }
        if($request->has('category_id') && !empty($request['category_id'])){
            $items=$items->where('category_id','=',$request['category_id']);
        }
        $items=$items->get();

        return view('index')->with([
            'categories'=>$categories,
            'locations'=>$locations,
            'items'=>$items
            ]);        
    }
    
}
