<?php

namespace App\Http\Controllers;
use App\Models\Age;
use App\Models\recommendation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AgeController extends Controller
{
    public function store(Request $request){
   
   $start = $request->input('start');
     $end   = $request->input('end'); 
     



        if($start > $end){
            //error
          return redirect()->route('Age-ranges')->with('error','Start Should Be Greater than the END field');
        }else if ($start == $end) {
            return redirect()->route('Age-ranges')->with('error','Start Should Be Less than the END field');
        }else {

                
                $least = DB::select('select * from `ages` where start BETWEEN '.$start.' and '.$end.' or  end BETWEEN '.$start.' and '.$end.' ');
              
               if(sizeof($least)<=0){
                Age::create([
                    'start'=>$start,
                    'end'=> $end,
                ]);

                return redirect()->route('Age-ranges')->with('success','Range Added Successfully!');
                }else {
                    return redirect()->route('Age-ranges')->with('error','Range already exist');
                }
     
          


        }

    }

    public function destroy(Request $request){
        Age::where('id',$request->id)->delete();
        recommendation::where('ageID',$request->id)->delete();


        return redirect()->route('Age-ranges')->with('success','Range Deleted Successfully!');
    }
}
