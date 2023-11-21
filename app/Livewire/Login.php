<?php

namespace App\Livewire;

use Livewire\Component;

class Login extends Component
{
    public $title = 'Login';
    public $username;
    public $password;
    public $remember;

    public function login()
    {
        $this->validate([
            'username' => 'required',
            'password' => 'required',
            'remember' => 'nullable'
        ]);

        if(auth()->attempt(['username' => $this->username, 'password' => $this->password], $this->remember)){
            return redirect()->intended(route('dashboard'));
        } else {
            return $this->addError('username', 'Data tidak valid.');    
        }

    }

    public function render()
    {
        return view('livewire.login')->layout('components.layouts.auth', ['title' => $this->title]);
    }
}
