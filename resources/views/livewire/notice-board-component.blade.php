    @section('page-title')
        {{ 'Notices' }}
    @endsection
    @section('page-scripts')
        <script src="https://unpkg.com/@nextapps-be/livewire-sortablejs@0.3.0/dist/livewire-sortable.js"></script>
    @endsection
    <div>
        <div class="row g-2 mt-2 flex-sm-row-reverse d-flex flex-column-reverse flex-sm-column flex-md-row">
            <div class="col-12 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-header py-3 border-bottom">
                        <div class="h5 m-0 fw-bold d-flex justify-content-center">
                            Notices
                        </div>
                    </div>
                    <div class="card-body py-2 px-2" wire:sortable="ReOrder" wire:sortable.options="{ animation: 100 }">
                        @foreach ($notices as $notice)
                            <div wire:sortable.item="{{ $notice->id }}"
                                class="border-1 border-bottom px-2 py-2 d-flex justify-content-between align-item-center flex-wrap">
                                <div class="d-flex flex-column">
                                    <h3>{{ $notice->title }}</h3>
                                </div>
                                <div class="d-flex flex-wrap flex-row align-items-center justify-content-end gap-2">
                                    <button class="btn btn-sm btn-warning"
                                        wire:click="viewNotice({{ $notice->id }})"><i
                                            class="bi bi-eye-fill"></i></button>
                                    <button class="btn btn-sm btn-info" wire:click="editNotice({{ $notice->id }})"><i
                                            class="bi bi-pencil-square"></i></button>
                                    <button class="btn btn-sm btn-danger"
                                        wire:click="confirmDelete({{ $notice->id }})"><i
                                            class="bi bi-trash"></i></button>
                                </div>
                            </div>
                        @endforeach
                        {{ $notices->links() }}
                        @if ($notices->count() <= 0)
                            <p class="text-body h5 text-center m-0">Nothing Found</p>
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
                                            <button wire:click="cancelDeleteNotice" type="button"
                                                class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-danger"
                                                wire:click="deleteNotice">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if ($isOpen && $this->Vnotice)
                            <div class="popup">
                                <div class="popup-content">
                                    <h2 class="mb-2 d-block text-center py-2 border-bottom">
                                        {{ $this->Vnotice['title'] }}</h2>
                                    <p class="text-body mb-2">{{ $this->Vnotice['description'] }}</p>
                                    @foreach (json_decode($this->Vnotice['files']) as $itm)
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
            <div class="col-12 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-header py-3 px-4">
                        <h3 class="m-0">{{ $editing == true ? 'Update' : 'Create' }} Notice</h3>
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent="{{ $editing == true ? 'updateNotice' : 'createNotice' }}">
                            <div class="mb-3">
                                <label for="" class="form-label">Category</label>
                                <select class="form-select" name="" id=""
                                    wire:model='notice_category_id'>
                                    <option>Select one</option>
                                    @foreach ($nCategories as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $item->id == $notice_category_id ? 'selected' : null }}
                                            wire:key='{{ $item->id }}'>
                                            {{ $item->category_name }}</option>
                                    @endforeach
                                </select>
                                @error('notice_category_id')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
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
            <div class="col-12 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-header py-3 border-bottom">
                        <div class="h5 m-0 fw-bold d-flex justify-content-center">
                            Notices
                        </div>
                    </div>
                    <div class="card-body py-2 px-2" wire:sortable="ReOrderCategory"
                        wire:sortable.options="{ animation: 100 }">
                        @foreach ($nCategories as $category)
                            <div wire:sortable.item="{{ $category->id }}"
                                class="border-1 border-bottom px-2 py-2 d-flex justify-content-between align-item-center flex-wrap">
                                <div class="d-flex flex-column">
                                    <h5 class="m-0">{{ $category->category_name }}</h5>
                                </div>
                                <div class="d-flex flex-wrap flex-row align-items-center justify-content-end gap-2">
                                    <button class="btn btn-sm btn-info"
                                        wire:click="editNoticeCategory({{ $category->id }})"><i
                                            class="bi bi-pencil-square"></i></button>
                                    <button class="btn btn-sm btn-danger"
                                        wire:click="deleteNoticeCategory({{ $category->id }})"><i
                                            class="bi bi-trash"></i></button>
                                </div>
                            </div>
                        @endforeach
                        {{ $nCategories->links() }}
                        @if ($nCategories->count() <= 0)
                            <p class="text-body h5 text-center m-0">Nothing Found</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-header py-3 px-4">
                        <h3 class="m-0">{{ $editing == true ? 'Update' : 'Create' }} Notice Category</h3>
                    </div>
                    <div class="card-body">
                        <form
                            wire:submit.prevent="{{ $editingCategory == true ? 'updateNoticeCategory' : 'createNoticeCategory' }}">
                            <div class="mb-3">
                                <label for="" class="form-label">Category Name:</label>
                                <input type="text" class="form-control" name="" id=""
                                    placeholder="" wire:model="category_name">
                                @error('category.name')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit"
                                class="btn btn-success">{{ $editingCategory == true ? 'Update' : 'Create' }}</button>
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
