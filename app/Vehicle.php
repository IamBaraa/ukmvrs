<?php

namespace UKMVRS;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    public function user(){
        return $this->belongsTo('UKMVRS\User');
    }

    public function rentalRecord(){
        return $this->hasMany('UKMVRS\RentalRecord');
    }
}
