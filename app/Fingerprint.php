<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fingerprint extends Model
{
    public function attendances(){
        return $this->hasMany('App\Attendance');
    }

    public function employees(){
        return $this->belongsTo('App\Employee');
    }
}
