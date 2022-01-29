<?php

namespace App\Http\Livewire\Rewards;

use App\Models\reward;
use Livewire\Component;
use Livewire\WithPagination;

class ShowReward extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchTerm;
    public $selectedId;
    public $limit = 10;

    public function deleteId($id)
    {
        $this->selectedId = $id;
    }

    public function delete()
    {
        $reward = reward::find($this->selectedId);
        $reward->delete();
    }

    public function updatingSearchTerm()
    {
        $this->resetPage();
    }

    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';
        return view('livewire.reward.show-reward', [
            'rewards' => reward::where('reward', 'ilike', $searchTerm)->orWhere('minimal', 'ilike', $searchTerm)->orderBy('minimal')->paginate($this->limit),
        ])->extends('layouts.admin')
            ->section('content');;
    }
}
