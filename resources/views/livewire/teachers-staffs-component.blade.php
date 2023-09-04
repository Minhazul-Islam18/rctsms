@section('page-title')
    {{ 'Teacher & Staffs' }}
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
                                    <th scope="col">Profile</th>
                                    <th scope="col">Post</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Persons as $item)
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
                                <div class="d-flex">{{ $Persons->links() }}</div>
                                @if ($Persons->count() <= 0)
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
                                        <img class="w-100" src="{{ $fields['image']->temporaryUrl() }}"
                                            alt="">
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
                                        type="file" wire:model='fields.image' class="form-control" name=""
                                        id="iso{{ $iteration }}">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Name</label>
                            <input type="text" wire:model.blur='fields.name' class="form-control" name=""
                                id="">
                            <div class="text-danger py-1 px-2 mt-1">
                                @error('fields.name')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Post</label>
                            <input type="text" wire:model.blur='fields.post' class="form-control" name=""
                                id="">
                            <div class="text-danger py-1 px-2 mt-1">
                                @error('fields.post')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Educational Qualification</label>
                            <textarea class="form-control" wire:model='fields.educational_qualification' name="" id=""
                                rows="3"></textarea>
                            <div class="text-danger py-1 px-2 mt-1">
                                @error('fields.educational_qualification')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Mobile</label>
                            <input type="text" wire:model.blur='fields.mobile' class="form-control" name=""
                                id="">
                            <div class="text-danger py-1 px-2 mt-1">
                                @error('fields.mobile')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Email</label>
                            <input type="text" wire:model.blur='fields.email' class="form-control" name=""
                                id="">
                            <div class="text-danger py-1 px-2 mt-1">
                                @error('fields.email')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Facebook</label>
                            <input type="text" wire:model.blur='fields.facebook' class="form-control"
                                name="" id="">
                            <div class="text-danger py-1 px-2 mt-1">
                                @error('fields.facebook')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Website</label>
                            <input type="text" wire:model.blur='fields.website' class="form-control"
                                name="" id="">
                            <div class="text-danger py-1 px-2 mt-1">
                                @error('fields.website')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Address</label>
                            <textarea class="form-control" wire:model='fields.address' name="" id="" rows="3"></textarea>
                            <div class="text-danger py-1 px-2 mt-1">
                                @error('fields.address')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">City</label>
                            <select class="form-select form-select-lg" wire:model='fields.is_resigned' name=""
                                id="">
                                <option value="0" selected>Present</option>
                                <option value="1">Resigned</option>
                            </select>
                            <div class="text-danger py-1 px-2 mt-1">
                                @error('fields.is_resigned')
                                    {{ $message }}
                                @enderror
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
    </div>
</div>