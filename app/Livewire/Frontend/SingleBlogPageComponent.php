<?php

namespace App\Livewire\Frontend;

use App\Models\BlogPost;
use Livewire\Component;
use Livewire\Attributes\Layout;

class SingleBlogPageComponent extends Component
{
    #[Layout('livewire.frontend.layouts.with_sidebar')]
    public $blog;
    function mount($title)
    {
        $this->blog = BlogPost::where('title', '=', $title)->with('category')->first();
    }
    public function render()
    {
        return view('livewire.frontend.single-blog-page-component');
    }
}
