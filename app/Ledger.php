<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ledger extends Model
{
    public function user(){
        return $this->hasMany('App\User');
    }

    public function project(){
        return $this->belongsToMany('App\Project', 'project_ledgers');
    }

    protected $guarded = [

    ];

}
