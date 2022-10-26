<?php

namespace App\Http\Livewire;
use App\Models\recommendation;
use App\Models\ranges;
use App\Models\Age;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Recommendation_model extends Component
{   
    public $filtered = '';
    public function render()
    {
        return view('livewire.recommendation',[
            'data'=> recommendation::all(),
            'ranges'=>DB::select('select * from ranges where id in (select rangeID from recommendations)'),
            'age'=>Age::all(),
        ]);
    }
}
