<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SignUp extends Component
{
    public $name = '';
    public $email = '';
    public $birthday = '';
    public $gender = '';
    public $password = '';

    protected $rules = [
        'name' => 'required|min:3',
        'birthday'=>'required',
        'gender'=>'required',
        'email' => 'required|email:rfc,dns|unique:users',
        'password' => 'required|min:6'
    ];

    public function mount() {
        if(auth()->user()){
        return auth()->user()->role == 0 ?
        redirect()->intended('/Information')
        :
        redirect()->intended('/dashboard'); 
        }
    }

    public function register() {

    $bmi = session()->has('bmi') ? session()->get('bmi') : 0;
     
     $this->validate();
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'birthday'=>$this->birthday,
            'gender'=>$this->gender,
            'role'=>0,
            'isverified'=>0,
            'bmi'=> $bmi,
            'password' => Hash::make($this->password)
        ]);



        auth()->login($user);
        session()->forget('bmi');


        return auth()->user()->role == 0 ?
        redirect()->intended('/Information')
        :
        redirect()->intended('/dashboard'); 
    }

    public function render()
    {
        return view('livewire.auth.sign-up');
    }
}
