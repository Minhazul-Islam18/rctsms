<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportantIndividual extends Model
{
    use HasFactory;
    protected $fillable = [
        'person_image',
        'person_name',
        'person_signiture',
        'person_words',
    ];
}
