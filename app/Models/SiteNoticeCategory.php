<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteNoticeCategory extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function notices()
    {
        return $this->hasMany(SiteNotice::class, 'id')->orderBy('position', 'ASC');
    }
}
