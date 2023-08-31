<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolProfile extends Model
{
    use HasFactory;
    protected $fillable = [
        'school_name',
        'established_at',
        'eiin',
        'domain',
        'contact_number',
        'contact_mail',
        'address',
    ];
}
