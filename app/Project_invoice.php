<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project_invoice extends Model
{
    public function projects(){
        return $this->belongsTo('App\Project');
    }

    protected $guarded = [

    ];
}
