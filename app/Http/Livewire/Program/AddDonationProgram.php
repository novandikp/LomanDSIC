<?php

namespace App\Http\Livewire\Program;

use App\Models\category;
use App\Models\donation_program;
use App\Models\image_donation;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddDonationProgram extends Component
{
    use WithFileUploads;
    public $title, $target_amount, $target_date, $description, $category_id;
    public  $total_amount = 0;
    public $id_user = 1;
    public $picture;
    public $pictures = [];
    public $categories = [];



    protected $rules = [
        'total_amount' => 'required|numeric',
        'id_user' => 'required',
        'title' => 'required|min:5',
        'target_amount' => 'required',
        'target_date' => 'required',
        'description' => 'required|min:5',
        'category_id' => 'required',
    ];


    public function save()
    {
        $data = $this->validate();
        $data = [
            'title' => $this->title,
            'target_amount' =>  str_replace(',', '.', str_replace('.', '', $this->target_amount)),
            'target_date' => $this->target_date,
            'description' => $this->description,
            'category_id' => $this->category_id,
            'user_id' => $this->id_user,
            'total_amount' => 0,
        ];
        $donation = donation_program::create($data);

        foreach ($this->pictures as $photo) {
            $item['image'] = upload_cloud($photo->getRealPath(), $photo->getClientOriginalName(), 'donation');
            $item['donation_program_id'] = $donation->id;
            image_donation::create($item);
        }
        redirect("/admin/program");
    }



    public function cancel()
    {
        $this->pictures = [];
    }


    public function mount()
    {
        $this->categories = category::all();
    }

    public function render()
    {
        return view('livewire.program.add-donation-program')->extends('layouts.admin')
            ->section('content');;
    }
}
