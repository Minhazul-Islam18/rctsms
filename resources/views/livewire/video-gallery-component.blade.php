@section('page-title')
    {{ 'Class gallery' }}
@endsection
@section('page-scripts')
    <script src="https://unpkg.com/@nextapps-be/livewire-sortablejs@0.3.0/dist/livewire-sortable.js"></script>
@endsection
<div>
    <div class="row g-2 mt-2">
        <div class="col-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header py-3">
                    <span class="h5 m-0 text-white">{{ $actions['edit'] == true ? 'Update' : 'Add' }}
                        Video</span>
                </div>
                <div class="card-body">
                    <form wire:submit='{{ $actions['edit'] == true ? 'update' : 'store' }}'>
                        <div class="row gx-2">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="" class="form-label">Video ID</label>
                                    <input type="text" class="form-control" wire:model.defer='link' name=""
                                        id="" aria-describedby="helpId" placeholder="">
                                    <div class="text-danger py-1 px-2 mt-1">
                                        @error('link')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit"
                            class="btn btn-primary me-2">{{ $actions['edit'] == true ? 'Update' : 'Create' }}</button>
                        @if ($actions['edit'] == true)
                            <button type="button" wire:click='resetAction'
                                class="btn btn-danger">{{ 'Cancel' }}</button>
                        @endif
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-primary">
                            <thead>
                                <tr>
                                    <th scope="col">video</th>
                                    <th scope="col">link</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody data-sortable="row" wire:sortable="ReOrder"
                                wire:sortable.options="{ animation: 100 }">
                                @foreach ($gallery as $item)
                                    <tr wire:sortable.item="{{ $item->id }}" class=""
                                        wire:key='{{ $item->class }}'>
                                        <td scope="row">
                                            <div class="">
                                                <iframe width="240" height="auto"
                                                    src="https://www.youtube.com/embed/{{ $item->link }}">
                                                </iframe>
                                            </div>
                                        </td>
                                        <td scope="row">
                                            <div class="text-truncate">
                                                {{ $item->link }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-3">
                                                <button class="btn btn-sm btn-info" type="button"
                                                    wire:click='edit({{ $item->id }})'>
                                                    <i class="bi bi-pencil-square"></i>
                                                </button>
                                                <button class="btn btn-sm btn-danger" type="button"
                                                    wire:click='destroy({{ $item->id }})'>
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                                <div class="d-flex">{{ $gallery->links() }}</div>
                                @if ($gallery->count() <= 0)
                                    <tr>
                                        <td colspan="3" class="text-center">{{ 'Nothing Found' }}</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
