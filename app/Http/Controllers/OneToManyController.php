<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class OneToManyController extends Controller
{

    public function oneToMany(Request $request)
    {
        $search = $request->query('search');
        $countries = Country::where('name', 'LIKE', "%$search%")->get();

        if ($countries->isEmpty()) {
            echo 'Sem resultados';
            exit;
        }

        foreach ($countries as $country) {

            echo "<b>{$country->name}</b>" . '<br><br>';
            $states = $country->states;

            foreach ($states as $state) {
                echo $state->name . '<hr>';
            }

            echo '<br><br>';
        }

    }

    public function manyToOne()
    {
        $state_name = 'São Paulo';
        $state = State::where('name', $state_name)->get()->first();
        echo "<b>{$state->name}</b>";

        $country = $state->country;

        $country_name = $country->name;
        echo "<br> País: $country_name";
    }
 
    public function oneToManyTwo(Request $request)
    {
        $search = $request->query('search');
        $countries = Country::where('name', 'LIKE', "%$search%")->get();

        if ($countries->isEmpty()) {
            echo 'Sem resultados';
            exit;
        }

        foreach ($countries as $country) {

            echo "<b>{$country->name}</b>" . '<br><br>';
            $states = $country->states;

            foreach ($states as $state) {
                echo "<br>&nbsp&nbsp{$state->initials} - {$state->name}: ";

                echo $cities = $state->cities->implode('name',', ');
                
                echo '<hr>';
                
            }

            echo '<br><br>';
        }

    }

}
