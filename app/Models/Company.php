<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    function cities()
    {
        //Uma compania pertence a muitas cidades N:N
        return $this->belongsToMany(City::class);
        // Pode se chamar das formas abaixo também
        // belongsToMany(Classe , nomedatabela , chavesestranheirasdereferencia );
        // return $this->belongsToMany(City::class,'city_company','company_id','city_id');        
        // return $this->belongsToMany('App\Models\City','city_company','company_id','city_id');
    }
}
