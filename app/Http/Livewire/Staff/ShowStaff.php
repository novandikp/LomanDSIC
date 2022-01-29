<?php

namespace App\Http\Livewire\Staff;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ShowStaff extends Component
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
        $user = User::find($this->selectedId);
        $user->delete();
    }

    public function updatingSearchTerm()
    {
        $this->resetPage();
    }

    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';
        return view('livewire.staff.show-staff', [
            'users' => User::where('name', 'ilike', $searchTerm)
                ->where('role', "staff")
                ->orWhere('email', 'ilike', $searchTerm)->paginate($this->limit),
        ])->extends('layouts.admin')
            ->section('content');;
    }
}
