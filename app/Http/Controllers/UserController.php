<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\statistics;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function destroy(Request $request){
        $id = $request->id;

        User::where('id',$id)->delete();
        statistics::where('user_id',$id)->delete();
        
        return redirect()->route('user-management')->with('success','User Deleted Successfully');


    }

    public function verify(Request $request){
        $id = $request->id;
        User::where('id',$id)->update([
            'isverified'=>1,
        ]);

        return redirect()->route('user-management')->with('success','User Verified Successfully');
    }

    public function store(Request $request){
        
        User::create([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'gender'=>$request->input('gender'),
            'password'=>Hash::make($request->input('password')),
            'birthday'=>null,
            'isverified'=>1,
            'firstlogin'=>0,
            'bmi'=>0,
            'role'=>1,
        ]);
        return redirect()->route('user-management')->with('success','New Administrator added Successfully');
    }

    public function changepass(Request $request){
        $id = auth()->user()->id;
        $newpassword = $request->input('password');
     
        User::where('id',$id)->update([
            'password'=> Hash::make($newpassword),
            'firstlogin'=>1,
        ]);

        return redirect()->back()->with('changesuccess','Password Changed Successfully!');

      
    }
}
