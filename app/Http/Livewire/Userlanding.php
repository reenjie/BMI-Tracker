<?php

namespace App\Http\Livewire;
use App\Models\User;
use App\Models\random__bmi;
use App\Models\recommendation;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
class Userlanding extends Component
{
    public function render()
    {   
        $userBMI =DB::select('select bmi from users where id = '.auth()->user()->id.' ');
      $userStatistics = DB::select('select * from statistics where user_id = '.auth()->user()->id.' and status = 0 ');

      $userStatisticsl = DB::select('select * from statistics where user_id = '.auth()->user()->id.' and status = 1 ');
        
        
      $info =random__bmi::where('id',auth()->user()->bmi)->get();
   
      
        if(sizeof($info) >=1 ){
            $bmi = $info[0]->bmi; 
        }else {
            $bmi = 0;
        }
      $conclusion = DB::select('SELECT * FROM `ranges` WHERE '.$bmi.' BETWEEN start and end');
      if(sizeof($conclusion) >=1 ){
        $bmi_Conclusion = $conclusion[0]->conclusion; 
        $rangeID = $conclusion[0]->id; 
    }else {
        $bmi_Conclusion = 0;
        $rangeID=0;
    }
        $userage = date('Y') - date('Y',strtotime(auth()->user()->birthday));
        
        $checkage = DB::select('Select * from `ages` where '.$userage.'  BETWEEN start and end  ');

        if(sizeof($checkage)>=1){
            $age = $checkage[0]->id;
        }else {
            $age = 0;
        }


        $recommendation = recommendation::where('rangeID',$rangeID)->where('ageID',$age)->get();
    
        
     
         return view('livewire.userlanding',[
      'userBMI' => $userBMI[0]->bmi,
        'userStatistics'=> $userStatistics,
        'userStatisticsl'=>$userStatisticsl,
        'info'=>$info,
        'bmi_Conclusion'=> $bmi_Conclusion,
        'recommendation'=>$recommendation,
        'rangeID'=>$rangeID
       ]); 
    }
}
