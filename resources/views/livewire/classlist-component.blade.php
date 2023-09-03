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
                                    <th scope="col">Name</th>
                                    <th scope="col">Student</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($classes as $item)
                                    <tr class="" wire:key='{{ $item->index }}'>
                                        <td scope="row">{{ $item->class_name }}</td>
                                        <td>
                                            {{ $item->student_number }}
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
                                <div class="d-flex">{{ $classes->links() }}</div>
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
                            <label for="" class="form-label">Total Student</label>
                            <input type="text" wire:model.blur='fields.student_number' class="form-control"
                                name="" id="">
                            <div class="text-danger py-1 px-2 mt-1">
                                @error('fields.student_number')
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
    </div>
</div>
