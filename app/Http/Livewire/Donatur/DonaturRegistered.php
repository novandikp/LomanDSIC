<?php

namespace App\Http\Livewire\Donatur;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class DonaturRegistered extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchTerm;
    public $selectedId;
    public $limit = 10;

    public function updatingSearchTerm()
    {
        $this->resetPage();
    }


    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';
        return view('livewire.donatur.donatur-registered', [
            'users' => User::where('role', 'donatur')
                ->whereRaw("(name ilike ? OR email ilike ? )", array($searchTerm, $searchTerm))
                ->orderBy('created_at', 'DESC')->paginate($this->limit),
        ])->extends('layouts.admin')
            ->section('content');
    }
}
