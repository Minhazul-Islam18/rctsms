@section('page-title')
    {{ 'Class List' }}
@endsection

<div>
    <div class="row g-2 mt-2">
        <div class="col-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-primary">
                            <thead>
                                <tr>
                                    <th scope="col">Class</th>
                                    <th scope="col">Student</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($classes as $item)
                                    <tr class="" wire:key='{{ $item->index }}'>
                                        <td scope="row">{{ $item->class_name }}</td>
                                        <td>
                                            {{ $item->boys + $item->girls }}
                                        </td>
                                        <td class="d-flex gap-3">
                                            <button class="btn btn-sm btn-info" type="button"
                                                wire:click='EditClass({{ $item->id }})'>
                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                            <button class="btn btn-sm btn-danger" type="button"
                                                wire:click='DeleteClass({{ $item->id }})'>
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                {{-- <div class="d-flex">{{ $classes->links() }}</div> --}}
                                @if ($classes->count() <= 0)
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
        <div class="col-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header py-3">
                    <span class="h5 m-0 text-white">{{ $fields['status'] == true ? 'Update' : 'Create' }} Class</span>
                </div>
                <div class="card-body">
                    <form wire:submit='{{ $fields['status'] == true ? 'UpdateClass' : 'SaveClass' }}'>

                        <div class="mb-3">
                            <label for="" class="form-label">Name</label>
                            <input type="text" wire:model.blur='fields.class_name' class="form-control"
                                name="" id="">
                            <div class="text-danger py-1 px-2 mt-1">
                                @error('fields.class_name')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Total Boys</label>
                            <input type="text" wire:model.blur='fields.boys' class="form-control" name=""
                                id="">
                            <div class="text-danger py-1 px-2 mt-1">
                                @error('fields.boys')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Total Girls</label>
                            <input type="text" wire:model.blur='fields.girls' class="form-control" name=""
                                id="">
                            <div class="text-danger py-1 px-2 mt-1">
                                @error('fields.girls')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Observation</label>
                            <textarea class="form-control" wire:model.blur='fields.observation' name="" id="" rows="3"></textarea>
                            <div class="text-danger py-1 px-2 mt-1">
                                @error('fields.observation')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <button type="submit"
                            class="btn btn-primary">{{ $fields['status'] == true ? 'Update' : 'Create' }}</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-primary">
                            <thead>
                                <tr>
                                    <th scope="col">Class</th>
                                    <th scope="col">Section</th>
                                    <th scope="col">Student</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sections as $item)
                                    <tr class="" wire:key='{{ $item->index }}'>
                                        <td scope="row">{{ $item->classes->class_name }}</td>
                                        <td>
                                            {{ $item->section_name }}
                                        </td>
                                        <td>
                                            {{ $item->section_student }}
                                        </td>
                                        <td class="d-flex gap-3">
                                            <button class="btn btn-sm btn-info" type="button"
                                                wire:click='EditSection({{ $item->id }})'>
                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                            <button class="btn btn-sm btn-danger" type="button"
                                                wire:click='DeleteSection({{ $item->id }})'>
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                {{-- <div class="d-flex">{{ $sections->links() }}</div> --}}
                                @if ($sections->count() <= 0)
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
        <div class="col-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header py-3">
                    <span class="h5 m-0 text-white">{{ $fields['section_editing'] == true ? 'Update' : 'Create' }}
                        Section</span>
                </div>
                <div class="card-body">
                    <form wire:submit='{{ $fields['section_editing'] == true ? 'UpdateSection' : 'SaveSection' }}'>
                        <div class="mb-3">
                            <label for="" class="form-label">Class</label>
                            <select class="form-select form-select-lg" name=""
                                wire:model.blur='fields.class_id' id="">'
                                <option value="">Select Class</option>
                                @foreach ($classes as $item)
                                    <option wire:key='{{ $item->id }}' value="{{ $item->id }}">
                                        {{ __($item->class_name) }}</option>
                                @endforeach
                            </select>
                            <div class="text-danger py-1 px-2 mt-1">
                                @error('fields.class_id')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Total Students</label>
                            <input type="text" wire:model.blur='fields.section_student' class="form-control"
                                name="" id="">
                            <div class="text-danger py-1 px-2 mt-1">
                                @error('fields.section_student')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Section Name</label>
                            <input type="text" wire:model.blur='fields.section_name' class="form-control"
                                name="" id="">
                            <div class="text-danger py-1 px-2 mt-1">
                                @error('fields.section_name')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <button type="submit"
                            class="btn btn-primary">{{ $fields['section_editing'] == true ? 'Update' : 'Create' }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
