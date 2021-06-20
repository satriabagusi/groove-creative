<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction_detail extends Model
{
    public function supply(){
        return $this->belongsTo('App\Supply');
    }

    public function transactions(){
        return $this->belongsTo('App\Transaction');
    }
}
