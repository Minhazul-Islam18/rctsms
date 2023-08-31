<div>
    {{-- @extends('backend/admin/layouts/common') --}}
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
                ]
            });
        </script>
    @endsection
    @section('content')
        <div class="page-title-container mb-3">
            <div class="row">
                <div class="col mb-2">
                    <h1 class="mb-2 pb-0 display-4" id="title">Settings</h1>
                    <div class="text-muted font-heading text-small">
                        Let us manage the database engines for your applications
                        so you can focus on building.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form class="row g-3" wire:submit='SaveGeneralSettings'>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-6">
                                    <div class="py-3">
                                        <label for="" class="form-label">Logo</label>
                                        <input type="file" wire:model='site_logo' class="form-control" name=""
                                            id="">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="py-3">
                                        <label for="" class="form-label">Favicon</label>
                                        <input type="file" class="form-control" name="" id=""
                                            wire:model='favicon'>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label">Site Title</label>
                            <input type="text" class="form-control" id="" wire:model='site_title' value=""
                                required>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label">Site Motto</label>
                            <input type="text" class="form-control" id="" wire:model='site_motto' required>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label">Meta Title</label>
                            <input type="text" class="form-control" id="" wire:model='meta_title' required>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label">Meta Description</label>
                            <textarea class="form-control" name="" wire:model='meta_description' id="" rows="3"></textarea>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card mt-md-3 mt-sm-2 mt-2">
                <div class="card-header pb-2 pt-3 d-flex align-items-center justify-content-between">
                    <h5 class="m-0">Cookie Alert Settings</h5>
                    <div class="tgl-group">
                        <input class='tgl tgl-light' id='display-address' type='checkbox'>
                        <label class='tgl-btn' for='display-address'></label>
                    </div>
                </div>
                <div class="card-body">
                    <form class="row g-3 needs-validation" action="" enctype="multipart/form-data">
                        @csrf
                        <div class="col-4 col-sm-12 col-md-4">
                            <label for="summernote" class="h5 m-0 text-white">
                                Cookie Banner text
                            </label>
                        </div>
                        <div class="col-8 col-sm-12 col-md-8">
                            <div class="wrapper-editor">
                                <div id="summernote"></div>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection

</div>
