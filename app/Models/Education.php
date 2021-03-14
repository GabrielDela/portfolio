<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'school',
        'location',
        'missions',
        'start_date',
        'end_date',
        'image_url',
    ];
}
