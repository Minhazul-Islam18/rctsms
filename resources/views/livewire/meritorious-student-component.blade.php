@section('page-title')
    {{ 'Meritorious Students' }}
@endsection
@section('page-scripts')
    <script src="https://unpkg.com/@nextapps-be/livewire-sortablejs@0.3.0/dist/livewire-sortable.js"></script>
@endsection
<div>
    <div class="row g-2 mt-2 flex-sm-row-reverse d-flex flex-column-reverse flex-sm-column flex-md-row">
        <div class="col-12 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-primary">
                            <thead>
                                <tr>
                                    <th scope="col">Profile</th>
                                    <th scope="col">Post</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody wire:sortable="ReOrder" wire:sortable.options="{ animation: 100 }">
                                @foreach ($mStudents as $item)
                                    <tr wire:sortable.item="{{ $item->id }}" wire:key='{{ $item->index }}'>
                                        <td scope="row">
                                            <img class="w-25" src="/storage/{{ $item->image }}" alt="">
                                        </td>
                                        <td>
                                            {{ $item->name }}
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
                                <div class="d-flex">{{ $mStudents->links() }}</div>
                                @if ($mStudents->count() <= 0)
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
        <div class="col-12 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header py-3">
                    <span class="h5 m-0 text-white">{{ $actions['edit'] == true ? 'Update' : 'Create' }}
                        Student</span>
                </div>
                <div class="card-body">
                    <form wire:submit='{{ $actions['edit'] == true ? 'update' : 'store' }}'>
                        <div class="row">
                            <span wire:target="student_image" wire:loading class="text-primary">Uploading....</span>
                            @if (isset($actions['image']) || $student_image)
                                <div class="col-4">
                                    @if (is_object($student_image) && method_exists($student_image, 'temporaryUrl'))
                                        <img class="w-100" src="{{ $student_image->temporaryUrl() }}" alt="">
                                    @elseif ($actions['image'])
                                        <img src="/storage/{{ $actions['image'] }}" alt=""
                                            class="rounded-1 w-100 mb-1">
                                    @endif
                                </div>
                            @endif
                            <div class="{{ isset($actions['image']) || $student_image ? 'col-8' : 'col-12' }}">
                                <div class="mb-3">
                                    <label for="" class="form-label">Image</label>
                                    <input accept="image/jpeg, image/svg, image/png, image/jpg" type="file"
                                        wire:model='student_image' class="form-control" name="" id="iso">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Name</label>
                            <input type="text" wire:model.blur='student_name' class="form-control" name=""
                                id="">
                            <div class="text-danger py-1 px-2 mt-1">
                                @error('student_name')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Study Period</label>
                            <input type="text" wire:model.blur='student_study_period' class="form-control"
                                name="" id="">
                            <div class="text-danger py-1 px-2 mt-1">
                                @error('student_study_period')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Merits</label>
                            <textarea class="form-control" wire:model='student_merits' name="" id="" rows="3"></textarea>
                            <div class="text-danger py-1 px-2 mt-1">
                                @error('student_merits')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <button type="submit"
                            class="btn btn-primary">{{ $actions['edit'] == true ? 'Update' : 'Create' }}</button>
                        @if ($actions['edit'] == true)
                            <button type="button" wire:click='resetAction'
                                class="btn btn-danger">{{ 'Cancel' }}</button>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
