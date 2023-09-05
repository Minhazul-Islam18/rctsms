<?php

namespace App\Models;

use App\Models\ClassList;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassSection extends Model
{
    use HasFactory;
    function classes()
    {
        return $this->belongsTo(ClassList::class, 'class_list_id');
    }
    protected $guarded = [];
}
