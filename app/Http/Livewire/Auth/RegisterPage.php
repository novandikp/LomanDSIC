<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class RegisterPage extends Component
{
    public  $user = [];

    protected $rules = [
        'user.email' => 'required|email|unique:users,email',
        'user.password' => 'required|min:8',
        'user.nohp' => 'required|numeric',
        "user.name" => 'required'

    ];
    protected $validationAttributes = [
        'user.email' => 'email',
        'user.password' => 'password',
        'user.nohp' => 'no hp',
        'user.name' => 'nama',
    ];

    public function register()
    {
        $this->validate();
        $credentials =  $this->user;
        $this->user['role'] = "donatur";
        $this->user['password'] = Hash::make($this->user['password']);
        User::create($this->user);
        if (Auth::attempt($credentials)) {
            return redirect('');
        }
    }

    public function render()
    {
        return view('livewire.auth.register-page')->extends('layouts.auth')
            ->section('content');;
    }
}
