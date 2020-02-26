<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drinks extends Model
{
    protected $fillable = ['*'];

    function invoices(){
        return $this->belongsToMany('App\Invoice');
    }
}
