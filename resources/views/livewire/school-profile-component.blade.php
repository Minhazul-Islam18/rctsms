<div>
    @section('page-title')
        {{ 'Settings-School Profile' }}
    @endsection
    <div class="row g-2 mt-2">
        <div class="col-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form wire:submit="hello">
                        <div class="row">
                            <div class="col-3">
                                <span wire:target='person_image' wire:loading class="text-primary">Uploading....</span>
                                @if ($person_image)
                                    <img src="{{ $person_image->temporaryUrl() }}" alt=""
                                        class="rounded-1 w-100">
                                @endif
                            </div>
                            <div class=" {{ isset($person_image) ? 'col-9' : 'col-12' }}">
                                <div class="mb-3">
                                    <label for="" class="form-label"> Person Image</label>
                                    <input accept="image/jpeg, image/svg, image/png, image/jpg, image/gif"
                                        type="file" wire:model='person_image' class="form-control" name=""
                                        id="">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Person Name</label>
                            <input type="text" wire:model='person_name' class="form-control" name=""
                                id="">
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <span wire:target='person_signiture' wire:loading
                                    class="text-primary">Uploading....</span>
                                @if ($person_signiture)
                                    <img src="{{ $person_signiture->temporaryUrl() }}" alt=""
                                        class="rounded-1 w-100">
                                @endif
                            </div>
                            <div class=" {{ isset($person_signiture) ? 'col-9' : 'col-12' }}">
                                <div class="mb-3">
                                    <label for="" class="form-label">Signature</label>
                                    <input accept="image/jpeg, image/svg, image/png, image/jpg, image/gif"
                                        type="file" wire:model='person_signiture'
                                        id="person_signiture{{ $iteration }}" class="form-control" name=""
                                        id="">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Person Words</label>
                            <textarea class="form-control" wire:model='person_words' name="" id="" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
