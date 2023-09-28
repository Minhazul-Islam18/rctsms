<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BlogPostCategory extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function blog_posts(): HasMany
    {
        return $this->hasMany(BlogPost::class)->orderBy('position', 'ASC');
    }
}
