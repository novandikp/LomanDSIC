<?php

namespace App\Http\Livewire\Staff;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class AddStaff extends Component
{
    public $name;
    public $email;
    public $password;
    public $nohp;
    protected $rules = [
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8',
        'nohp' => 'required|numeric|min:7'
    ];

    public function save()
    {
        $data = $this->validate();
        $data['role'] = "staff";
        $data['password'] = Hash::make($data['password']);
        User::create($data);
        redirect("/admin/staff");
    }


    public function render()
    {
        return view('livewire.staff.add-staff')->extends('layouts.admin')
            ->section('content');;
    }
}
