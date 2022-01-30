<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class issue_report extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'status',
        'created_at',
        'updated_at'
    ];
}
