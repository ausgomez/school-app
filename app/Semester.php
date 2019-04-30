<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    /* Has many courses */
    public function courses(){
        return $this -> hasMany('App\Course');
    }
}
