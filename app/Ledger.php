<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ledger extends Model
{
    public function user(){
        return $this->hasMany('App\User');
    }

    public function ledger_type(){
        return $this->hasMany('App\Ledger_type');
    }
}
