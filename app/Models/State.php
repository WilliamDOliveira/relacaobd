<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = [
        'name',
        'initials',
        'country_id'
    ];

    //Pertence a um pais 1:N
    function country(){
        return $this->belongsTo( Country::class );
    }

    public function cities(){
        return $this->hasMany( City::class );
    }
}
