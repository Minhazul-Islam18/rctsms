@section('page-title')
    {{ 'Photo Gallery' }}
@endsection
@section('page-scripts')
    <script src="https://unpkg.com/@nextapps-be/livewire-sortablejs@0.3.0/dist/livewire-sortable.js"></script>
@endsection
<div>
    <!-- Create Button -->
    <button wire:click="openModal" class="btn btn-lg btn-primary">Add New Item</button>

    <!-- Gallery -->
    <div class="gallery row g-0 mt-4" wire:sortable="ReOrder" wire:sortable.options="{ animation: 100 }">
        @foreach ($galleryImages as $item)
            <div wire:sortable.item="{{ $item->id }}"
                class="mx-2 my-2 col-12 col-md-3 col-sm-6 col-lg-3 rounded-1 bg-dark px-1 py-2 border-1">
                <div class="gallery-item">
                    <img class="w-100 img-rounded " style="max-height: 200px;"
                        src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}">
                    <h3>{{ $item->title }}</h3>
                    <p>{{ $item->description }}</p>
                    <button class="btn btn-info me-2" wire:click="edit({{ $item->id }})">Edit</button>
                    <button class="btn btn-danger" wire:click="delete({{ $item->id }})">Delete</button>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Modal -->
    @if ($modal)
        <div class="modal fade show d-block" id="" tabindex="-1" data-bs-backdrop="static"
            data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header py-3">
                        <h2 class="m-0">{{ $selectedItem ? 'Edit Item' : 'Create Item' }}</h2>
                        <button type="button" class="btn-close" wire:click="closeModal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form wire:submit.prevent="{{ $selectedItem ? 'update' : 'create' }}">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <input class="form-control mb-2" type="text" wire:model="title" placeholder="Title">
                            <input class="form-control mb-2" type="text" wire:model="description"
                                placeholder="Description">
                            <input class="form-control mb-2" type="file" wire:model="image">
                            @if ($selectedItem)
                                <button class="btn btn-warning" type="submit">Update</button>
                            @else
                                <button class="btn btn-success" type="submit">Create</button>
                            @endif
                            <button class="btn btn-secondary" type="button" wire:click="closeModal">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    @endif
</div>
