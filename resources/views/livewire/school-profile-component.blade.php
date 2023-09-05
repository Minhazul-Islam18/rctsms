<div>
    @section('page-title')
        {{ 'Settings-School Profile' }}
    @endsection
    <form action="" wire:submit='SaveGeneralSettings'>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="h5 m-0">
                    General Information
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            <div class="card-body">
                <div class="row g-2">
                    <div class="col-6 col-md-6 col-sm-12">
                        <div class="">
                            <label for="" class="form-label">School Name</label>
                            <input type="text" class="form-control" name="" id=""
                                wire:model.blur='settings.school_name' placeholder="">
                        </div>
                    </div>
                    <div class="col-6 col-md-6 col-sm-12">
                        <div class="">
                            <label for="" class="form-label">Established At</label>
                            <input type="text" class="form-control" name="" id=""
                                wire:model.blur='settings.established_at' placeholder="">
                        </div>
                    </div>
                    <div class="col-6 col-md-6 col-sm-12">
                        <div class="">
                            <label for="" class="form-label">EIIN no.</label>
                            <input type="text" class="form-control" name="" id=""
                                wire:model.blur='settings.eiin' placeholder="">
                        </div>
                    </div>
                    <div class="col-6 col-md-6 col-sm-12">
                        <div class="">
                            <label for="" class="form-label">Domain <sub>(https://domain.com)</sub></label>
                            <input type="text" class="form-control" name="" id=""
                                wire:model.blur='settings.domain' placeholder="">
                        </div>
                    </div>
                    <div class="col-6 col-md-6 col-sm-12">
                        <div class="">
                            <label for="" class="form-label">Contact Number</label>
                            <input type="text" class="form-control" name="" id=""
                                wire:model.blur='settings.contact_number' placeholder="">
                        </div>
                    </div>
                    <div class="col-6 col-md-6 col-sm-12">
                        <div class="">
                            <label for="" class="form-label">Contact Mail</label>
                            <input type="text" class="form-control" name="" id=""
                                wire:model.blur='settings.contact_mail' placeholder="">
                        </div>
                    </div>
                    <div class="col-6 col-md-6 col-sm-12">
                        <div class="mb-3">
                            <label for="" class="form-label">Address</label>
                            <textarea class="form-control" wire:model.blur='settings.address' name="" id="" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="col-6 col-md-6 col-sm-12">
                        <div class="mb-3">
                            <label for="" class="form-label">History</label>
                            <textarea class="form-control" wire:model.blur='settings.history' name="" id="" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>

            </div>
        </div>
    </form>
    <div class="row g-2 mt-2">
        <div class="col-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-primary">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($individuals as $item)
                                    <tr class="">
                                        <td scope="row">{{ $item->person_name }}</td>
                                        <td>
                                            <img src="{{ asset('storage') }}/{{ $item->person_image }}" class="w-25"
                                                alt="">
                                        </td>
                                        <td class="d-flex gap-3">
                                            <button class="btn btn-sm btn-info" type="button"
                                                wire:click='editIndividual({{ $item->id }})'>
                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                            <button class="btn btn-sm btn-danger" type="button"
                                                wire:click='deleteIndividual({{ $item->id }})'>
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                @if ($individuals == null)
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
                    <span class="h5 m-0 text-white">{{ $editing == true ? 'Update' : 'Create' }} Person Data</span>
                </div>
                <div class="card-body">
                    <form wire:submit='{{ $editing == true ? 'updateIndividual' : 'SavePerson' }}'>
                        @if ($person['image'])
                            <img src="/storage/{{ $person['image'] }}" class="w-25" alt="">
                        @endif
                        {{-- @if ($person['image']->temporaryUrl())
                            <img src="{{ $person['image']->temporaryUrl() }}" class="w-25 mb-2" alt="">
                        @endif --}}
                        <div class="mb-3">
                            <label for="" class="form-label">Image</label>
                            <input type="file" wire:model.blur='person.image' class="form-control" name=""
                                id="yu{{ $iteration }}">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Name</label>
                            <input type="text" wire:model.blur='person.name' class="form-control" name=""
                                id="">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Post</label>
                            <input type="text" wire:model.blur='person.post' class="form-control" name=""
                                id="">
                        </div>
                        @if ($person['signiture'])
                            <img src="/storage/{{ $person['signiture'] }}" class="w-25" alt="">
                        @endif
                        <div class="mb-3">
                            <label for="" class="form-label">Signature</label>
                            <input type="file" wire:model.blur='person.signiture' class="form-control"
                                name="" id="syu{{ $iteration }}">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Words</label>
                            <textarea class="form-control" wire:model.blur='person.words' name="" id="" rows="3"></textarea>
                        </div>
                        <button type="submit"
                            class="btn btn-primary">{{ $editing == true ? 'Update' : 'Create' }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
