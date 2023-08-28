<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    use HasFactory;
    protected $table = ['general_settings'];

    protected $fillable = [
        'logo',
        'favicon',
        'site_title',
        'site_motto',
        'meta_title',
        'meta_description',
    ];
}
