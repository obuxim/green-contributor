<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    public function videocategory(){
        return $this->belongsTo('App\VideoCategory');
    }
}
