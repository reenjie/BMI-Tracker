<?php

namespace App\Http\Controllers;
use App\Models\random__bmi;
use App\Models\statistics;
use App\Models\random_bmi;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function ter(Request $request){
     $pa =  $request->input('kcal');
     $randbmi = random__bmi::where('id',auth()->user()->bmi)->get();
     
     $height = $randbmi[0]->height;
     $weight = $randbmi[0]->weight;
     $bmi = $randbmi[0]->bmi;
     
        /* Get DBW  Desired Body Weight */

     $feet = $height * 0.0328084;  
 //   $feet = 5.7;
     $dl = explode('.', $feet);
     $first = $dl[0];
     $foot = '';
    $decimals = substr($dl[1],0,2);
      
  
 
   if(auth()->user()->gender == 'Male'){
      /* Male Calculation */

    if($first > 5){
     
    $lapse = $first - 5;
    $templbs = $lapse * 12;
    $flbs = $templbs + $decimals;
    $lbs = $flbs * 4;
   
     $tempDBW = 112 + $lbs;
     $rdbw = $tempDBW * 0.45359237;

     $DBW = round($rdbw,2);


    }else if($first < 5){


     $tempD = 12 - $decimals;
     $flbs =  $tempD * 4;
    
 
     $tempDBW = 112 - $flbs; 
     $rdbw = $tempDBW * 0.45359237;

    $DBW = round($rdbw,2);



   }else if ($first == 5){
    $tempDBW = 112 + $decimals * 4; 
   
    $rdbw = $tempDBW * 0.45359237;

    $DBW = round($rdbw,2);
 
        }
      
   }else {
      /* Female Calculation */

      if($first > 5){
     
        $lapse = $first - 5;
        $templbs = $lapse * 12;
        $flbs = $templbs + $decimals;
        $lbs = $flbs * 4;
       
         $tempDBW = 106 + $lbs;
         $rdbw = $tempDBW * 0.45359237;

         $DBW = round($rdbw,2);
    
    
        }else if($first < 5){
    
    
         $tempD = 12 - $decimals;
         $flbs =  $tempD * 4;
        
     
         $tempDBW = 106 - $flbs; 
         $rdbw = $tempDBW * 0.45359237;

         $DBW = round($rdbw,2); 
    
    
    
       }else if ($first == 5){
        $tempDBW = 106 + $decimals * 4; 
        $rdbw = $tempDBW * 0.45359237;

        $DBW = round($rdbw,2);
     
            }
   }

    $conclusion = DB::select('SELECT * FROM `ranges` WHERE '.$bmi.' BETWEEN start and end');
    if(sizeof($conclusion) >=1 ){
        $bmi_Conclusion = $conclusion[0]->conclusion; 
    }else {
        $bmi_Conclusion = 0;
    }
   
    $TER = 'UnIdentified';
    switch ($bmi_Conclusion) {
    case 'Normal':
        $TER = $DBW * $pa;
    break;

    case 'OverWeight':
        $TER = $DBW * $pa - 500;
    break;

    case 'UnderWeight':
        $TER = $DBW * $pa + 500;
    break;

    case 'Obese':
        # code...
    break;
    
 
   }
 
   statistics::create([
    'user_id' => auth()->user()->id,
    'DBW' =>$DBW ,
    'TER' => $TER,
    'PA' => $pa,
   ]);
  
   return redirect()->route('Information');
        

    }

    public function Recalculate(){
        $id = auth()->user()->id;

        User::where('id',$id)->update([
            'bmi'=> 0,
        ]);
        statistics::where('user_id',$id)->delete();

    return redirect()->route('Information');
    }


}
