<?php

namespace App\Http\Livewire;

use App\Models\donation_program;
use App\Models\User;
use Livewire\Component;

class DashboardAdmin extends Component
{
    public function render()
    {
        return view('livewire.dashboard-admin', [
            'users' => User::where('role', 'donatur')->orderBy('created_at', 'DESC')->limit(5)->get(),
            'programs' => donation_program::orderBy('created_at', 'DESC')->limit(5)->get()

        ])->extends('layouts.admin')
            ->section('content');;
    }
}
