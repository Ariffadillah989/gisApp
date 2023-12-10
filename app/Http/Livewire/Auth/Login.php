<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;


class Login extends Component
{
    public $email, $password, $remember;

    public function render()
    {
        return view('livewire.auth.login')->extends('layouts.app')->section('content');
    }

    public function rules()
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required'],
        ];
    }   

    public function loginUser()
    {
        $this->validate();

        if(!Auth::attempt($this->only(['email','password']), $this->remember)){
            $this->addError('email',_('auth.failed'));
            return null;
        }
        
        return redirect()->to(RouteServiceProvider::HOME);
    }
}
