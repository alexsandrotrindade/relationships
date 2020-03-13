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

    public function manyToOne()
    {
        $state_name = 'São Paulo';
        $state = State::where('name', $state_name)->get()->first();
        echo "<b>{$state->name}</b>";

        $country = $state->country;

        $country_name = $country->name;
        echo "<br> País: $country_name";
    }

    public function oneToManyInsert(){

        $dataForm = [
            'name' => 'Ceará',
            'initials' => 'CE'
        ];

        $country = Country::find(1);

        $country->states()->create($dataForm);
    }

    public function oneToManyInsertTwo(){

        $dataForm = [
            'name' => 'Bahia',
            'initials' => 'BA',
            'country_id' => 1
        ];

        try{
            $insertState = State::create($dataForm);
            dump($insertState->name);
        }catch(\Exception $e){
           return redirect('/')->withErrors('The name is required2');
        }    

    }

}
