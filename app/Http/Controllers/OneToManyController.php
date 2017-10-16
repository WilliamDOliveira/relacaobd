<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\State;
use App\Models\Country;

class OneToManyController extends Controller
{
    //Observe primeiro eu entro na classe, com o comando de acesso ao banco e apos eu chamo seu metodo hasMany(state)
    public function oneToMany()
    {
        //Selecionando 1 pais por nome brasil
        // $country = Country::where('name','Brasil')->first();

        //selecionando varios paises pela busca
        $keySearch = 'a';//Esse keySearch poderia ser um valor de busca emitido pelo usuário atraves de ajax, post input ou forma similar
        // $countries = Country::where('name','LIKE', "%$keySearch%")->get();

        /* Trazendo o relacionamento junto com a consulta hasMany(states) */
        $countries = Country::where( 'name' , 'LIKE' , "%$keySearch%" )->with('states')->get(); 
        // dd($countries);

        foreach( $countries as $country ){
            
            $states = $country->states()->get();//Pego todos os states
            // $states = $country->states()->where('initials','BA')->get();
            echo "";
            echo "<br><hr>Pais:<b> $country->name </b><br>";
            foreach( $states as $state ){
                echo "ID: $state->id Nome: $state->name Initials: $state->initials <br>";
            }
        }      

        //Posso recuperar as informações de states em formato de metodo ou atributo seguem formas abaixo
        // $states = $country->states;
        // $states = $country->states()->get();

        //A vantagem de trazer em formato de metodo é que é possivel fazer condições durante a busca, lembrese de usar o get()
        //Pode se passar varios where, like, e outros filtros
        // $states = $country->states()->where('initials','BA')->get();

        // foreach( $states as $state ){
        //     echo "ID: $state->id Nome: $state->name Initials: $state->initials <br>";
        // }
    }

    public function manyToOne()
    {
        $stateName = 'Bahia';
        $state = State::where( 'name' , $stateName )->first();
        $country = $state->country()->get()->first();
        // $country = $state->country; Ou posso fazer dessa forma
        //Acima estou pegando somente o primeiro campo encontrado, se retirar o first() ele vem como um array e precisa
        //ser tratado como array, para evitar isso se desejar pode puxar somente como atributo para pegar o primeiro campo
        echo "Pais: $country->name";
    }

    public function onToManyTwo(){
        $country = Country::where( 'name' , 'Brasil' )->first();
        echo "<br><hr><b>$country->name</b><br>";
        $states = $country->states;
        // Loop para trazer todos os array
        foreach( $states as $state ){
            //Todos estados
            echo "<hr><b>Estado</b><br>ID: $state->id Nome: $state->name Initials: $state->initials <br>";
            //Todas cidades
            foreach( $state->cities as $city ){
                echo "<b>cidade:</b><em> $city->name </em><br>";
            }
        }
        
    }

}
