<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    public function fingerprints(){
        return $this->belongsTo('App\Fingerprint');
    }
}
