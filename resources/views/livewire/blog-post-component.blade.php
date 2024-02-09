    @section('page-title')
        {{ 'Blog Posts' }}
    @endsection
    @section('page-styles')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" />
    @endsection
    @section('page-scripts')
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>
        <script>
            $('#content').summernote({
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['misc', ['undo', 'redo']],
                    ['insert', ['link']],
                    ['para', ['ul']]
                ],
                callbacks: {
                    onChange: function(contents, $editable) {
                        @this.set('settings.history', contents);
                        // console.log(contents);
                    }
                }
            });
        </script>

        <script src="https://unpkg.com/@nextapps-be/livewire-sortablejs@0.3.0/dist/livewire-sortable.js"></script>
    @endsection
    <div>
        <div class="row g-2 mt-2 d-flex flex-sm-column flex-md-row">
            <div class="col-12 col-md-6 col-sm-12 order-2 order-md-1">
                <div class="card">
                    <div class="card-header py-3 border-bottom">
                        <div class="h5 m-0 fw-bold d-flex justify-content-center">
                            All Posts
                        </div>
                    </div>
                    <div class="card-body py-2 px-2" wire:sortable="ReOrderBlog"
                        wire:sortable.options="{ animation: 100 }">
                        @foreach ($posts as $post)
                            <div wire:sortable.item="{{ $post->id }}"
                                class="border-1 border-bottom px-2 py-2 d-flex justify-content-between align-item-center flex-wrap">
                                <div class="d-flex flex-row flex-wrap">
                                    <img class="w-10" src="/storage/{{ $post->featured_image }}" alt="">
                                    <h3>{{ $post->title }}</h3>
                                </div>
                                <div class="d-flex flex-wrap flex-row align-items-center justify-content-end gap-2">
                                    <button class="btn btn-sm btn-warning" wire:click="ViewPost({{ $post->id }})"
                                        data-bs-toggle="modal" data-bs-target="#Vblog"><i
                                            class="bi bi-eye-fill"></i></button>
                                    <button class="btn btn-sm btn-info" wire:click="EditPost({{ $post->id }})"><i
                                            class="bi bi-pencil-square"></i></button>
                                    <button class="btn btn-sm btn-danger"
                                        wire:click="DeletePost({{ $post->id }})"><i
                                            class="bi bi-trash"></i></button>
                                </div>
                            </div>
                        @endforeach
                        {{ $posts->links() }}
                        @if ($posts->count() <= 0)
                            <p class="text-body h5 text-center m-0">Nothing Found</p>
                        @endif
                    </div>
                </div>
                @if ($this->post['preview'])
                    <div class="modal fade {{ $this->post['preview'] ? 'show' : null }}" id="Vblog" tabindex="-1"
                        role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md"
                            role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalTitleId">
                                        <img lazy class="w-10" src="/storage/{{ $this->actions['featured_image'] }}"
                                            alt="">
                                        {{ $post['title'] }}
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                        wire:click='cancelPostAction'></button>
                                </div>
                                <div class="modal-body">
                                    <p class="text-body mb-2">{{ $post->description }}</p>
                                    @foreach ($this->actions['post_images'] as $item)
                                        {{-- @dd($item) --}}
                                        <img lazy class="w-20" src="/storage/{{ $item }}" alt="">
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-12 col-md-6 col-sm-12 order-1 order-md-2">
                <div class="card">
                    <div class="card-header py-3 px-4">
                        <h3 class="m-0">{{ $this->post['editing'] == true ? 'Update' : 'Create' }} Post</h3>
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent="{{ $this->post['editing'] ? 'UpdatePost' : 'CreatePost' }}">
                            <div class="mb-3">
                                <label for="" class="form-label">Category</label>
                                <select class="form-select" name="" id="" wire:model='post.category_id'>
                                    <option>Select one</option>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $item->id == $post['id'] ? 'selected' : null }}
                                            wire:key='{{ $item->id }}'>
                                            {{ $item->category_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('post.category_id')
                                    <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Title:</label>
                                <input type="text" class="form-control" name="" id="" placeholder=""
                                    wire:model="post.title">
                                @error('post.title')
                                    <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Content:</label>
                                <textarea class="form-control" name="" id="content" rows="3" wire:model="post.description">{!! $this->post['description'] !!}</textarea>
                                @error('post.description')
                                    <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <span wire:target='post.featured_image' wire:loading
                                class="text-primary mb-2">Uploading....</span>

                            @if (isset($this->post['featured_image']) &&
                                    is_object($this->post['featured_image']) &&
                                    method_exists($this->post['featured_image'], 'temporaryUrl'))
                                <img style="max-width: 120px;"
                                    src="{{ $this->post['featured_image']->temporaryUrl() }}" class="mb-2"
                                    alt="">
                            @endif
                            <div class="mb-3">
                                <label for="" class="form-label">Featured Image</label>
                                <input type="file" class="form-control" name=""
                                    id="Fimage{{ $count }}" placeholder="" wire:model='post.featured_image'
                                    aria-describedby="fileHelpId">
                                <div id="fileHelpId" class="form-text">This will Featured or Shown as blog preview.
                                </div>
                                @error('post.featured_image')
                                    <div class="text-danger d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="d-flex gap-2 justify-content-start align-items-start">
                                <span wire:target='post.post_images' wire:loading
                                    class="text-primary mb-2">Uploading....</span>
                                @if (isset($this->post['post_images']))
                                    @foreach ($this->post['post_images'] as $item)
                                        <img src="{{ $item->temporaryUrl() }}" class="w-25 mb-2" alt="">
                                    @endforeach
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Post Image <sub>(s)</sub></label>
                                <input type="file" class="form-control" name=""
                                    id="Pimages{{ $count }}" placeholder="" wire:model='post.post_images'
                                    multiple aria-describedby="fileHelpId2">
                                <div id="fileHelpId2" class="form-text">This images will Shown as blog images.</div>
                                @error('post.post_images')
                                    <div class="text-danger d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit"
                                class="btn btn-success">{{ $this->post['editing'] == true ? 'Update' : 'Create' }}</button>
                            @if ($this->post['editing'])
                                <button wire:loading.blur type="button" class="btn btn-danger"
                                    wire:click='cancelPostAction'>{{ 'Cancel' }}</button>
                            @endif
                        </form>
                    </div>

                </div>
            </div>
            <div class="col-12 col-md-6 col-sm-12 order-4 order-md-3">
                <div class="card">
                    <div class="card-header py-3 border-bottom">
                        <div class="h5 m-0 fw-bold d-flex justify-content-center">
                            Categories
                        </div>
                    </div>
                    <div class="card-body py-2 px-2" wire:sortable="ReOrderCategory"
                        wire:sortable.options="{ animation: 100 }">
                        @foreach ($categories as $category)
                            <div wire:sortable.item="{{ $category->id }}"
                                class="border-1 border-bottom px-2 py-2 d-flex justify-content-between align-item-center flex-wrap">
                                <div class="d-flex flex-column">
                                    <h5 class="m-0">{{ $category->category_name }}</h5>
                                </div>
                                <div class="d-flex flex-wrap flex-row align-items-center justify-content-end gap-2">
                                    <button class="btn btn-sm btn-info"
                                        wire:click="EditPostCategory({{ $category->id }})"><i
                                            class="bi bi-pencil-square"></i></button>
                                    <button class="btn btn-sm btn-danger"
                                        wire:click="DeletePostCategory({{ $category->id }})"><i
                                            class="bi bi-trash"></i></button>
                                </div>
                            </div>
                        @endforeach
                        {{ $categories->links() }}
                        @if ($categories->count() <= 0)
                            <p class="text-body h5 text-center m-0">Nothing Found</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-sm-12 order-3 order-md-4">
                <div class="card">
                    <div class="card-header py-3 px-4">
                        <h3 class="m-0">{{ $this->category['editing'] ? 'Update' : 'Create' }} Post Category
                        </h3>
                    </div>
                    <div class="card-body">
                        <form
                            wire:submit.prevent="{{ $this->category['editing'] == true ? 'UpdatePostCategory' : 'CreatePostCategory' }}">
                            <div class="mb-3">
                                <label for="" class="form-label">Category Name:</label>
                                <input type="text" class="form-control" name="" id=""
                                    placeholder="" wire:model="category.name">
                                @error('category.name')
                                    <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit"
                                class="btn btn-success">{{ $this->category['editing'] == true ? 'Update' : 'Create' }}</button>
                            @if ($this->category['editing'])
                                <button type="button" class="btn btn-danger"
                                    wire:click='cancelCategoryAction'>{{ 'Cancel' }}</button>
                            @endif
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
