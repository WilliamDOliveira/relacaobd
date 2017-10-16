<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    
    //Pertence a um pais 1:N
    function country(){
        return $this->belongsTo( Country::class );
    }

    public function cities(){
        return $this->hasMany( City::class );
    }
}
