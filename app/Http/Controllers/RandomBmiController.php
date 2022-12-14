<?php

namespace App\Http\Controllers;

use App\Models\random__bmi;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\statistics;

class RandomBmiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
       
    $bmi =  random__bmi::create([
       'height' => $request->height,
       'weight' => $request->weight,
       'bmi'    => $request->BMI,
       'ip'     => $request->ip(),
       ]); 
       
       if(auth()->user()){
                



            User::where('id',auth()->user()->id)->update([
                'bmi'=> $bmi->id,
            ]);

            return redirect()->route('Information');

       }else {
        session()->put('bmi',$bmi->id);
        return redirect('/BMI');
       }
     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\random__bmi  $random__bmi
     * @return \Illuminate\Http\Response
     */
    public function show(random__bmi $random__bmi)
    {
        //
    }

 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\random__bmi  $random__bmi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, random__bmi $random__bmi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\random__bmi  $random__bmi
     * @return \Illuminate\Http\Response
     */
    public function destroy(random__bmi $random__bmi)
    {
        //
    }
}
