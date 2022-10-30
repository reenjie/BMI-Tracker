<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\statistics;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function destroy(Request $request){
        $id = $request->id;

        User::where('id',$id)->delete();
        statistics::where('user_id',$id)->delete();
        
        return redirect()->route('user-management')->with('success','User Deleted Successfully');


    }
}
