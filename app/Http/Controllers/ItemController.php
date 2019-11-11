<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Item;
use App\Location;
use Illuminate\Support\Facades\Session;

class ItemController extends Controller
{
    public function index(Request $request)
    {

        $items = Item::select(['id', 'name', 'created_at', 'updated_at', 'category_id']);
        if ($request->has('orderBy')) {
            $sortOrder = 'asc';
            if ($request->has('sortOrder'))
                $sortOrder = $request['sortOrder'];
            $items = $items->orderBy($request['orderBy'], $sortOrder);
        }

        if ($request->has('keywords')) {
            $items = $items->where('name', 'like', '%' . $request['keywords'] . '%');
        }
        $items = $items->paginate(5);                        
        return view('items.index')->with('items', $items);
    }

    public function create()
    {
        //pluck function returns associative array with id as key and name as value
        //[1=>'cars',2=>'phones']

        $categories = Category::pluck('name', 'id');
        $locations = Location::pluck('name', 'id');

        return view('items.create')->with([
            'categories' => $categories,
            'locations' => $locations
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required'

        ]);
        $item = new Item($request->all());
        $item['rate'] = 0;
        $item['rate_count'] = 0;
        $item['image'] = 'images/img_4.jpg';
        if ($item->save())
            Session::flash('alert', 'Record Added Successfully!');
        else
            Session::flash('alert-danger', 'Error while adding record!');
        return redirect('admin/items');
    }
    //
    public function show($id)
    {

        $item = Item::with('category')->findOrFail($id);
        return view('items.show')->with('item', $item);
    }

    function  destroy($id)
    {        
    }
}
