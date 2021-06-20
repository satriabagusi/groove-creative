<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ledger_type extends Model
{
    public function ledger(){
        return $this->belongsTo('App\Ledger');
    }

}
