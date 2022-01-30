<?php

namespace App\Http\Livewire\Bugs;

use App\Models\issue_report;
use Livewire\Component;
use Livewire\WithPagination;

class BugReport extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchTerm;
    public $selectedId;
    public $limit = 10;
    public function setId($id)
    {
        $this->selectedId = $id;
    }

    public function updateStatus()
    {
        issue_report::where('id', $this->selectedId)->update(['status' => '1']);
    }

    public function updatingSearchTerm()
    {
        $this->resetPage();
    }


    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';


        return view('livewire.bugs.bug-report', [
            'bugs' => issue_report::with('users')->whereRaw("(title ilike ? OR description ilike ? )", array($searchTerm, $searchTerm))->orderBy('created_at', 'DESC')->paginate($this->limit),
        ])->extends('layouts.admin')
            ->section('content');
    }
}
