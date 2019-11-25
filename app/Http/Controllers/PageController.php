<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use App\Location;
use App\Mail\ContactMail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    public function __construct()
    {
        //View::share('categories',['1','2','3']);
    }
    public function index(Request $request)
    {
        View::share('page', 'home');
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

    public function contact()
    {
        View::share('page', 'contact');
        return view('pages.contact');
    }

    public function sendContact(Request $request)
    {
        $when = now()->addMinutes(5);
        $obj =  new ContactMail($request->all());
        Mail::to([
            "ramymibrahim@yahoo.com", "ramyibrahim89@gmail.com"
        ])->later($when, $obj);

        //->send()
        //->queue()
        Session::flash('alert-success', 'Your mail has been sent successfully');
        return redirect('/');
    }
    //localhost:8000/lang/ar
    //localhost:8000/lang/en    
    public function setLang($lang)
    {
        if (in_array($lang, ['ar', 'en'])) {
            session(['lang' => $lang]);
        }
        return redirect()->back();
    }

    public function admin()
    {        
        if (!Gate::allows('subManage'))
            return abort(404);
        return view('pages.admin');
    }
}
