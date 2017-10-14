<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //
    protected $fillable = [
        'name'
    ];

    //Criando relacionamento 1 para um :: Tem uma localização
    public function location()
    {
        return $this->hasOne(Location::class);
        //Posso passar como parametro adicional o campo que está fazendo referencia, caso eu deseje especificar o campo
        //return $this->hasOne(Location::class, 'country_id');
    }

}
