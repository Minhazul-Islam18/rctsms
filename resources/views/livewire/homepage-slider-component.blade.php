@section('page-title')
    {{ 'Homepage Slider' }}
@endsection
@section('page-styles')
    <style>
        .accordion-content {
            background-color: var(--background-theme);
            padding: 1.4rem 2rem;
            margin: 1rem 0;
            border-radius: 4px;
            /* display: none; */
        }

        .img-lightbox {
            background-color: var(--background-light);
            padding: .5rem .3rem;
            border-radius: 3px;
            border: 1px solid var(--bs-dark-border-subtle);
        }

        .img-lightbox p {
            color: var(--bs-body-bg);
            margin: .25rem 0 2rem;
            font-size: 20px;
        }
    </style>
@endsection
@section('page-scripts')
    <script>
        $(document).ready(function() {
            $(".accordion").click(function() {
                $(this).toggleClass("open");
                $(this).next(".accordion-content").slideToggle();
            });
            $(".close").click(function() {
                $('.accordion-content').slideToggle();
            });
        });
    </script>
@endsection
<div x-data="{ is_editing: false }">
    <div class="accordion btn btn-warning">
        Add New
    </div>
    <div class="accordion-content" x-bind:class="{ open, 'd-block': is_editing }">
        <form wire:submit="{{ $editing ? 'update' : 'create' }}">
            <div class="mb-3">
                <label for="" class="form-label">Title</label>
                <input type="text" wire:model="formData.title" class="form-control" name="" id="">
            </div>

            <div class="row gx-2 gy-0">
                <div class="col-3">
                    <span wire:target='formData.image' wire:loading class="text-primary">Uploading....</span>
                    @if ($formData['image'])
                        <img src="/storage/{{ $formData['image'] }}" alt="">
                        <img src="{{ $formData['image']->temporaryUrl() }}" alt="" class="rounded-1 w-100">
                    @elseif ($formData['editimage'])
                        <img src="/storage/{{ $formData['editimage'] }}" class="w-100 img-rounded" alt="">
                    @endif
                </div>
                <div class="pb-3 {{ $formData['image'] != null ? 'col-9' : 'col-12' }}">
                    <label for="Image{{ $iteration }}" class="form-label">Image</label>
                    <input wire:model='formData.image' id="Image{{ $iteration }}"
                        accept="image/jpeg, image/svg, image/png, image/jpg, image/webp" type="file"
                        class="form-control">
                </div>
            </div>
            @error('image')
                <div class="alert alert-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
            <button type="button" class="btn btn-secondary {{ $editing ? 'Update' : 'close' }}"
                {{ $editing ? 'wire:click=cancelEdit' : '' }}>Close</button>
            <button type="submit" class="btn btn-primary">{{ $editing ? 'Update' : 'Create' }}</button>
        </form>
    </div>

    <div class="row g-2 mt-3">
        @foreach ($slides as $slide)
            <div class="col-12 col-sm-6 com-xs-6 col-md-3">
                <div class="img-lightbox" wire:target=' wire:key="{{ $slide->index }}"'>
                    <img src="/storage/{{ $slide->image }}" alt="{{ $slide->title }}" class="img-fluid img-rounded">
                    <p>{{ $slide->title }}</p>
                    <button class="btn btn-info" type="button"
                        @click.away="document.body.classList.remove('noscroll'); "
                        wire:click='editSlide({{ $slide->id }})' x-on:click="is_editing = true">Edit</button>
                    <button class="btn btn-danger" wire:click='confirmDelete({{ $slide->id }})'
                        data-bs-target="#modalId" data-bs-toggle="modal">Delete</button>
                </div>
            </div>
        @endforeach
    </div>
    <div class="modal fade {{ $confirmingDelete != null ? 'show d-block' : 'd-none' }}" id="modalId" tabindex="-1"
        data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click='cancelDelete'></button>
                </div>
                <div class="modal-body">
                    <h5 class="m-0">Are you want to delete this slide?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click='cancelDelete'
                        data-bs-dismiss="modal">No</button>
                    <button type="button" wire:click="deleteSlide({{ $confirmingDelete }})"data-bs-dismiss="modal"
                        class="btn btn-primary">Yes</button>
                </div>
            </div>
        </div>
    </div>


</div>
