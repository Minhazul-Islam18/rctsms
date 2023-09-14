@section('page-title')
    {{ 'Dashboard' }}
@endsection
@section('page-styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('page-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            autoplay: true,
            navText: [
                "<i class='bi bi-caret-left'></i>",
                "<i class='bi bi-caret-right'></i>"
            ],
            autoplay: true,
            autoplayHoverPause: true,
            autoHeight: false,
            autoHeightClass: 'owl-height',
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        });
    </script>
@endsection
<div>
    {{-- @dd(auth()->user()->roles) --}}
    <div class="page-title-container mb-3">
        <div class="row">
            <div class="col mb-2 text-center">
                <h1 class="mb-2 pb-0 display-4" id="title">
                    WelCome
                    @if (auth()->user()->hasRole('Admin'))
                        {{ 'Admin' }}
                    @elseif (auth()->user()->hasRole('Super Admin'))
                        {{ 'Super Admin' }}
                    @else
                        {{ 'User' }}
                    @endif
                </h1>
                <div class="text-muted font-heading text-small">
                    Let us manage your applications
                    so you can focus on.
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="row">
        <div class="col-12 col-lg-8 mb-5">
            <div class="card sh-45 h-lg-100 position-relative bg-theme">
                <div class="card-body px-3 py-2">
                    <div class="carousel-wrap">
                        <div class="owl-carousel">
                            @foreach ($home_slider as $item)
                                <div class="item"
                                    style="height: 300px; background-image: url('/storage/{{ $item->image }}'); background-size: cover;">
                                    <h4 class="py-2 m-0 ps-sm-2 ps-md-3">{{ $item->title }}</h4>
                                </div>
                            @endforeach
                        </div>
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
    </div> --}}
    <div class="mb-5">
        <h2 class="small-title">Institute Widgets</h2>
        <div class="row g-2 row-cols-1 row-cols-xl-3 row-cols-xxl-3">
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
