<?php

namespace App\Http\Livewire;
use App\Models\Age;
use Livewire\Component;

class Age_controller extends Component
{
    public function render()
    {
        return view('livewire.age',[
            'data'=> Age::all(),
        ]);
    }
}
