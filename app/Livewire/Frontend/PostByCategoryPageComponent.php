<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use App\Models\BlogPost;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;

class PostByCategoryPageComponent extends Component
{
    use WithPagination;
    public $posts;
    public $count = 1;
    #[Layout('livewire.frontend.layouts.with_sidebar')]
    function mount($id)
    {
        $this->posts = BlogPost::where('blog_post_category_id', '=', $id)->with('category')->get();
    }
    public function render()
    {
        return view('livewire.frontend.post-by-category-page-component');
    }
}
