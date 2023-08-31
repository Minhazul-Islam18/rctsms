<div>
    @section('page-title')
        {{ 'Important Links' }}
    @endsection
    <div class="row g-2">
        <div class="col-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-body">
                    @foreach ($links as $link)
                        <div class="row g-0 border-bottom py-2" wire:key="{{ $link->index }}">
                            <div class="col-12 col-md-8 col-sm-12">
                                <div class="d-flex flex-column">
                                    <h3 class="col-12 text-truncate">{{ $link->link_name }}</h3>
                                    <p class="text-body m-0">{{ $link->link_url }}</p>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-sm-12 d-flex align-items-center justify-content-center">
                                <div class="d-flex flex-row align-items-center justify-content-end gap-2">
                                    <button class="btn btn-info btn-sm" wire:click="editLink({{ $link->id }})">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm"
                                        wire:click="confirmDelete({{ $link->id }})">
                                        <i class="bi bi-trash"></i> </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @if ($links->isEmpty())
                        <h5 class="m-0 d-block text-center">Nothing Found</h5>
                    @endif
                    @if ($willDeleteLinkId)
                        <div class="modal fade show d-block" id="confirmationDelete" tabindex="-1"
                            data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                            aria-labelledby="modalTitleId" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTitleId">Confirmation</h5>
                                        <button type="button" wire:click="cancelDeleteLink" class="btn-close"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h4 class="m-0 text-body">Are you want to Delete this Link?</h4>
                                    </div>
                                    <div class="modal-footer">
                                        <button wire:click="cancelDeleteLink" type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-danger"
                                            wire:click="deleteLink">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header py-3 px-4">
                    <h3 class="m-0">{{ $editing == true ? 'Update' : 'Create' }} Link</h3>
                </div>
                <div class="card-body">
                    <form wire:submit="{{ $editing == true ? 'updateLink' : 'createLink' }}">
                        {{-- @csrf --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="mb-3">
                            <label for="" class="form-label">Name:</label>
                            <input type="text" class="form-control" name="" id="" placeholder=""
                                wire:model="link_name">
                            @error('link_name')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">URL:</label>
                            <input type="text" class="form-control" name="" id="" placeholder=""
                                wire:model.lazy="link_url">
                            @error('link_url')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit"
                            class="btn btn-success">{{ $editing == true ? 'Update' : 'Create' }}</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
