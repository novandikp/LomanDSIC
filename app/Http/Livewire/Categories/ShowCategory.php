<?php

namespace App\Http\Livewire\Categories;

use App\Models\category;
use Livewire\Component;
use Livewire\WithPagination;

class ShowCategory extends Component
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
        $category = category::find($this->selectedId);
        delete_cloud($category->icon, 'category');
        $category->delete();
    }

    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';
        return view('livewire.category.show-category', [
            'categories' => category::where('category', 'ilike', $searchTerm)->paginate($this->limit),
        ])->extends('layouts.admin')
            ->section('content');
    }
}
