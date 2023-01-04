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
        Mealplan::create([
            'dayid'=>$dayid,
            'schedule'=>$schedule,
            'content'=>$content,
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
}
