<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    public function transaction_details(){
        return $this->hasMany('App\Transaction_detail');
    }
}
