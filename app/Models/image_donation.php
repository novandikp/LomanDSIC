<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class image_donation extends Model
{
    use HasFactory;
    protected $fillable = ['image', 'donation_program_id'];
}
