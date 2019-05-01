<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCourse extends Model
{
    /* Belongs to course */
    public function course(){
        return $this -> belongsTo('App\Course');
    }

    /* Belongs to User */
    public function user(){
        return $this -> belongsTo('App\User');
    }
}
