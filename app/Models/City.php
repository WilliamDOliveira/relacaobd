<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    
    
    //Cidade pertence a um estado 1:N
    public function state()
    {
        return $this->belongsTo( State::class );
    }

    //Cidade pertence a muitas companies -> relacionamento N:N
    public function companies()
    {
        return $this->belongsToMany(Company::class,'city_company');
    }

}
