<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    /*
    * Observe que aqui não estou importando as classes chamadas porque elas estão no mesmo diretorio
    * Então posso usar essa sintaxe Classe:class
    */
    //Preenchendo de forma visivel
    protected $fillable = [
        'name'
    ];

    //Criando relacionamento 1 para um :: Tem uma [ localização ] 1:1 
    public function location()
    {
        return $this->hasOne(Location::class);
        //Posso passar como parametro adicional o campo que está fazendo referencia, caso eu deseje especificar o campo
        //return $this->hasOne(Location::class, 'country_id');
    }

    //Criando relacionamento 1 para muitos :: Tem Muitos [ estados ] 1:N
    public function states(){
        return $this->hasMany(State::class);
    }

}
