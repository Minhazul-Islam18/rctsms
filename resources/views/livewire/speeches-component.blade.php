    @section('page-title')
        {{ 'Speeches-Persons' }}
    @endsection
    @section('page-scripts')
        <script src="https://unpkg.com/@nextapps-be/livewire-sortablejs@0.3.0/dist/livewire-sortable.js"></script>
    @endsection
    <div>
        <div class="row g-2 mt-2">
            <div class="col-12 col-md-6 col-sm-12">
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
                                <tbody wire:sortable="ReOrderPerson" wire:sortable.options="{ animation: 100 }">
                                    @foreach ($individuals as $item)
                                        <tr wire:sortable.item="{{ $item->id }}">
                                            <td scope="row">{{ $item->person_name }}</td>
                                            <td>
                                                <img src="{{ asset('storage') }}/{{ $item->person_image }}"
                                                    class="w-25" alt="">
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
            <div class="col-12 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-header py-3">
                        <span class="h5 m-0 text-white">{{ $editing == true ? 'Update' : 'Create' }} Person Data</span>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form wire:submit='{{ $editing == true ? 'updateIndividual' : 'SavePerson' }}'>
                            @if ($person['image'])
                                <img src="/storage/{{ $person['image'] }}" class="w-25" alt="">
                            @endif
                            @if (is_object($person['image']) && method_exists($person['image'], 'temporaryUrl'))
                                <img src="{{ $person['image']->temporaryUrl() }}" class="w-25 mb-2" alt="">
                            @endif
                            <div class="mb-3">
                                <label for="" class="form-label">Image</label>
                                <input type="file" wire:model.delay.blur='person.image' class="form-control"
                                    name="" id="yu{{ $iteration }}">
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Name</label>
                                <input type="text" wire:model.delay.blur='person.name' class="form-control"
                                    name="" id="">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Post</label>
                                <input type="text" wire:model.delay.blur='person.post' class="form-control"
                                    name="" id="">
                            </div>
                            @if ($person['signiture'])
                                <img src="/storage/{{ $person['signiture'] }}" class="w-25" alt="">
                            @endif
                            <div class="mb-3">
                                <label for="" class="form-label">Signature</label>
                                @if (is_object($person['signiture']) && method_exists($person['signiture'], 'temporaryUrl'))
                                    <img class="w-10" src="{{ $person['signiture']->temporaryUrl() }}"
                                        alt="">
                                @endif
                                <input type="file" wire:model.delay.blur='person.signiture' class="form-control"
                                    name="" id="syu{{ $iteration }}">
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Words</label>
                                <textarea class="form-control" wire:model.delay.blur='person.words' name="" id="" rows="3"></textarea>
                            </div>
                            <button type="submit"
                                class="btn btn-primary">{{ $editing == true ? 'Update' : 'Create' }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
