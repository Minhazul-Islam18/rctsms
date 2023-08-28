@extends('backend/admin/layouts/common')
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
        <livewire:GeneralSettings />
        <livewire:CookieAlert />
    </div>
@endsection
