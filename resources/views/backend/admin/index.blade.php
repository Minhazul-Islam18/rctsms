@section('page-title')
    {{ 'Dashboard' }}
@endsection
<div>
    <div class="page-title-container mb-3">
        <div class="row">
            <div class="col mb-2">
                <h1 class="mb-2 pb-0 display-4" id="title">
                    Getting Started
                </h1>
                <div class="text-muted font-heading text-small">
                    Let us manage the database engines for your applications
                    so you can focus on building.
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-8 mb-5">
            <div class="card sh-45 h-lg-100 position-relative bg-theme">
                <div class="card-body">
                    <div class="w-100 w-md-100 w-sm-100 d-flex flex-column">
                        <span class="m-0 h4">{{ get_settings('site_title') }}</span>
                        <span class="border-top h6 mt-3 py-2 d-inline-block">{{ get_settings('site_motto') }}</span>
                        <img class="img-fluid" src="/storage/{{ get_settings('logo') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4 mb-5">
            <div class="scroll-out">
                <div class="scroll-by-count" data-count="4">
                    @foreach ($notices as $item)
                        <div class="card mb-2 hover-border-primary">
                            <a href="{{ route('notice-page', ['title' => $item->title]) }}">
                                <li wire:key='{{ $item->index }}' class="list-group-item ">
                                    <div class="d-flex flex-column gap-1">
                                        <span class="text-alternate"> <i class="bi bi-check-circle me-2"
                                                style="color: rgb(12, 98, 30)"
                                                aria-hidden="true"></i>{{ $item->title }}</span>
                                        <span
                                            class="text-truncate text-small text-muted">{{ $item->description ?? null }}</span>
                                    </div>
                                </li>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="mb-5">
        <h2 class="small-title">School Widgets</h2>
        <div class="row g-2 row-cols-1 row-cols-xl-2 row-cols-xxl-4">
            @foreach ($schoolWidgets as $item)
                <div class="col" wire:key='{{ $item->index }}'>
                    <div class="image-box px-4 py-2 border-1 border-warning bg-theme rounded">
                        <div class="row g-0">
                            <div class="col-12">
                                <span class="d-block fw-bold border-bottom mb-3 py-3 h4 text-warning">
                                    {{ __($item->title) }}
                                </span>
                            </div>
                            <div class="col-md-4 col-sm-4 col-4">
                                <img src="/storage/{{ $item->image }}" class="w-100 rounded" alt="">
                            </div>
                            <div class="col-md-8 col-sm-8 col-8">
                                <ul class="about-list" style="list-style: none">
                                    @foreach (json_decode($item->links) as $link)
                                        <li class="listicon text-warning">
                                            <i class="bi bi-check-circle me-2" style="" aria-hidden="true"></i>
                                            <a href="{{ $link->url }}">{{ $link->text }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
