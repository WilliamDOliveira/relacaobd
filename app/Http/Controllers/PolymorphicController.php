<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\State;
use App\Models\Country;
use App\Models\Commentary;

class PolymorphicController extends Controller
{
    //Recuperando dados atraves de polimorfico
    public function polymorphic(){
        //Comentarios da cidade
        // $city = City::where( 'name' , 'São Paulo' )->first();
        // echo $city->name;
        // $comments = $city->comments()->get();
        // foreach( $comments as $comment ){
        //     echo "<p>$comment->description<p>";
        // }

        //Comentarios do Estado
        // $state = State::where( 'name' , 'Acre' )->first();
        // echo $state->name;
        // $comments = $state->comments()->get();
        // foreach( $comments as $comment ){
        //     echo "<p>$comment->description<p>";
        // }

        //Comentarios do pais
        $country = Country::where( 'name' , 'Brasil' )->first();
        echo $country->name;
        $comments = $country->comments()->get();
        foreach( $comments as $comment ){
            echo "<p>$comment->description<p>";
        }
    }


    //Inserindo dados no comentario escolhendo entre cidade estado pais
    public function polymorphicInsert(){
        $date = date('YmdHis');
        
        //Comentando no pais
        // $country = Country::where('name','Brasil')->first();
        // $commentableCountry = $country->comments()->create([
        //     'description' => "$country->name é uma pais que foi vistas na data: $date"
        // ]);
        // echo var_dump($commentableCountry);

        //Comentando um estado
        // $state = State::where('name','Bahia')->first();
        // $commentableState = $state->comments()->create([
        //     'description' => "$state->name é um estado que foi visto na data: $date"
        // ]);
        // echo var_dump($commentableState->description);

        // Comentando na cidade
        $city = City::where( 'name' , 'São Paulo' )->first();
        echo $city->name.'<br>';
        $commentsCity = $city->comments()->create([
            'description' => "$city->name é uma cidade que foi vistas na data: $date",
        ]);
        echo var_dump($commentsCity->description);
    }
}
