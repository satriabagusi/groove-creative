<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function project_invoices(){
        return $this->hasMany('App\Project');
    }

    public function users(){
        return $this->belongsTo('App\User', 'project_leader_id', 'id');
    }

    protected $guarded = [

    ];
}
