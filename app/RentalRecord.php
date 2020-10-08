<?php

namespace UKMVRS;

use Illuminate\Database\Eloquent\Model;

class RentalRecord extends Model
{
    public function vehicles(){
        return $this->belongsTo('UKMVRS\Vehicle');
    }

    public function user(){
        return $this->belongsTo('UKMVRS\User');
    }
}
