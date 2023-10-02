@section('page-scripts')
    <script src="https://unpkg.com/@nextapps-be/livewire-sortablejs@0.3.0/dist/livewire-sortable.js"></script>
@endsection
@section('page-title')
    {{ 'Header Menu' }}
@endsection
<div>
    <div class="row">
        <div class="col-12 col-md-4 col-sm-12 order-2 order-md-1">
            <nav class="preview_nav">
                <ul class="prev-menu-list" wire:sortable="ReOrder" wire:sortable.options="{ animation: 100 }">
                    @foreach ($menus as $menu)
                        <li wire:key="{{ $menu->id }}" wire:sortable.item="{{ $menu->id }}">
                            {{ $menu->name }}
                            @if (count($menu->submenus) > 0)
                                <ul class="dropdown-menu-prev" wire:sortable="ReOrder"
                                    wire:sortable.options="{ animation: 100 }">
                                    @foreach ($menu->submenus as $submenu)
                                        <li wire:sortable.item="{{ $submenu->id }}" wire:key="{{ $submenu->id }}">
                                            {{ $submenu->name }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </nav>
        </div>
        <div class="col-12 col-md-8 col-sm-12 order-1 order-md-2">
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
</div>
