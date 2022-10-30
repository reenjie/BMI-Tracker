<?php

namespace App\Http\Livewire;
use App\Models\recommendation;
use App\Models\ranges;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
class Bmi extends Component
{
  
    public function render()
    {
        $recommendation = DB::select('select * from recommendations limit 4'); 
        return view('livewire.bmi',[
            'recommendation'=>$recommendation, 
        ]);
    }
}
