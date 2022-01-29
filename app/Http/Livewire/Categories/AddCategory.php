<?php

namespace App\Http\Livewire\Categories;

use App\Models\category;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Livewire;
use Livewire\WithFileUploads;

class AddCategory extends Component
{
    use WithFileUploads;
    public $category;
    public $icon;

    protected $rules = [
        'category' => 'required',
        'icon' => 'file|mimes:png,jpg|max:2048',
    ];

    public function updatedIcon()
    {
        $this->validate([
            'icon' => 'image|max:2048',
        ]);
    }

    public function save()
    {
        $data = $this->validate();
        $data['icon'] = upload_cloud($this->icon->getRealPath(), $this->icon->getClientOriginalName(), 'category');
        category::create($data);
        redirect("/admin/categories");
    }


    public function render()
    {
        return view('livewire.category.add-category')->extends('layouts.admin')
            ->section('content');;
    }
}
