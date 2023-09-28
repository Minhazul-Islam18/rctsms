<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicResult extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function class()
    {
        return $this->belongsTo(ClassList::class, 'class_list_id')->orderBy('position', 'ASC');
    }
}
