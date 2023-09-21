@section('page-title')
    {{ 'Teacher & Staffs' }}
@endsection

@section('page-scripts')
    <script>
        $('#status').change(function() {
            if ($(this).val() === '0') {
                $('#start-date-div').show();
                $('#end-date-div').show();
            } else {
                $('#start-date-div').hide();
                $('#end-date-div').hide();
            }

        });
        $('.input-group.date input').change(function() {
            console.log($(this).val());
        });
    </script>
@endsection
<div>
    <div class="row g-2 mt-2 flex-sm-row-reverse d-flex flex-column-reverse flex-sm-column flex-md-row">
        <div class="col-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header py-3">
                    <span class="h5 m-0 text-white">{{ $fields['status'] == true ? 'Update' : 'Create' }} Teacher Or
                        Staff</span>
                </div>
                <div class="card-body">
                    <form wire:submit='{{ $fields['status'] == true ? 'UpdateClass' : 'SaveClass' }}'>
                        <div class="row">
                            <span wire:target="fields.image" wire:loading class="text-primary">Uploading....</span>
                            @if ($fields['image_in_edit'] || $fields['image'])
                                <div class="col-4">
                                    @if (is_object($fields['image']) && method_exists($fields['image'], 'temporaryUrl'))
                                        <img class="w-100" src="{{ $fields['image']->temporaryUrl() }}" alt="">
                                    @elseif ($fields['image_in_edit'])
                                        <img src="/storage/{{ $fields['image_in_edit'] }}" alt=""
                                            class="rounded-1 w-100 mb-1">
                                    @endif
                                </div>
                            @endif
                            <div class="{{ $fields['image_in_edit'] || $fields['image'] ? 'col-8' : 'col-12' }}">
                                <div class="mb-3">
                                    <label for="" class="form-label">Image</label>
                                    <input accept="image/jpeg, image/svg, image/png, image/jpg, image/webp"
                                        type="file" wire:model.defer='fields.image' class="form-control"
                                        name="" id="iso{{ $iteration }}">
                                </div>
                            </div>
                        </div>
                        <div class="text-danger py-1 px-2 mt-1">
                            @error('fields.image')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Employee Type</label>
                                    <select wire:model.defer.blur='fields.employee_type'
                                        class="form-select form-select-lg" name="" id="">
                                        <option value="teacher" selected>Teacher</option>
                                        <option value="staff">Staff</option>
                                    </select>
                                    <div class="text-danger py-1 px-2 mt-1">
                                        @error('fields.employee_type')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Name</label>
                                    <input type="text" wire:model.defer.blur='fields.name' class="form-control"
                                        name="" id="">
                                    <div class="text-danger py-1 px-2 mt-1">
                                        @error('fields.name')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Post</label>
                                    <input type="text" wire:model.defer.blur='fields.post' class="form-control"
                                        name="" id="">
                                    <div class="text-danger py-1 px-2 mt-1">
                                        @error('fields.post')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Educational Qualification</label>
                                    <textarea class="form-control" wire:model.defer='fields.educational_qualification' name="" id=""
                                        rows="3"></textarea>
                                    <div class="text-danger py-1 px-2 mt-1">
                                        @error('fields.educational_qualification')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Mobile</label>
                                    <input type="text" wire:model.defer.blur='fields.mobile' class="form-control"
                                        name="" id="">
                                    <div class="text-danger py-1 px-2 mt-1">
                                        @error('fields.mobile')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Email</label>
                                    <input type="text" wire:model.defer.blur='fields.email' class="form-control"
                                        name="" id="">
                                    <div class="text-danger py-1 px-2 mt-1">
                                        @error('fields.email')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Facebook</label>
                                    <input type="text" wire:model.defer.blur='fields.facebook' class="form-control"
                                        name="" id="">
                                    <div class="text-danger py-1 px-2 mt-1">
                                        @error('fields.facebook')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Website</label>
                                    <input type="text" wire:model.defer.blur='fields.website' class="form-control"
                                        name="" id="">
                                    <div class="text-danger py-1 px-2 mt-1">
                                        @error('fields.website')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Address</label>
                                    <textarea class="form-control" wire:model.defer='fields.address' name="" id="" rows="3"></textarea>
                                    <div class="text-danger py-1 px-2 mt-1">
                                        @error('fields.address')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Status</label>
                                    <select id="status" class="form-select form-select-lg"
                                        wire:model.defer='fields.active' name="" id="">
                                        <option value="1" selected>Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                    <div class="text-danger py-1 px-2 mt-1">
                                        @error('fields.active')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <div id="start-date-div" class="form-group" wire:ignore
                                    style="{{ $fields['status'] == true && $fields['start_date'] != null ? 'display: block' : 'display: none' }}">
                                    <div class="mb-3" id="">
                                        <label for="" class="form-label">Start Date</label>
                                        <input class="form-control" type="date" wire:model='fields.start_date'
                                            class="form-control" placeholder="dd-mm-yyyy">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <div id="end-date-div" class="form-group" wire:ignore
                                    style="{{ $fields['status'] && $fields['end_date'] != null ? 'display: block' : 'display: none' }}">
                                    <div class="mb-3" id="">
                                        <label for="" class="form-label">End Date</label>
                                        <input class="form-control" type="date" wire:model='fields.end_date'
                                            class="form-control" placeholder="dd-mm-yyyy">
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
        <div class="col-12 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="h5 m-0">Teachers</div>
                </div>
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
                            <tbody>
                                @foreach ($teachers as $item)
                                    <tr class="" wire:key='{{ $item->index }}'>
                                        <td scope="row">
                                            <img class="w-25" src="/storage/{{ $item->image }}" alt="">
                                            <span class="fw-bold d-block text-center mt-2">{{ $item->name }}</span>
                                        </td>
                                        <td>
                                            {{ $item->post }}
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
                                <div class="d-flex">{{ $teachers->links() }}</div>
                                @if ($teachers->count() <= 0)
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
                <div class="card-header">
                    <div class="h5 m-0">Staffs</div>
                </div>
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
                            <tbody>
                                @foreach ($staffs as $item)
                                    <tr class="" wire:key='{{ $item->index }}'>
                                        <td scope="row">
                                            <img class="w-25" src="/storage/{{ $item->image }}" alt="">
                                            <span class="fw-bold d-block text-center mt-2">{{ $item->name }}</span>
                                        </td>
                                        <td>
                                            {{ $item->post }}
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
                                <div class="d-flex">{{ $staffs->links() }}</div>
                                @if ($staffs->count() <= 0)
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
