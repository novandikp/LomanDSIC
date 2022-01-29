<?php

namespace App\Http\Livewire\Rewards;

use App\Models\reward;
use Livewire\Component;

class AddReward extends Component
{
    public $reward;
    public $minimal;
    protected $rules = [
        'reward' => 'required',
        'minimal' => 'required|numeric|unique:rewards,minimal',
    ];

    public function save()
    {
        $data = $this->validate();
        reward::create($data);
        redirect("/admin/rewards");
    }


    public function render()
    {
        return view('livewire.reward.add-reward')->extends('layouts.admin')
            ->section('content');;
    }
}
