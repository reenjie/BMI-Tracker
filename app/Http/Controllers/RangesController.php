<?php

namespace App\Http\Controllers;

use App\Models\ranges;
use Illuminate\Http\Request;

class RangesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       return view('livewire.ranges');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ranges  $ranges
     * @return \Illuminate\Http\Response
     */
    public function show(ranges $ranges)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ranges  $ranges
     * @return \Illuminate\Http\Response
     */
    public function edit(ranges $ranges)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ranges  $ranges
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ranges $ranges)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ranges  $ranges
     * @return \Illuminate\Http\Response
     */
    public function destroy(ranges $ranges)
    {
        //
    }
}
