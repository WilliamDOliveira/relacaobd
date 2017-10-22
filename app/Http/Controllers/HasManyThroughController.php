<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\State;
use App\Models\Country;


class HasManyThroughController extends Controller
{
    //
    // public function hasManyThrough(){
    //     $country = Country::where( 'name' , 'Brasil')->first();
    //     $cities = $country->cities;
    //     foreach( $cities as $city ){
    //         echo "Cidade do Brasil <b>$city->name</b><br>";
    //     }
    //     echo "<br>Total de Cidade {$cities->count()}";
    //     //Retorna o total de elementos, para usar metodo é necessario usar interpolação
    // }

    // [
    //     [ 'pais' => [] , 'cidade' => [  [],[]  ] ]
    // ]

    public function hasManyThrough(){
        $countries = Country::all();
        $count = 0;
        foreach($countries  as $country){
        $cCities = 0;
            $cities = $country->cities;
            foreach( $cities as $city ){
                $arrCities[ $cCities ] = [ 'id' => $city->id , 'name' => $city->name ]; 
                $cCities += 1;               
            }
        $obj[ $count ] = [ 'Paises' => $country->name , 'Cidades' =>  $arrCities  ];
        $count += 1;
        }

        echo "<pre>";
        print_r( $obj );   
    }
    
}
