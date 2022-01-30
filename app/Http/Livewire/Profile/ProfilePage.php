<?php

namespace App\Http\Livewire\Profile;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProfilePage extends Component
{

    public User $user;
    public $layout = "admin";
    public $name, $nohp;
    public $password, $password_confirmation, $old_password;


    protected  $listener = ['confirmed'];

    public function confirmed($mode)
    {
        return $mode;
    }

    public function validatedData()
    {
        $this->validate();
        $this->emit('confirmed', 1);
    }

    public function validatedPass()
    {
        $this->validate([
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required',
            'old_password' => 'required'
        ]);
        $this->emit('confirmed', 2);
    }


    protected $rules = [
        'name' => 'required',
        'nohp' => 'required|numeric'
    ];


    public function setPassword()
    {
        $this->validate([
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required',
            'old_password' => 'required'
        ]);
        $this->user->update(['password' => bcrypt($this->password)]);
    }

    public function save()
    {
        $data = $this->validate();
        $this->user->update($data);
    }

    public function mount()
    {
        $this->user = Auth::user();
        if ($this->user->role == "staff") {
            $this->layout = "admin";
        } else {
            $this->layout = "app";
        }
        $this->name = $this->user->name;

        $this->nohp = $this->user->nohp;
        // dd($this->user);
    }

    public function render()
    {
        return view('livewire.profile.profile-page')->extends('layouts.' . $this->layout)
            ->section('content');
    }
}
