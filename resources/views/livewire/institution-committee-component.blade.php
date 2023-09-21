@section('page-title')
    {{ 'Instutional Committee' }}
@endsection
@section('page-styles')
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css" />
@endsection
@section('page-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js">
    </script>
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
                            <tbody>
                                @foreach ($CommitteePersons as $item)
                                    <tr class="" wire:key='{{ $item->index }}'>
                                        <td scope="row">
                                            <img class="w-25" src="/storage/{{ $item->person_image }}" alt="">
                                            <span
                                                class="fw-bold d-block text-center mt-2">{{ $item->person_name }}</span>
                                        </td>
                                        <td>
                                            {{ $item->person_post }}
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
                                <div class="d-flex">{{ $CommitteePersons->links() }}</div>
                                @if ($CommitteePersons->count() <= 0)
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
                    <span class="h5 m-0 text-white">{{ $fields['status'] == true ? 'Update' : 'Create' }} Member</span>
                </div>
                <div class="card-body">
                    <form wire:submit='{{ $fields['status'] == true ? 'UpdateClass' : 'SaveClass' }}'>
                        <div class="row">
                            <span wire:target="fields.person_image" wire:loading
                                class="text-primary">Uploading....</span>
                            @if ($fields['image_in_edit'] || $fields['person_image'])
                                <div class="col-4">
                                    @if (is_object($fields['person_image']) && method_exists($fields['person_image'], 'temporaryUrl'))
                                        <img class="w-100" src="{{ $fields['person_image']->temporaryUrl() }}"
                                            alt="">
                                    @elseif ($fields['image_in_edit'])
                                        <img src="/storage/{{ $fields['image_in_edit'] }}" alt=""
                                            class="rounded-1 w-100 mb-1">
                                    @endif
                                </div>
                            @endif
                            <div
                                class="{{ $fields['image_in_edit'] || $fields['person_image'] ? 'col-8' : 'col-12' }}">
                                <div class="mb-3">
                                    <label for="" class="form-label">Image</label>
                                    <input accept="image/jpeg, image/svg, image/png, image/jpg" type="file"
                                        wire:model='fields.person_image' class="form-control" name=""
                                        id="iso{{ $iteration }}">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Name</label>
                            <input type="text" wire:model.blur='fields.person_name' class="form-control"
                                name="" id="">
                            <div class="text-danger py-1 px-2 mt-1">
                                @error('fields.person_name')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Post</label>
                            <input type="text" wire:model.blur='fields.person_post' class="form-control"
                                name="" id="">
                            <div class="text-danger py-1 px-2 mt-1">
                                @error('fields.person_post')
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
                            <label for="" class="form-label">Identity</label>
                            <textarea class="form-control" wire:model='fields.identity' name="" id="" rows="3"></textarea>
                            <div class="text-danger py-1 px-2 mt-1">
                                @error('fields.identity')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Address</label>
                            <textarea class="form-control" wire:model='fields.person_address' name="" id="" rows="3"></textarea>
                            <div class="text-danger py-1 px-2 mt-1">
                                @error('fields.person_address')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group" wire:ignore>
                            <div class="mb-3" id="filterDate2">
                                <label for="" class="form-label">Announced at</label>
                                <div class="input-group date" data-date-format="dd.mm.yyyy">
                                    <input type="date" wire:model='fields.announced_at' class="form-control"
                                        placeholder="dd-mm-yyyy">
                                    <span class="input-group-addon"><i class="bi bi-stopwatch"></i></span>
                                </div>
                            </div>
                            @error('fields.announced_at')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-group" wire:ignore>
                            <div class="mb-3" id="filterDate2">
                                <label for="" class="form-label">Expired at</label>
                                <div class="input-group date" data-date-format="dd.mm.yyyy">
                                    <input type="date" wire:model='fields.expired_at' class="form-control"
                                        placeholder="dd-mm-yyyy">
                                    <span class="input-group-addon"><i class="bi bi-stopwatch"></i></span>
                                </div>
                            </div>
                            @error('fields.expired_at')
                                {{ $message }}
                            @enderror
                        </div>
                        <button type="submit"
                            class="btn btn-primary">{{ $fields['status'] == true ? 'Update' : 'Create' }}</button>
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
