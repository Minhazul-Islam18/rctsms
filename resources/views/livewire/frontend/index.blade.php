@section('page-title')
    {{ 'হোম' }}
@endsection
<div>
    <div class="site__body">
        <div class="row">
            <div class="col-md-8 col-sm-12 col-12">
                <div class="carousel-wrap">
                    <div class="owl-carousel">
                        @foreach ($home_slider as $item)
                            <div class="item" style="height: 300px">
                                <img src="/storage/{{ $item->image }}">
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="mt-3 notice">
                    <h5 class="mb-2 d-flex justify-content-center py-2 w-100 rounded-1"
                        style="background-color: var(--site-primary); color: var(--site-text)">নোটিশ বোর্ড</h5>
                    <ul class="list-group notice-list rounded-0">
                        @foreach ($notices as $item)
                            <a href="{{ route('notice-page', ['title' => $item->title]) }}">
                                <li wire:key='{{ $item->index }}' class="list-group-item ">
                                    <div class="d-flex flex-column gap-1">
                                        <span> <i class="fa fa-check-circle me-2" style="color: rgb(12, 98, 30)"
                                                aria-hidden="true"></i>{{ $item->title }}</span>
                                        <span class="text-truncate">{{ $item->description }}</span>
                                    </div>


                                </li>
                            </a>
                        @endforeach
                    </ul>
                </div>
                <div class="row my-4 gy-2">
                    @foreach ($schoolWidgets as $item)
                        <div class="col-md-6 col-sm-12 col-12" wire:key='{{ $item->index }}'>
                            <div class="image-box">
                                <div class="row g-0">
                                    <div class="col-12">
                                        <span class="d-block fw-bold border-bottom mb-3">
                                            {{ __($item->title) }}
                                        </span>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-4">
                                        <img src="/storage/{{ $item->image }}" class="w-100 rounded" alt="">
                                    </div>
                                    <div class="col-md-8 col-sm-8 col-8">
                                        <ul class="about-list">
                                            @foreach (json_decode($item->links) as $link)
                                                <li class="listicon">
                                                    <i class="fa fa-check-circle" style="color: rgb(21, 151, 49)"
                                                        aria-hidden="true"></i>
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
            <div class="col-md-4 col-sm-12 col-12">
                @foreach ($individual as $item)
                    <div class="card mb-md-3 mb-sm-2 mb-2" wire:key='{{ $item->index }}'>
                        <div class="card-header" style="background-color: var(--site-primary); color: var(--site-text)">
                            <span
                                class="fw-bold h5 m-0 py-2 w-100 d-block text-center">{{ __($item->person_post) }}</span>
                        </div>
                        <div class="card-body">
                            <div class="d-block text-center my-2">
                                <img class="mw-100 w-50" src="/storage/{{ $item->person_image }}"
                                    alt="{{ __($item->person_name) }}">
                            </div>
                            <span
                                class="fw-bold m-o mt-2 h5 w-100 d-block text-center">{{ __($item->person_name) }}</span>
                        </div>
                        <div class="card-footer d-flex justify-content-center">
                            <a href="{{ route('person-page', ['id' => $item->id]) }}" class="btn btn-sm"
                                style="background-color: var(--site-secondary); color: var(--site-text)">
                                {{ __('আরো পড়ুন') }}
                            </a>
                        </div>
                    </div>
                @endforeach
                <div class="card">
                    <div class="card-header" style="background-color: var(--site-primary); color: var(--site-text)">
                        <span class="fw-bold h5">{{ __('গুরুত্বপূর্ণ লিংক') }}</span>
                    </div>
                    <!-- Hover added -->
                    <div class="list-group rounded-0">
                        @foreach ($additionalLinks as $item)
                            <a href="{{ $item->link_url }}" wire:key='{{ $item->index }}'
                                class="list-group-item list-group-item-action border-0 border-top">
                                <i class="fa fa-check-circle" style="color: rgb(21, 151, 49)" aria-hidden="true"></i>
                                {{ __($item->link_name) }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-12 my-3">
                <div class="row g-0">
                    <div class="col-12">
                        <h5>পোস্ট/ফটো গ্যালারি</h5>

                    </div>
                    {{-- <div class="col-6 text-end">
                        <a href="/" class="text-dark">সকল পোস্ট</a>
                    </div> --}}
                </div>
                <div class="gallery row gy-sm-2">
                    @foreach ($galleryImages as $item)
                        <div class="col-12 col-sm-12 col-md-3 my-2">
                            <a href="/storage/{{ $item->image }}" wire:key='{{ $item->index }}'>
                                <img class="mw-100" src="/storage/{{ $item->image }}" alt="{{ $item->title }}"></a>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
