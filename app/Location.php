<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    
    public function items()
    {
        return $this->belongsToMany('App\Item');
    }
}
