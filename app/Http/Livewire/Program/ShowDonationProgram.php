<?php

namespace App\Http\Livewire\Program;

use App\Models\donation_program;
use App\Models\image_donation;
use Livewire\Component;
use Livewire\WithPagination;

class ShowDonationProgram extends Component
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

    public function deleteId($id)
    {
        $this->selectedId = $id;
    }

    public function delete()
    {
        $program = donation_program::find($this->selectedId);
        $images = image_donation::where('donation_program_id', $this->selectedId);
        foreach ($images as $image) {
            delete_cloud($image->image, 'donation');
        }
        $images->delete();
        $program->delete();
    }
    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';
        return view('livewire.program.show-donation-program', [
            'program' => donation_program::where('title', 'ilike', $searchTerm)->paginate($this->limit),
        ])->extends('layouts.admin')
            ->section('content');
    }
}
