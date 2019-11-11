<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    public $fillable=['name','category_id','details','price','address'];
    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function locations()
    {
        return $this->belongsToMany('App\Location','location_item');
    }
}
