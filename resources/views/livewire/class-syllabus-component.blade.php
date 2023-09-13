@section('page-title')
    {{ 'Class Syllabus' }}
@endsection
{{-- @section('page-scripts')
    <script>
        document.querySelectorAll('.btn-warning').forEach(function(button) {
            button.addEventListener('click', function() {
                const escapedFile = this.getAttribute('data-file');
                @this.call('downloadFile', escapedFile);
            });
        });
    </script>
@endsection --}}
<div>
    <div class="row g-2 mt-2">
        <div class="col-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header py-3">
                    <span class="h5 m-0 text-white">{{ $fields['status'] == true ? 'Update' : 'Create' }}
                        Syllabus</span>
                </div>
                <div class="card-body">
                    <form wire:submit='{{ $fields['status'] == true ? 'UpdateClass' : 'SaveClass' }}'
                        enctype="multipart/form-data">
                        <div class="row gx-2">
                            <div class="col-12 col-md-6 col-sm-12" wire:ignore>
                                <div class="mb-3">
                                    <label for="" class="form-label">Files</label>
                                    <input multiple type="file" wire:model.defer='fields.files' class="form-control"
                                        name="" id="iso{{ $iteration }}">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="" class="form-label">Description</label>
                                    <textarea wire:model.defer='fields.description' class="form-control" name="" id="" rows="3"></textarea>
                                    <div class="text-danger py-1 px-2 mt-1">
                                        @error('fields.description')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="" class="form-label">Class Name</label>
                                    <input type="text" wire:model.defer='fields.class' class="form-control"
                                        name="" id="" rows="3"></input>
                                    <div class="text-danger py-1 px-2 mt-1">
                                        @error('fields.Class')
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
                                    <th scope="col">Class</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Files</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($syllabuses as $item)
                                    <tr class="" wire:key='{{ $item->class }}'>
                                        <td scope="row">
                                            <div class="text-truncate">{{ $item->class }}</div>
                                        </td>
                                        <td scope="row">
                                            <div class="text-truncate">
                                                {{ Illuminate\Support\Str::limit($item->description, $limit = 35, $end = '...') }}
                                            </div>
                                        </td>
                                        <td>
                                            @foreach (json_decode($item->files) as $itm)
                                                <button class="btn btn-warning btn-sm"
                                                    wire:click="downloadFile('{{ $itm }}')"
                                                    type="button">Download</button>
                                            @endforeach
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
                                <div class="d-flex">{{ $syllabuses->links() }}</div>
                                @if ($syllabuses->count() <= 0)
                                    <tr>
                                        <td colspan="3" class="text-center">{{ 'Nothing Found' }}</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    {{-- <livewire:class-syllabus-table> --}}
                </div>
            </div>
        </div>
    </div>
</div>
