<?php

namespace App\Livewire\Frontend;

use App\Models\BlogPost;
use App\Models\BlogPostCategory;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;

class BlogPostPageComponent extends Component
{
    use WithPagination;
    public $selectedCategory;
    public $count = 1;
    #[Layout('livewire.frontend.layouts.with_sidebar')]
    public function render()
    {
        $categories = BlogPostCategory::orderBy('position')->get();
        $posts = $this->selectedCategory
            ? BlogPostCategory::find($this->selectedCategory)->blog_posts
            : BlogPost::with('category')->orderBy('created_at', 'DESC')->paginate(8);
        // $posts = BlogPost::with('category')->orderBy('position', 'ASC')->get();

        // dd($posts);
        return view('livewire.frontend.blog-post-page-component', ['posts' => $posts, 'categories' => $categories]);
    }
}
