<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function project_invoices(){
        return $this->hasMany('App\Project_invoice');
    }

    public function users(){
        return $this->belongsTo('App\User', 'project_leader_id', 'id');
    }

    public function ledger(){
        return $this->belongsToMany('App\Ledger', 'project_ledgers');
    }

    protected $guarded = [

    ];
}
