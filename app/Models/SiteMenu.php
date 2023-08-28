<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteMenu extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable =
    [
        'parent_id',
        'name',
        'url'
    ];
    public function submenus()
    {
        return $this->hasMany(SiteMenu::class, 'parent_id');
    }
}
