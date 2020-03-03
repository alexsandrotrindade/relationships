<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Location;

class OneToOneController extends Controller
{
    public function oneToOne(){
        $country = Country::where('name','Brasil')->get()->first();
        dump($country->location->latitude);
        echo $country->name;
        echo "<br>Latitude: ". $country->location->latitude;
        echo "<br>Longitude: ". $country->location->longitude;
    }
    
    public function oneToOneInverse(){
        $latitude = 123;
        $longitude = 321;
        $location = Location::where('latitude',$latitude)
                            ->where('longitude',$longitude)
                            ->get()
                            ->first();

        $location_country = $location->country;
        dump($location_country->name);
    }

    public function oneToOneInsert(){
        $dataForm = [
            'name' => 'Alemanha',
            'latitude' => 890,
            'longitude' => '098'
        ];

        // Country::where('name',$dataForm['name'])->delete();
        //die;
        
        $country = Country::create($dataForm);
        
        $location = $country->location()->create($dataForm);


    }
}
