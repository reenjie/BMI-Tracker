<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use App\Models\User;

class Login extends Component
{
    public $email = '';
    public $password = '';
    public $remember_me = false;

    protected $rules = [
        'email' => 'required|email:rfc,dns',
        'password' => 'required',
    ];

    public function mount() {
        if(auth()->user()){
    
        auth()->user()->role == 0 ?
        redirect()->intended('/Information')
        :
        redirect()->intended('/dashboard');
        
        }
        //$this->fill(['email' => auth()->user()->email, 'password' => auth()->user()->password ]);
    }

    public function login() {
        $credentials = $this->validate();
        if(auth()->attempt(['email' => $this->email, 'password' => $this->password], $this->remember_me)) {
            $user = User::where(["email" => $this->email])->first();
            auth()->login($user, $this->remember_me);

            session()->has('bmi')?
                User::where(["email" => $this->email])->update([
                    'bmi'=>session()->get('bmi'),
                ]) : "";

             
            
            return auth()->user()->role == 0 ?
            redirect()->intended('/Information')
            :
            redirect()->intended('/dashboard'); 
        }
        else{
            return $this->addError('email', trans('auth.failed')); 
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
