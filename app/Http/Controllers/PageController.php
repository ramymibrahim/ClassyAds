<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use App\Location;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $locations = Location::all();

        $items = Item::with('category');
        if ($request->has('keywords') && !empty($request['keywords'])) {
            $items = $items->where('name', 'like', '%' . $request['keywords'] . '%');
        }
        if ($request->has('location_id') && !empty($request['location_id'])) {
            $location_id = $request['location_id'];
            $items = $items->whereHas('locations', function ($query) use ($location_id) {
                $query->where('location_id', $location_id);
            });
        }
        if ($request->has('category_id') && !empty($request['category_id'])) {
            $items = $items->where('category_id', '=', $request['category_id']);
        }
        $items = $items->get();


        $trendings = Item::whereDate('created_at', '=', Carbon::today()->toDateString());
        $trendings = $trendings->orderBy('rate', 'desc');
        $trendings = $trendings->with('category');
        $trendings = $trendings->get();
        return view('index')->with([
            'categories' => $categories,
            'locations' => $locations,
            'items' => $items,
            'trendings' => $trendings
        ]);
    }
}
