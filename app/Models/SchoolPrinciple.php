<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolPrinciple extends Model
{
    use HasFactory;
    protected $fillable = [
        'principle_image',
        'principle_name',
        'principle_signiture',
        'principle_words',
    ];
}
