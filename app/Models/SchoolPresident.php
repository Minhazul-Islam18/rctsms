<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolPresident extends Model
{
    use HasFactory;
    protected $fillable = [
        'president_image',
        'president_name',
        'president_signiture',
        'president_words',
    ];
}
