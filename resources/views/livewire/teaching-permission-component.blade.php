@section('page-title')
    {{ 'Teaching Permission' }}
@endsection

<div>
    <div class="row g-2 mt-2">
        <div class="col-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header py-3">
                    <span class="h5 m-0 text-white">{{ $fields['status'] == true ? 'Update' : 'Create' }}
                        Permission</span>
                </div>
                <div class="card-body">
                    <form wire:submit='{{ $fields['status'] == true ? 'UpdateClass' : 'SaveClass' }}'
                        enctype="multipart/form-data">
                        <div class="row gx-2">
                            <div class="col-6 col-md-6 col-sm-12" wire:ignore>
                                <div class="mb-3">
                                    <label for="" class="form-label">Files</label>
                                    <input multiple type="file" wire:model='fields.files' class="form-control"
                                        name="" id="iso{{ $iteration }}">
                                </div>
                            </div>
                            <div class="col-6 col-md-6 col-sm-12" wire:ignore>
                                <div class="mb-3">
                                    <label for="" class="form-label">Description</label>
                                    <textarea wire:model.blur='fields.description' class="form-control" name="" id="" rows="3"></textarea>
                                    <div class="text-danger py-1 px-2 mt-1">
                                        @error('fields.description')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit"
                            class="btn btn-primary me-2">{{ $fields['status'] == true ? 'Update' : 'Create' }}</button>
                        @if ($fields['status'] == true)
                            <button type="button" wire:click='CancelEdit'
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
                                    <th scope="col">Description</th>
                                    <th scope="col">Files</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissions as $item)
                                    {{-- @dd($item) --}}
                                    <tr class="" wire:key='{{ $item->index }}'>
                                        <td scope="row">
                                            <div class="text-truncate">{{ $item->description }}</div>
                                        </td>
                                        <td>
                                            {{-- {{ json_decode($item->files) }} --}}
                                            {{-- @if (is_array($item->files)) --}}
                                            @foreach (json_decode($item->files) as $itm)
                                                <button class="btn btn-warning btn-sm"
                                                    wire:click="downloadFile('{{ $itm }}')"
                                                    type="button">Download</button>
                                            @endforeach
                                            {{-- @else --}}
                                            {{-- <button class="btn btn-warning btn-sm"
                                                    wire:click="downloadFile('{{ $item->files }}')"
                                                    type="button">Download</button> --}}
                                            {{-- @endif --}}

                                        </td>
                                        <td>
                                            <div class="d-flex gap-3">
                                                <button class="btn btn-sm btn-info" type="button"
                                                    wire:click='EditClass({{ $item->id }})'>
                                                    <i class="bi bi-pencil-square"></i>
                                                </button>
                                                <button class="btn btn-sm btn-danger" type="button"
                                                    wire:click='DeleteClass({{ $item->id }})'>
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                                <div class="d-flex">{{ $permissions->links() }}</div>
                                @if ($permissions->count() <= 0)
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
