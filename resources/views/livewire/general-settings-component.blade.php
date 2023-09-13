    @section('page-title')
        {{ 'General Settings' }}
    @endsection
    @section('page-styles')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" />
    @endsection
    @section('page-scripts')
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>
        <script>
            $('#summernote').summernote({
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['misc', ['undo', 'redo']],
                    ['insert', ['link']],
                    ['para', ['ul']]
                ],
                callbacks: {
                    onChange: function(contents, $editable) {
                        @this.set('cookie.text', contents);
                        // console.log(contents);
                    }
                }
            });
        </script>
    @endsection
    <div>
        <div class="page-title-container mb-3">
            <div class="row">
                <div class="col mb-2">
                    <h1 class="mb-2 pb-0 display-4" id="title">Settings</h1>
                    <div class="text-muted font-heading text-small">
                        Let's manage those for your applications
                        so you can focus on building.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form class="row g-3" wire:submit='SaveGeneralSettings'>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                    <span wire:target='settings.site_logo' wire:loading
                                        class="text-primary">Uploading....</span>
                                    @if (
                                        $settings['site_logo'] &&
                                            is_object($settings['site_logo']) &&
                                            method_exists($settings['site_logo'], 'temporaryUrl'))
                                        <img src="{{ $settings['site_logo']->temporaryUrl() }}" class="w-25"
                                            alt="">
                                    @elseif ($settings['prev_logo'] != null)
                                        <img class="w-25 mb-2" src="{{ asset('storage') }}/{{ $settings['prev_logo'] }}"
                                            alt="">
                                    @endif

                                    <div class="py-3">
                                        <label for="" class="form-label">Logo</label>
                                        <input type="file" wire:model='settings.site_logo' class="form-control"
                                            name="" id="logo{{ $iteration }}">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                    <span wire:target='settings.favicon' wire:loading
                                        class="text-primary">Uploading....</span>
                                    @if (is_object($settings['favicon']) && method_exists($settings['favicon'], 'temporaryUrl'))
                                        <img src="{{ $settings['favicon']->temporaryUrl() }}" class="w-25"
                                            alt="">
                                    @elseif ($settings['prev_favicon'] != null)
                                        <img class="w-25 mb-2"
                                            src="{{ asset('storage') }}/{{ $settings['prev_favicon'] }}" alt="">
                                    @endif
                                    <div class="py-3">
                                        <label for="" class="form-label">Favicon</label>
                                        <input type="file" class="form-control" name=""
                                            id="favicon{{ $iteration }}" wire:model='settings.favicon'>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                    <span wire:target='settings.body_background_image' wire:loading
                                        class="text-primary">Uploading....</span>
                                    @if (is_object($settings['body_background_image']) && method_exists($settings['body_background_image'], 'temporaryUrl'))
                                        <img src="{{ $settings['body_background_image']->temporaryUrl() }}"
                                            class="w-25" alt="">
                                    @elseif ($settings['prev_body_background_image'] != null)
                                        <img class="w-25 mb-2"
                                            src="{{ asset('storage') }}/{{ $settings['prev_body_background_image'] }}"
                                            alt="">
                                    @endif
                                    <div class="py-3">
                                        <label for="" class="form-label">Favicon</label>
                                        <input type="file" class="form-control" name=""
                                            id="body_background_image{{ $iteration }}"
                                            wire:model='settings.body_background_image'>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-xs-12 col-md-6 col-lg-6">
                            <label for="" class="form-label">Site Title</label>
                            <input type="text" class="form-control" id="" wire:model='settings.site_title'
                                value="" required>
                        </div>
                        <div class="col-12 col-sm-12 col-xs-12 col-md-6 col-lg-6">
                            <label for="" class="form-label">Primary Color</label>
                            <input type="color" wire:model='settings.primary_color' class="form-control"
                                name="" id="">
                        </div>
                        <div class="col-12 col-sm-12 col-xs-12 col-md-6 col-lg-6">
                            <label for="" class="form-label">Site Motto</label>
                            <input type="text" class="form-control" id="" wire:model='settings.site_motto'
                                required>
                        </div>
                        <div class="col-12 col-sm-12 col-xs-12 col-md-6 col-lg-6">
                            <label for="" class="form-label">Secondary Color</label>
                            <input type="color" wire:model='settings.secondary_color' class="form-control"
                                name="" id="">
                        </div>
                        <div class="col-12 col-sm-12 col-xs-12 col-md-6 col-lg-6">
                            <label for="" class="form-label">Text Color</label>
                            <input type="color" wire:model='settings.text_color' class="form-control"
                                name="" id="">
                        </div>
                        <div class="col-12 col-sm-12 col-xs-12 col-md-6 col-lg-6">
                            <label for="" class="form-label">Meta Title</label>
                            <input type="text" class="form-control" id=""
                                wire:model='settings.meta_title' required>
                        </div>
                        <div class="col-12 col-sm-12 col-xs-12 col-md-6 col-lg-6">
                            <label for="" class="form-label">Meta Description</label>
                            <textarea class="form-control" name="" wire:model='settings.meta_description' id="" rows="3"></textarea>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
            <form class=" mt-md-3 mt-sm-2 mt-2" wire:submit='SaveCookieSettings'>
                <div class="card" wire:ignore>
                    <div class="card-header pb-2 pt-3 d-flex align-items-center justify-content-between">
                        <h5 class="m-0">Cookie Alert Settings</h5>
                        <div class="tgl-group">
                            <input class='tgl tgl-light d-none' wire:model='cookie.status' id='display-address'
                                {{ $cookie['status'] == 1 ? 'checked' : '' }} type='checkbox'>
                            <label class='tgl-btn' for='display-address'></label>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-4">
                                <label for="summernote" class="h5 m-0 text-white">
                                    Cookie Banner text
                                </label>
                            </div>
                            <div class="col-12 col-sm-12 col-md-8">
                                <div class="">
                                    <label for="" class="form-label"></label>
                                    <textarea class="form-control" name="" id="summernote" wire:model.defer='cookie.text' rows="3">{!! $cookie['text'] !!}</textarea>
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <button class="btn btn-primary" type="submit">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
