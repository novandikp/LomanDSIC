<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class donation_program extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'target_amount', 'target_date', 'description', 'category_id', 'user_id', 'total_amount'];
}
