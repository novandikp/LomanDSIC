<?php

namespace App\Http\Livewire\Staff;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class EditStaff extends Component
{
    public $name;
    public $email;
    public $password;
    public $nohp;
    public User $users;


    public function mount($id)
    {
        $this->users = User::find($id);
        $this->email = $this->users->email;
        $this->name = $this->users->name;

        $this->nohp = $this->users->nohp;
    }



    public function save()
    {
        $data = $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->users->id,
            'password' => 'nullable|min:8',
            'nohp' => 'required|numeric|min:7'
        ]);
        if ($data['password']) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }
        $data['role'] = "staff";
        $this->users->update($data);
        redirect("/admin/staff");
    }


    public function render()
    {
        return view('livewire.staff.edit-staff')->extends('layouts.admin')
            ->section('content');;
    }
}
