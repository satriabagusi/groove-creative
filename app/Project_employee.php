<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project_employee extends Model
{
    public function users(){
        return $this->belongsTo('App\User');
    }

    public function projects(){
        return $this->belongsTo('App\Project');
    }
}
