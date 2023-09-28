<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteMenu extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded =
    [];
    public function submenus()
    {
        return $this->hasMany(SiteMenu::class, 'parent_id')->orderBy('position', 'ASC');
    }
}
