<?php

namespace App\Http\Controllers;

use App\Models\recommendation;
use Illuminate\Http\Request;

class RecommendationController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        
        $rangeID = $request->input('rangeID');
        $ageID   = $request->input('ageID');
        $content = $request->input('content');

        recommendation::create([
            'rangeID'=>$rangeID,
            'ageID'  => $ageID,
            'contents' => $content,
       
        ]);

        return redirect()->route('Recommendation')->with('success','Recommendation added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\recommendation  $recommendation
     * @return \Illuminate\Http\Response
     */
    public function show(recommendation $recommendation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\recommendation  $recommendation
     * @return \Illuminate\Http\Response
     */
    public function edit(recommendation $recommendation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\recommendation  $recommendation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       $content = $request->input('content');
       $id = $request->input('id');
       recommendation::where('id',$id)->update([
        'contents'=>$content,

       ]);
       return redirect()->route('Recommendation')->with('success','Recommendation Updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\recommendation  $recommendation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
       $id = $request->id;
       recommendation::where('id',$id)->delete();
       return redirect()->route('Recommendation')->with('success','Recommendation deleted successfully!');
    }
}
