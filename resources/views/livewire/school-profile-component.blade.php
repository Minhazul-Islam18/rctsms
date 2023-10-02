    @section('page-title')
        {{ 'Settings-School Profile' }}
    @endsection
    @section('page-styles')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" />
    @endsection
    @section('page-scripts')
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>
        <script>
            $('#history').summernote({
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['misc', ['undo', 'redo']],
                    ['insert', ['link']],
                    ['para', ['ul']]
                ],
                callbacks: {
                    onChange: function(contents, $editable) {
                        @this.set('settings.history', contents);
                        // console.log(contents);
                    }
                }
            });
        </script>
    @endsection
    <div>
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
                        <div class="col-12 col-md-6 col-sm-12">
                            <div class="">
                                <label for="" class="form-label">School Name</label>
                                <input type="text" class="form-control" name="" id=""
                                    wire:model.defer.blur='settings.school_name' placeholder="">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label for="" class="form-label">Location <sub>(Place Embeded Code
                                        Here.)</sub></label>
                                <textarea class="form-control" wire:model.defer.blur='settings.location' name="" id="" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-sm-12">
                            <div class="">
                                <label for="" class="form-label">Established At</label>
                                <input type="text" class="form-control" name="" id=""
                                    wire:model.defer.blur='settings.established_at' placeholder="">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-sm-12">
                            <div class="">
                                <label for="" class="form-label">EIIN no.</label>
                                <input type="text" class="form-control" name="" id=""
                                    wire:model.defer.blur='settings.eiin' placeholder="">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-sm-12">
                            <div class="">
                                <label for="" class="form-label">Domain <sub>(https://domain.com)</sub></label>
                                <input type="text" class="form-control" name="" id=""
                                    wire:model.defer.blur='settings.domain' placeholder="">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-sm-12">
                            <div class="">
                                <label for="" class="form-label">Contact Number</label>
                                <input type="text" class="form-control" name="" id=""
                                    wire:model.defer.blur='settings.contact_number' placeholder="">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-sm-12">
                            <div class="">
                                <label for="" class="form-label">Contact Mail</label>
                                <input type="text" class="form-control" name="" id=""
                                    wire:model.defer.blur='settings.contact_mail' placeholder="">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label for="" class="form-label">Address</label>
                                <textarea class="form-control" wire:model.defer.blur='settings.address' name="" id="" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-sm-12" wire:ignore>
                            <div class="mb-3">
                                <label for="" class="form-label">History</label>
                                <textarea class="form-control" wire:model.defer.blur='settings.history' name="" id="history" rows="3">{!! $this->settings['history'] !!}</textarea>
                            </div>
                        </div>
                        <div class="row gx-1 mb-2">
                            <div class="col-3">
                                <span class="text-info" wire:loading
                                    wire:target='settings.history_image'>Uploading....</span>
                                @if (isset($this->settings['history_image']) &&
                                        is_object($this->settings['history_image']) &&
                                        method_exists($this->settings['history_image'], 'temporaryUrl'))
                                    <img class="rounded border border-3" style="max-width: 100%"
                                        src="{{ $this->settings['history_image']->temporaryUrl() }}" alt="">
                                @else
                                    <img class="rounded border border-3" style="max-width: 100%"
                                        src="/storage/{{ $this->settings['history_image_preview'] }}" alt="">
                                @endif
                            </div>
                            <div class="col-9">
                                <div class="mb-3">
                                    <label for="" class="form-label">History image</label>
                                    <input type="file" class="form-control"
                                        wire:model.defer.blur="settings.history_image" id="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>

                </div>
            </div>
        </form>
    </div>
