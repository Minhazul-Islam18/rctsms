<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\BlogPost;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\BlogPostCategory;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class BlogPostComponent extends Component
{
    use WithPagination, LivewireAlert, WithFileUploads;
    public $count = 1;
    public $post =
    [
        'id' => null,
        'category_id' => null,
        'title' => null,
        'featured_image' => null,
        'post_images' => null,
        'description' => null,
        'editing' => false,
        'preview' => false
    ];
    public $actions = [
        'id' => null,
        'featured_image' => null,
        'post_images' => null,
    ];
    public $category =
    [
        'id' => null,
        'name' => null,
        'editing' => false,
        'preview' => false
    ];
    protected function rules()
    {
        return [
            'post.title' => 'required',
            'post.description' => 'required',
        ];
    }

    //Post functions
    public function CreatePost()
    {
        $this->validate([
            'post.title' => 'required',
            'post.description' => 'required', 'post.featured_image' => 'required',
            'post.post_images' => 'required',
        ]);
        //Featured Image
        $newImageName = time() . '_' . $this->post['featured_image']->getClientOriginalName();
        $this->post['featured_image'] = $this->post['featured_image']->storeAs('frontend/images/blog', $newImageName, 'public');

        //Blog Image(s)
        foreach ($this->post['post_images'] as $value) {
            $newImageName = time() . '_' . $value->getClientOriginalName();
            $post_images[] = $value->storeAs('frontend/images/blog', $newImageName, 'public');
        }
        BlogPost::create([
            'blog_post_category_id' => $this->post['category_id'],
            'title' => $this->post['title'],
            'slug' => Str::slug($this->post['title']),
            'description' => $this->post['description'],
            'featured_image' => $this->post['featured_image'],
            'images' => json_encode($post_images),
        ]);
        $this->ResetPostFields();
        $this->alert('success', 'Post Created Successfully!');
    }
    public function EditPost($id)
    {
        $post = BlogPost::findOrFail($id);
        $this->post['id'] = $id;
        $this->post['category_id'] = $post->blog_post_category_id;
        $this->post['title'] = $post->title;
        $this->post['description'] = $post->description;
        $this->actions['featured_image'] = $post->featured_image;
        $this->actions['post_images'] = json_decode($post->images);
        $this->post['editing'] = true;
    }
    public function ViewPost($id)
    {
        $this->post['preview'] = true;
        $this->EditPost($id);
    }
    public function cancelPostAction()
    {
        $this->ResetPostFields();
    }
    public function UpdatePost()
    {
        $this->validate();
        if ($this->post['featured_image']) {
            Storage::disk('public')->delete($this->actions['featured_image']);
            $newImageName = time() . '_' . $this->post['featured_image']->getClientOriginalName();
            $this->post['featured_image'] = $this->post['featured_image']->storeAs('frontend/images/blog', $newImageName, 'public');
        } else {
            $this->post['featured_image'] = $this->actions['featured_image'];
        }


        if ($this->post['post_images']) {
            //Delete Privious Image
            foreach ($this->actions['post_images'] as $value) {
                Storage::disk('public')->delete($value);
            }

            //Saving New Image(s)
            // foreach ($this->actions['post_images'] as $value) {
            foreach ($this->post['post_images'] as $value) {
                $newImageName = time() . '_' . $value->getClientOriginalName();
                $post_images[] = $value->storeAs('frontend/images/blog', $newImageName, 'public');
            }
            // }
        } else {
            $post_images = $this->actions['post_images'];
        }

        $post = BlogPost::findOrFail($this->post['id']);
        $post->update([
            'blog_post_category_id' => $this->post['category_id'],
            'title' => $this->post['title'],
            'slug' => Str::slug($this->post['title']),
            'description' => $this->post['description'],
            'featured_image' => $this->post['featured_image'],
            'images' => json_encode($post_images),
        ]);
        $this->ResetPostFields();
        $this->alert('success', 'Post Updated Successfully!');
    }
    public function DeletePost($id)
    {
        $post = BlogPost::findOrFail($id);
        // dd($post->featured_image);
        if ($post->featured_image) {
            Storage::disk('public')->delete($post->featured_image);
        }
        if ($post->images) {
            foreach (json_decode($post->images) as $value) {
                Storage::disk('public')->delete($value);
            }
        }
        $post->delete();
        $this->alert('success', 'Post Deleted Successfully!');
    }
    protected function ResetPostFields()
    {
        $this->post['id'] = null;
        $this->post['category_id'] = null;
        $this->post['title'] = null;
        $this->post['description'] = null;
        $this->post['editing'] = false;
        $this->post['preview'] = false;
        $this->post['featured_image'] = null;
        $this->post['post_images'] = null;
    }


    //Post Category functions
    public function CreatePostCategory()
    {
        $this->validate([
            'category.name' => 'required|unique:blog_post_categories,category_name'
        ]);
        BlogPostCategory::create([
            'category_name' => $this->category['name'],
            'category_slug' => Str::slug($this->category['name']),
        ]);
        $this->ResetPostCategoryFields();
        $this->alert('success', 'Category Created Successfully!');
    }
    public function EditPostCategory($id)
    {
        $category = BlogPostCategory::findOrFail($id);
        $this->category['id'] = $id;
        $this->category['name'] = $category->category_name;
        $this->category['editing'] = true;
    }
    public function UpdatePostCategory()
    {
        $this->validate([
            'category.name' => 'required|unique:blog_post_categories,category_name'
        ]);
        $category = BlogPostCategory::findOrFail($this->category['id']);
        $category->update([
            'category_name' => $this->category['name'],
            'category_slug' => Str::slug($this->category['name']),
        ]);
        $this->ResetPostCategoryFields();
        $this->alert('success', 'Category Updated Successfully!');
    }
    public function DeletePostCategory($id)
    {
        $category = BlogPostCategory::findOrFail($id);
        $category->delete();
        $this->alert('success', 'Category Deleted Successfully!');
    }
    public function cancelCategoryAction()
    {
        $this->ResetPostCategoryFields();
    }
    protected function ResetPostCategoryFields()
    {
        $this->category['id'] = null;
        $this->category['name'] = null;
        $this->category['editing'] = false;
        $this->category['preview'] = false;
    }




    //re-order
    public function ReOrderBlog($list)
    {
        foreach ($list as $data) {
            BlogPost::findOrFail($data['value'])->update(['position' => $data['order']]);
        }
        $this->alert('success', 'Re-Ordered');
    }
    public function ReOrderCategory($list)
    {
        foreach ($list as $data) {
            BlogPostCategory::findOrFail($data['value'])->update(['position' => $data['order']]);
        }
        $this->alert('success', 'Re-Ordered');
    }
    public function render()
    {
        $this->count++;
        $posts = BlogPost::orderBy('position', 'ASC')->paginate(8);
        $categories = BlogPostCategory::orderBy('position', 'ASC')->paginate(8);
        return view('livewire.blog-post-component', ['posts' => $posts, 'categories' => $categories]);
    }
}
