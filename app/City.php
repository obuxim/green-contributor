<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function activities(){
        return $this->hasMany('App\Activity');
    }
    public function events(){
        return $this->hasMany('App\Event');
    }
}
