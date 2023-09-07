<div>
    @section('page-title')
        {{ 'Notices' }}
    @endsection
    <div class="row g-2">
        <div class="col-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-body">
                    @foreach ($notices as $notice)
                        <div class="d-flex justify-content-between align-item-center">
                            <div class="d-flex flex-column">
                                <h3>{{ $notice->title }}</h3>
                                <p class="text-body">{{ $notice->description }}</p>
                            </div>
                            <div class="d-flex flex-row align-items-center justify-content-end gap-2">
                                <button class="btn btn-warning" wire:click="viewNotice({{ $notice->id }})">View</button>
                                <button class="btn btn-info" wire:click="editNotice({{ $notice->id }})">Edit</button>
                                <button class="btn btn-danger"
                                    wire:click="confirmDelete({{ $notice->id }})">Delete</button>
                            </div>
                        </div>
                    @endforeach
                    {{ $notices->links() }}
                    @if ($notices->count() <= 0)
                        <p class="text-body h4 m-0">Nothing Found</p>
                    @endif
                    @if ($willDeletenoticeId)
                        <div class="modal fade show d-block" id="confirmationDelete" tabindex="-1"
                            data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                            aria-labelledby="modalTitleId" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTitleId">Confirmation</h5>
                                        <button type="button" wire:click="cancelDeleteNotice" class="btn-close"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h4 class="m-0 text-body">Are you want to Delete this Notice?</h4>
                                    </div>
                                    <div class="modal-footer">
                                        <button wire:click="cancelDeleteNotice" type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-danger"
                                            wire:click="deleteNotice">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if ($isOpen && $notice)
                        <div class="popup">
                            <div class="popup-content">
                                <h2 class="mb-2 d-block text-center py-2 border-bottom">{{ $notice->title }}</h2>
                                <p class="text-body mb-2">{{ $notice->description }}</p>
                                @foreach (json_decode($notice->files) as $itm)
                                    <button class="btn btn-warning btn-sm"
                                        wire:click="downloadFile('{{ $itm }}')"
                                        type="button">Download</button>
                                @endforeach
                                <div class="d-block text-start mt-3">
                                    <button class="btn btn-success" wire:click="closeModal">Close</button>
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
                    <h3 class="m-0">{{ $editing == true ? 'Update' : 'Create' }} Notice</h3>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="{{ $editing == true ? 'updateNotice' : 'createNotice' }}">
                        <div class="mb-3">
                            <label for="" class="form-label">Title:</label>
                            <input type="text" class="form-control" name="" id="" placeholder=""
                                wire:model="title">
                            @error('title')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Content:</label>
                            <textarea class="form-control" name="" id="" rows="3" wire:model="description"></textarea>
                            @error('content')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="HeaderImage{{ $iteration }}" class="form-label">Attachment</label>
                            <input multiple type="file" wire:model='files' id="HeaderImage{{ $iteration }}"
                                accept="" class="form-control">
                            @error('files')
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        <button type="submit"
                            class="btn btn-success">{{ $editing == true ? 'Update' : 'Create' }}</button>
                        @if ($editing)
                            <button type="button" class="btn btn-danger"
                                wire:click='cancelEdit'>{{ 'Cancel' }}</button>
                        @endif
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
