<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use App\Location;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Session\Session;

class PageController extends Controller
{
    public function __construct()
    {
        //View::share('categories',['1','2','3']);
    }
    public function index(Request $request)
    {           
        View::share('page','home');
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

    public function contact(){
        View::share('page','contact');
        return view('pages.contact');
    }

    //localhost:8000/lang/ar
    //localhost:8000/lang/en    
    public function setLang($lang){        
        if(in_array($lang,['ar','en'])){
            session(['lang'=>$lang]);                        
        }        
        return redirect()->back();
    }
}
