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
        // dd($country); 
    }
}
