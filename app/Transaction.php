<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function transaction_details(){
        return $this->hasMany('App\Transaction_detail');
    }

    public function users(){
        return $this->belongsTo('App\User');
    }
}
