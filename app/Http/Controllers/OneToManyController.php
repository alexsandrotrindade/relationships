<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use App\Models\Country;

class OneToManyController extends Controller
{
    
    public function oneToMany(){
        $country = Country::where('name','Brasil')->get()->first();
    }
}
