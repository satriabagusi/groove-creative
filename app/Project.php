<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function project_invoices(){
        return $this->hasMany('App\Project');
    }

    public function project_employees(){
        return $this->hasMany('App\Project_employee');
    }
}
