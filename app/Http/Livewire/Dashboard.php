<?php

namespace App\Http\Livewire;
use App\Models\ranges;
use App\Models\User;
use App\Models\statistics;
use App\Models\random__bmi;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        session()->forget('Temp_userBMI');
        session()->forget('bmi');
        return view('livewire.dashboard',[
            'ranges'=>ranges::all(),
            'User' => User::all(),
            'Pending'=> User::where('isverified',0)->get(),
            'statistics'=>statistics::all(),
            'random_bmi'=>random__bmi::all(),
        ]);
    }
}
