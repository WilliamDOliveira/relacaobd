<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Location;

class OneToOneController extends Controller
{
    //
    public function oneToOne()
    {
        // $country = Country::find(1);
        $country = Country::where('name','Brasil')->first();        
        echo $country->name;
        $location = $country->location;//chamando metodo hasTo() 
        echo "<hr>";        
        echo "Latitude: $location->latitude ";
        echo "<br>Longitude: $location->longitude ";
    }

    public function oneToOneInverse()
    {
        $latitude = 123;
        $longitude = 321;

        $location = Location::where('latitude', $latitude)
                                ->where('longitude', $longitude )
                                ->first();
        $country = $location->country;//chamando metodo belongTo()                                              
        echo "<hr>";        
        echo "Location $location->id ";    
        echo "<br>Location $country->name ";   
    }

    public function oneToOneInsert()
    {
        $dataForm = [
            'name' => 'Russia',
            'longitude' => '852',
            'latitude' => '369'
        ];

        $country = Country::create( $dataForm );
        //Aqui posso fazer isso de três jeitos
        // 1)
        // $dataForm['country_id'] = $country->id; 
        // $location = Location::create( $dataForm );
        // 2)
        // $location = new Location;
        // $location->latitude = $dataForm['latitude'];
        // $location->longitude = $dataForm['longitude'];
        // $location->country_id = $country->id;
        // $saveLocation = $location->save();
        // 3)
        $location = $country->location()->create( $dataForm );
        echo 'Create';

    }


}//Fim Class
