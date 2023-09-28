<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassList extends Model
{
    use HasFactory;
    protected $guarded = [];
    function sections()
    {
        return $this->hasMany(ClassSection::class);
    }
    public function results()
    {
        return $this->hasMany(AcademicResult::class);
    }
}
