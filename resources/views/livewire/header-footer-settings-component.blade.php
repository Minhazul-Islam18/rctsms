    @section('page-title')
        {{ 'Settings-Header & Footer' }}
    @endsection
    @section('page-styles')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" />
    @endsection
    @section('page-scripts')
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js" data-navigate-once></script>
        <script data-navigate-once>
            $('#smr1').summernote({
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['misc', ['undo', 'redo']],
                    ['insert', ['link']],
                    ['para', ['ul', 'ol', 'paragraph']],
                ],
                callbacks: {
                    onChange: function(contents, $editable) {
                        @this.set('FW1smr_text', contents);
                        // console.log(contents);
                    }
                }
            });
            $('#smr2').summernote({
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['misc', ['undo', 'redo']],
                    ['insert', ['link']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['code']
                ],
                callbacks: {
                    onChange: function(contents, $editable) {
                        @this.set('FW2smr_text', contents);
                    }
                }
            });
            $('#smr3').summernote({
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['misc', ['undo', 'redo']],
                    ['insert', ['link']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['code']
                ],
                callbacks: {
                    onChange: function(contents, $editable) {
                        @this.set('FW3smr_text', contents);
                    }
                }
            });
        </script>
        <script src="https://unpkg.com/@nextapps-be/livewire-sortablejs@0.3.0/dist/livewire-sortable.js"></script>
    @endsection
    <div>

        <div class="card">
            <div class="card-header">
                <h5 class="m-0">Header Settings</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-4 col-sm-12">
                        <nav class="preview_nav">
                            <ul class="prev-menu-list" wire:sortable="ReOrder"
                                wire:sortable.options="{ animation: 100 }">
                                @foreach ($menus as $menu)
                                    <li wire:key="{{ $menu->id }}" wire:sortable.item="{{ $menu->id }}">
                                        {{ $menu->name }}
                                        @if (count($menu->submenus) > 0)
                                            <ul class="dropdown-menu-prev" wire:sortable="ReOrder"
                                                wire:sortable.options="{ animation: 100 }">
                                                @foreach ($menu->submenus as $submenu)
                                                    <li wire:sortable.item="{{ $submenu->id }}"
                                                        wire:key="{{ $submenu->id }}">{{ $submenu->name }}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </nav>
                    </div>
                    <div class="col-12 col-md-8 col-sm-12">
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
                                            <select wire:model="parentId" class="form-select form-select-lg"
                                                name="" id="">
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
                                    <li wire:key="{{ $menu->id }}"
                                        class="d-flex flex-column flex-sm-column flex-md-row bg-gray-200">
                                        <div
                                            class="d-flex flex-wrap {{ count($menu->submenus) > 0 ? 'flex-column gap-2' : 'flex-row w-100 justify-content-between align-items-center' }}">
                                            {{ $menu->name }}
                                            <div class="d-flex gap-1">
                                                <button class="btn btn-warning"
                                                    wire:click="editMenu({{ $menu->id }})">Edit</button>
                                                <button class="btn btn-danger"
                                                    wire:click="deleteMenu({{ $menu->id }})">Delete</button>
                                            </div>
                                        </div>
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
                            <img src="/storage/{{ $header_image->header_image }}" class="max-w-100 w-50"
                                alt="">
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
                            <label for="HeaderImage{{ $iteration }}" class="form-label">Header Image</label>
                            <input wire:model='image' id="HeaderImage{{ $iteration }}"
                                accept="image/jpeg, image/svg, image/png, image/jpg" type="file"
                                class="form-control">
                        </div>
                        @error('image')
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row gy-2">
            <div class="col-12 col-md-6 col-sm-12">
                <div class="card mt-3">
                    <div class="card-header pb-2 pt-3 d-flex align-items-center justify-content-between">
                        <h5 class="m-0">Footer Widget 1</h5>
                        <div class="tgl-group">
                            <input class='tgl tgl-light d-none' id='widget_1' wire:model='FW1status'
                                type='checkbox' {{ $this->FW1status == 1 ? 'checked' : '' }} />
                            <label class='tgl-btn' for='widget_1'></label>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" wire:submit='footerWidget({{ $widget = 1 }})'>
                            <div class="mb-3">
                                <label for="" class="form-label">Title</label>
                                <input type="text" class="form-control" wire:model='FW1title' name=""
                                    id="">
                            </div>
                            <div class="mb-3" wire:ignore>
                                <label for="" class="form-label">Text</label>
                                <textarea class="form-control summernote" name="" id="smr1" wire:model.defer='FW1smr_text'
                                    rows="3">{!! $FW1smr_text !!}</textarea>
                            </div>
                            <button type="submit" class="btn btn-success">Save</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-sm-12">
                <div class="card mt-3">
                    <div class="card-header pb-2 pt-3 d-flex align-items-center justify-content-between">
                        <h5 class="m-0">Footer Widget 2</h5>
                        <div class="tgl-group">
                            <input class='tgl tgl-light d-none' id='widget_2' wire:model='FW2status'
                                type='checkbox' {{ $this->FW2status == 1 ? 'checked' : '' }} />
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
                                <textarea class="form-control summernote" name="" id="smr2" wire:model.defer='FW2smr_text'
                                    rows="3">{!! $FW2smr_text !!}</textarea>
                            </div>
                            <button type="submit" wire:click='footerWidget({{ $widget = 2 }})'
                                class="btn btn-success">Save</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-sm-12">
                <div class="card mt-3">
                    <div class="card-header pb-2 pt-3 d-flex align-items-center justify-content-between">
                        <h5 class="m-0">Footer Widget 3</h5>
                        <div class="tgl-group">
                            <input class='tgl tgl-light d-none' id='widget_3' wire:model='FW3status'
                                type='checkbox' {{ $this->FW3status == 1 ? 'checked' : '' }} />
                            <label class='tgl-btn' for='widget_3'></label>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="row" action="" wire:submit='footerWidget({{ $widget = 3 }})'>
                            <div class="col-12 col-md-5 col-lg-5 col-sm-12">
                                <label for="" class="form-label">Title</label>
                                <input type="text" class="form-control" wire:model='FW3title' name=""
                                    id="">
                            </div>
                            <div class="col-12 col-md-7 col-lg-7 col-sm-12" wire:ignore>
                                <label for="" class="form-label">Text</label>
                                <textarea class="form-control summernote" name="" id="smr3" wire:model.defer='FW3smr_text'
                                    rows="3">{!! $FW3smr_text !!}</textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
