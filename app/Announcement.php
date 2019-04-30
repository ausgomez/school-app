<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    /* Belongs to Course */
    public function course(){
        return $this->belongsTo('App\Course');
    }
}
