<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home(){
        return view('welcome');
    }

    public function about(){

            return view('about');
            $names =['karim', 'lars', 'dennis', 'lukas'];
        
            $grades =[
                'php' => 7.9,
                'c#' => 8.0,
                'html' => 7.5,
            ];
            $me =[
                'leeftijd' => 21,
                'lengte' => 1.75,
                'geboorteplaats' => 'Dordrecht',
                'woonplaats' => 'Papendrecht',
                'gewicht' => 68,
                'oogkleur' => 'grijs',
                'geboorteJaar' => 2001,
                'werkend' => true,
                'hobby' => ['lezen', 'anime', 'fitness'],
            ];
            // return $me['hobbies'][1];
            return view ('contact', [
                'me' => $me,
                'names' => $names,
                'grades' => $grades
            ]);
       
        
    }
}
