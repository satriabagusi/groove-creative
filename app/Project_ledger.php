<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project_ledger extends Model
{
    //

    public function ledger(){
        return $this->belongsTo('App\Ledger');
    }

    protected $guarded = [

    ];
}
