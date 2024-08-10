<?php

namespace Modules\Auth\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AuthFormComponent extends Component
{
    // Form fields

    public $email;

    public $password;

    public $keepLogged;

    // Other fields

    private array $rules = [
        'email' => 'email|required',
        'password' => 'string|min:6|max:32|required',
    ];

    public function render()
    {
        return view('auth::livewire.auth-form');
    }

    public function submit()
    {
        $credentials = $this->validate($this->rules);

        if(Auth::attempt($credentials)) {
            request()->session()->regenerate();

            return redirect('/');
        }

        return $this->dispatch('incorrect-data');
    }
}
