@section('page-title')
    {{ $notice->title }}
@endsection
<div>
    <div class="row my-4">
        <div class="col-1"></div>
        <div class="col-10">
            <span class="rounded-1 text-center h4 d-block py-2 w-100 border-1 border-background my-4"
                style="background-color: var(--site-primary); color: var(--site-text)">{{ $notice->title }}</span>

            <p class="text-body text-justify">
                {{ __($notice->description) }}
            </p>

            <div class="d-block text-center mt-3">
                @foreach (json_decode($notice->files) as $itm)
                    <button class="btn btn-warning btn-sm me-2" wire:click="downloadFile('{{ $itm }}')"
                        type="button">
                        <i class="fa fa-download" aria-hidden="true"></i>
                        Download</button>
                @endforeach
            </div>
        </div>
        <div class="col-2"></div>
    </div>
</div>
