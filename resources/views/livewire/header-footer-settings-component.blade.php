<div>
    @section('page-styles')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" />
    @endsection
    @section('page-scripts')
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>
        <script>
            $('#smr1').summernote({
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['misc', ['undo', 'redo']],
                    ['insert', ['link']],
                    ['para', ['ul']]
                ],
                callbacks: {
                    onChange: function(contents, $editable) {
                        @this.set('FW1smr_text', contents);
                    }
                }
            });
            $('#smr2').summernote({
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['misc', ['undo', 'redo']],
                    ['insert', ['link']],
                    ['para', ['ul']],
                    ['code']
                ],
                callbacks: {
                    onChange: function(contents, $editable) {
                        @this.set('FW2smr_text', contents);
                    }
                }
            });
        </script>
    @endsection
    <div class="card">
        <div class="card-header">
            <h5 class="m-0">Header Settings</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-4 col-md-4 col-sm-12">
                    <nav class="preview_nav">
                        <ul class="prev-menu-list">
                            @foreach ($menus as $menu)
                                <li wire:key="{{ $menu->id }}">
                                    {{ $menu->name }}
                                    @if (count($menu->submenus) > 0)
                                        <ul class="dropdown-menu-prev">
                                            @foreach ($menu->submenus as $submenu)
                                                <li wire:key="{{ $submenu->id }}">{{ $submenu->name }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </nav>
                </div>
                <div class="col-8 col-md-8 col-sm-12">

                    <div class="menu-creation text-white">
                        <form wire:submit.prevent="createMenu" wire:loading.attr="disabled">
                            <div class="row g-1">
                                <div class="col-12 col-sm-12 col-md-12 mb-2">
                                    <label for="">Menu name</label>
                                    <input class="form-control form-input" type="text" wire:model="name"
                                        placeholder="Menu Name">
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 mb-2">
                                    <label for="">Menu Url</label>
                                    <input class="form-control form-input" type="text" wire:model="url"
                                        placeholder="Menu URL">
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 mb-2">
                                    <label for="Menu Url"></label>
                                    <div class="">
                                        <label for="" class="form-label">Parent</label>
                                        <select wire:model="parentId" class="form-select form-select-lg" name=""
                                            id="">
                                            <option value="" selected>Select Parent Name</option>
                                            @foreach ($menus as $menu)
                                                <option wire:key="{{ $menu->id }}" value="{{ $menu->id }}">
                                                    {{ $menu->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-2 col-sm-12">
                                    <button class="btn btn-info" type="submit">Create Menu</button>
                                </div>
                            </div>
                        </form>

                        <hr>

                        <ul class="menu_with_oparations">
                            @foreach ($menus as $menu)
                                <li wire:key="{{ $menu->id }}">
                                    {{ $menu->name }}
                                    <button class="btn btn-warning"
                                        wire:click="editMenu({{ $menu->id }})">Edit</button>
                                    <button class="btn btn-danger"
                                        wire:click="deleteMenu({{ $menu->id }})">Delete</button>
                                    @if (count($menu->submenus) > 0)
                                        <ul>
                                            @foreach ($menu->submenus as $submenu)
                                                <li wire:key="{{ $submenu->id }}">
                                                    {{ $submenu->name }}
                                                    <button class="btn btn-warning"
                                                        wire:click="editSubmenu({{ $submenu->id }})">Edit</button>
                                                    <button class="btn btn-danger"
                                                        wire:click="deleteSubmenu({{ $submenu->id }})">Delete</button>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>

                        @if ($menuId)
                            <form wire:submit.prevent="updateMenu" wire:loading.attr="disabled">
                                <div class="mb-3">
                                    <label for="" class="form-label">Menu</label>
                                    <input class="form-control form-input" type="text" wire:model="name"
                                        placeholder="Updated Name">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Url</label>
                                    <input class="form-control form-input" type="text" wire:model="url"
                                        placeholder="Updated URL">
                                </div>
                                <button class="btn btn-primary me-2" type="submit">Update Menu</button>
                                <button class="btn btn-danger" wire:click="cancel">Cancel</button>
                            </form>
                        @endif
                    </div>

                </div>
            </div>
            @if ($header_image)
                <div class="my-3 d-flex flex-column gap-2 align-items-start">
                    <div>
                        <img src="/storage/{{ $header_image->header_image }}" class="max-w-100 w-50" alt="">
                    </div>
                    <button wire:click="deleteImage({{ $header_image->id }})" class="btn btn-danger"
                        onclick="return confirm('Are you sure you want to delete this image?')">Delete</button>
                </div>
            @endif

            <form class="g-3" wire:submit.prevent='uploadImage' enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-3">
                        <span wire:target='image' wire:loading class="text-primary">Uploading....</span>
                        @if ($image)
                            <img src="{{ $image->temporaryUrl() }}" alt="" class="rounded-1 w-100">
                        @endif
                    </div>
                    <div class="pb-3 {{ isset($image) ? 'col-9' : 'col-12' }}">
                        <label for="" class="form-label">Header Image</label>
                        <input wire:model='image' accept="image/jpeg, image/svg, image/png, image/jpg" type="file"
                            class="form-control" name="image" id="" placeholder=""
                            aria-describedby="fileHelpId">
                    </div>
                    @error('image')
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                    <div class="col-12">
                        <button class="btn btn-primary" wire:click='uploadImage' type="submit">Save</button>
                    </div>
                </div>


            </form>
        </div>
    </div>
    <div class="row gy-2">
        <div class="col-6 col-md-6 col-sm-12">
            <div class="card mt-3">
                <div class="card-header pb-2 pt-3 d-flex align-items-center justify-content-between">
                    <h5 class="m-0">Footer Widget 1</h5>
                    <div class="tgl-group">
                        <input class='tgl tgl-light' id='widget_1' wire:model='FW1status' type='checkbox'
                            {{ isset($FW1->status) && $FW1->status == 1 ? 'checked' : '' }} />
                        <label class='tgl-btn' for='widget_1'></label>
                    </div>
                </div>
                <div class="card-body">
                    <form action="" wire:submit.prevent='footerWidget'>
                        <div class="mb-3">
                            <label for="" class="form-label">Title</label>
                            <input type="text" class="form-control" wire:model='FW1title' name=""
                                id="">
                        </div>
                        <div class="mb-3" wire:ignore>
                            <label for="" class="form-label">Text</label>
                            <textarea class="form-control summernote" name="" id="smr1" wire:model='FW1smr_text' rows="3">{!! $FW1smr_text !!}</textarea>
                        </div>
                        <button type="submit" wire:click='footerWidget({{ $widget = 1 }})'
                            class="btn btn-success">Save</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-6 col-sm-12">
            <div class="card mt-3">
                <div class="card-header pb-2 pt-3 d-flex align-items-center justify-content-between">
                    <h5 class="m-0">Footer Widget 2</h5>
                    <div class="tgl-group">
                        <input class='tgl tgl-light' id='widget_2' wire:model='FW2status' type='checkbox'
                            {{ isset($FW2->status) && $FW2->status == 1 ? 'checked' : '' }} />
                        <label class='tgl-btn' for='widget_2'></label>
                    </div>
                </div>
                <div class="card-body">
                    <form action="" wire:submit.prevent='footerWidget'>
                        <div class="mb-3">
                            <label for="" class="form-label">Title</label>
                            <input type="text" class="form-control" wire:model='FW2title' name=""
                                id="">
                        </div>
                        <div class="mb-3" wire:ignore>
                            <label for="" class="form-label">Text</label>
                            <textarea class="form-control summernote" name="" id="smr2" wire:model='FW2smr_text' rows="3">{!! $FW2smr_text !!}</textarea>
                        </div>
                        <button type="submit" wire:click='footerWidget({{ $widget = 2 }})'
                            class="btn btn-success">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>