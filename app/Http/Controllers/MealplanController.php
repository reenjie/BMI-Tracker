<?php

namespace App\Http\Controllers;
use App\Models\Mealplan;
use Illuminate\Http\Request;

class MealplanController extends Controller
{
    public function saveplan(Request $request){
      
        $schedule = $request->schedule;
        $content  = $request->content;
        $dayid    = $request->dayid;
        $rangeid  = $request->rangeid;
        Mealplan::create([
            'dayid'=>$dayid,
            'schedule'=>$schedule,
            'content'=>$content,
            'rangeid'=>$rangeid,
        ]);

        return redirect()->Back()->with('success','Meal-Plan successfully Saved!');

    }

    public function updatecontent(Request $request){
        $id = $request->id;
        $content = $request->content;
        
        Mealplan::where('id',$id)->update([
            'content'=>$content,
        ]);

    }

    public function manage(Request $request){
      $rangeid = $request->range;

      //return view('livewire.meal_managepage',compact('rangeid'));
    }

    public function mealcontent(Request $request){
        $rangeid = $request->range;
        $day     = $request->day;
        return view('livewire.meal_content',compact('rangeid','day'));

    }
}
