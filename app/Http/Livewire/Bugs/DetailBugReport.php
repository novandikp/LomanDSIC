<?php

namespace App\Http\Livewire\Bugs;

use App\Models\issue_report;
use Livewire\Component;

class DetailBugReport extends Component
{

    public issue_report $report;

    public function mount($id)
    {
        $this->report = issue_report::with('users')->find($id);
    }

    public function updateStatus()
    {
        $this->report->update([
            'status' => 1
        ]);

        redirect('admin/bugs');
    }

    public function render()
    {
        return view('livewire.bugs.detail-bug-report')->extends('layouts.admin')
            ->section('content');;
    }
}
