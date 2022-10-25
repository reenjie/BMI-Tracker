<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SignUp extends Component
{
    public $name = '';
    public $email = '';
    public $age = '';
    public $gender = '';
    public $password = '';

    protected $rules = [
        'name' => 'required|min:3',
        'age'=>'required',
        'gender'=>'required',
        'email' => 'required|email:rfc,dns|unique:users',
        'password' => 'required|min:6'
    ];

    public function mount() {
        if(auth()->user()){
            redirect('/dashboard');
        }
    }

    public function register() {

        
     $this->validate();
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'age'=>$this->age,
            'gender'=>$this->gender,
            'role'=>0,
            'isverified'=>0,
            'password' => Hash::make($this->password)
        ]);

        auth()->login($user);

        return redirect('/dashboard'); 
    }

    public function render()
    {
        return view('livewire.auth.sign-up');
    }
}
