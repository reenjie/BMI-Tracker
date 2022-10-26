<?php

namespace App\Http\Livewire;
use App\Models\ranges;
use Livewire\Component;

class Ranges_model extends Component
{
    public ranges $ranges;

    public function mount(){
       // $this->ranges = ranges::all();
    }

    public function render()
    {
  
     return view('livewire.ranges',[
        'data'=>ranges::all(),
     ]); 
    }
}
