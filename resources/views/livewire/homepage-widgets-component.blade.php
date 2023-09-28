    @section('page-title')
        {{ 'About School Widget' }}
    @endsection
    @section('page-scripts')
        <script src="https://unpkg.com/@nextapps-be/livewire-sortablejs@0.3.0/dist/livewire-sortable.js"></script>
    @endsection
    <div>

        <div class="row g-2">
            <div class="col-12 col-md-5 col-sm-12">
                <div class="card">
                    <div class="card-body" wire:sortable="ReOrder" wire:sortable.options="{ animation: 100 }">
                        @foreach ($widgets as $widget)
                            <div wire:sortable.item="{{ $widget->id }}"
                                class="d-flex flex-wrap justify-content-between align-item-center py-2 border-bottom">
                                <div class="d-flex flex-column">
                                    <h4 class="m-0">{{ $widget->title }}</h4>
                                </div>
                                <div class="d-flex flex-row align-items-center justify-content-end gap-2">
                                    <button class="btn btn-info btn-sm" wire:click="editWidget({{ $widget->id }})"><i
                                            class="bi bi-pencil-square"></i></button>
                                    <button class="btn btn-danger btn-sm"
                                        wire:click="confirmDelete({{ $widget->id }})">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </div>
                        @endforeach
                        {{ $widgets->links() }}
                        @if ($widgets->isEmpty())
                            <h5 class="d-block text-center m-0">{{ __('Nothing Found') }}</h5>
                        @endif
                        @if ($willDeleteWidgetId)
                            <div class="modal fade show d-block" id="confirmationDelete" tabindex="-1"
                                data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                aria-labelledby="modalTitleId" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                    role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalTitleId">Confirmation</h5>
                                            <button type="button" wire:click="cancelDeleteWidget" class="btn-close"
                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h4 class="m-0 text-body">Are you want to Delete this Widget?</h4>
                                        </div>
                                        <div class="modal-footer">
                                            <button wire:click="cancelDeleteWidget" type="button"
                                                class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-danger"
                                                wire:click="deleteWidget">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-7 col-sm-12">
                <div class="card">
                    <div class="card-header py-3 px-4">
                        <h3 class="m-0">{{ $editing == true ? 'Update' : 'Create' }} Widget</h3>
                    </div>
                    <div class="card-body">
                        <form wire:submit="{{ $editing == true ? 'updateWidget' : 'createWidget' }}">
                            <div class="row">
                                <div class="col-3">
                                    <span wire:target='image' wire:loading class="text-primary">Uploading....</span>
                                    @if ($image)
                                        <img src="{{ $image->temporaryUrl() }}" alt=""
                                            class="rounded-1 w-100 mb-1">
                                    @elseif ($imageName)
                                        <img src="/storage/{{ $imageName }}" alt=""
                                            class="rounded-1 w-100 mb-1">
                                    @endif
                                </div>
                                <div class="pb-3 {{ isset($image) ? 'col-9' : 'col-12' }}">
                                    <label for="HeaderImage{{ $iteration }}" class="form-label">Image</label>
                                    <input wire:model='image' id="HeaderImage{{ $iteration }}"
                                        accept="image/jpeg, image/svg, image/png, image/jpg" type="file"
                                        class="form-control">
                                </div>
                                @error('image')
                                    <div class="alert alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Name:</label>
                                <input type="text" class="form-control" name="" id="" placeholder=""
                                    wire:model="widget_name">
                                @error('widget_name')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- @dd($rows) --}}
                            <div x-data="{ rows: @entangle('rows') }" wire:ignore>
                                <div x-ref="repeater" id="repeater">
                                    <template x-for="(row, index) in rows" :key="index">
                                        <div class="d-flex flex-column flex-md-row mb-2 gap-2" data-repeater-item>
                                            <div class="w-md-50 w-sm-100 w-100">
                                                <label class="form-label" for="">Link Text</label>
                                                <input class="form-control" type="text" x-model="row.text" />
                                            </div>
                                            <div class="w-md-50 w-sm-100 w-100">
                                                <label class="form-label" for="">Link Url</label>
                                                <input class="form-control" type="text" x-model="row.url" />
                                            </div>
                                            <button class="btn btn-danger" type="button"
                                                @click="rows.splice(index, 1)">Delete</button>
                                        </div>
                                    </template>
                                    <button class="btn btn-warning mb-md-4 mb-sm-2 mb-2" type="button"
                                        @if ($editing) x-on:click="console.log({rows})" @endif
                                        @click="rows.push({ text: '', url: '' })">Add Link</button>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success"
                                x-on:click="console.log({rows})">{{ $editing == true ? 'Update' : 'Create' }}</button>
                            @if ($editing)
                                <button type="button" wire:click='cancelEdit' class="btn btn-danger">Cancel</button>
                            @endif
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
