<?php

namespace App\Http\Livewire\Rewards;

use App\Models\reward;
use Livewire\Component;

class EditReward extends Component
{
    public $reward;
    public $minimal; //
    public reward $rewards;

    public function mount($id)
    {
        $this->rewards = reward::find($id);
        $this->reward = $this->rewards->reward;
        $this->minimal = $this->rewards->minimal;
    }




    public function save()
    {
        $data = $this->validate([
            'minimal' => 'required|numeric|unique:rewards,minimal,' . $this->rewards->id,
            'reward' => 'required',
        ]);

        $this->rewards->update($data);
        redirect("/admin/rewards");
    }

    public function render()
    {
        return view('livewire.reward.edit-reward')->extends('layouts.admin')
            ->section('content');
    }
}
