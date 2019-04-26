<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    // Table Name
    protected $table = 'courses';
    
    /* Belongs to User */
    public function user(){
        return $this->belongsTo('App\User');
    }
}
