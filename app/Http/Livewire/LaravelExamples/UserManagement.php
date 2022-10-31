<?php

namespace App\Http\Livewire\LaravelExamples;
use App\Models\User;
use App\Models\random__bmi;
use Livewire\Component;
use App\Models\statistics;

class UserManagement extends Component
{
    public function render()
    {
        return view('livewire.laravel-examples.user-management',[
            'users'=> User::all(),
            'random_bmi'=> random__bmi::all(),
            'statistics'=>statistics::all(),
        ]);
    }
}
