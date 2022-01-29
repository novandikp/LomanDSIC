<?php

namespace App\Http\Livewire\Categories;

use App\Models\category;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Livewire;
use Livewire\WithFileUploads;

class EditCategory extends Component
{
    use WithFileUploads;
    public $category;
    public $icon;
    public category $categories;

    public function mount($id)
    {
        $this->categories = category::find($id);
        $this->category = $this->categories->category;
    }

    protected $rules = [
        'category' => 'required',
        'icon' => 'nullable|file|mimes:png,jpg|max:2048',
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
        if ($data['icon']) {
            $data['icon'] = replace_cloud($this->categories->icon, $this->icon->getRealPath(), $this->icon->getClientOriginalName(), 'category');
        } else {
            $data['icon'] =  $this->categories->icon;
        }
        $this->categories->update($data);
        redirect("/admin/categories");
    }


    public function render()
    {
        return view('livewire.category.edit-category')->extends('layouts.admin')
            ->section('content');;
    }
}
