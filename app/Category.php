<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //

    //public $fillable=['name'];
    public function items()
    {
        return $this->hasMany('App\Item');
    }
}
