<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Company;

// use App\Models\State;
// use App\Models\Country;

class ManyToManyController extends Controller
{
    //Exibi as empresas que estão em uma cidade
    public function manyToMany()
    {
        $city = City::where( 'name' , 'Osasco' )->get()->first(); 
        echo "<hr><b>$city->name</b><br>";
        $companies = $city->companies;
        foreach( $companies as $company ){
            echo "<em>$company->name</em><br>";            
        }
    }
    //Exibi as cidades que determinada empresa se encontra
    public function manyToManyInverse()
    {
        $company = Company::where( 'name' , 'carrefour' )->get()->first(); 
        echo "<hr><b>$company->name</b><br>";
        $cities = $company->cities;
        foreach( $cities as $city ){
            echo "<em>$city->name</em><br>";
        }        
    }
    public function manyToManyInsert()
    {
        $dataForm = [ 1 , 2 , 3 , 4 ];//Recebe as ids referentes as cidades em um form/api/post/etc

        $company = Company::where( 'name' , 'Samsung' )->get()->first(); //recupera a empresa por nome

        // $cities = $company->cities()->attach( $dataForm );//anexa as ids ao formulário, porem anexa itens repetidos

        $cities = $company->cities()->sync( $dataForm );//anexa as ids ao formulário, no entanto não anexa item repetidos! 
        //e se um item for apagado ele tbm delete,ele syncroniza os dados!

        //$company->cities()->detach([4]);//Ele desanexa, ou remove os itens, pode se passar dentro dele o valor a ser removido como unidade, ou array, se não passar nada ele ira remover tudo

        echo "<hr><b>$company->name</b><br>";//faz o loop e apresenta os dados
        $cities = $company->cities;
        foreach( $cities as $city ){
            echo "<em>$city->name</em><br>";
        }     

    }
}
