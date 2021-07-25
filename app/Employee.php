<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function fingerprints(){
        return $this->hasMany('App\Fingerprint');
    }

    public function users(){
        return $this->hasMany('App\User');
    }


    protected $fillable = [
        'name',
        'email',
        'phone_number'
    ];
}
