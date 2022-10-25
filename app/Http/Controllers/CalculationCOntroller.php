<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class CalculationCOntroller extends Controller
{
    public function bmi(Request $request){
   $height = $request->height;
   $weight = $request->weight;
        
        $converted_to_m = $height / 100;
        $Unrounded = $weight / ($converted_to_m * $converted_to_m);

        $BMI = round($Unrounded * 100) / 100;

        session()->put('Temp_userBMI',$BMI);

        return redirect()->route('rand.store',[
            'height'=> $height,
            'weight' => $weight,
            'BMI'=>$BMI,
        ]);

       // return redirect('/BMI');
       
    }
}
