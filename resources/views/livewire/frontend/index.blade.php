@section('page-title')
    {{ 'হোম' }}
@endsection
@section('page-style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .masonry {
            margin: 1.5em auto;
            max-width: auto;
            column-gap: 1.5em;
        }

        /* The Masonry Brick */
        .item {
            background: #fff;
            margin: 0 0 1.5em;
        }

        /* Masonry on large screens */
        @media only screen and (min-width: 1024px) {
            .masonry {
                column-count: 4;
            }

            #top_header .item {
                max-height: 612px !important;
                min-height: 430px;
            }

            #top_header .item img {
                min-height: 430px !important;
            }
        }

        /* Masonry on medium-sized screens */
        @media only screen and (max-width: 1023px) and (min-width: 768px) {
            .masonry {
                column-count: 4;
            }

            #top_header .item {
                max-height: 300px !important;
                min-height: 245px;
                height: 100% !important;
            }

            #top_header .item img {
                height: 245px !important;
            }
        }

        /* Masonry on small screens */
        @media only screen and (max-width: 767px) and (min-width: 540px) {
            .masonry {
                column-count: 3;
            }

            #top_header .item {
                max-height: 300px !important;
                min-height: 278px;
                height: 100% !important;
            }

            #top_header .item img {
                height: 278px !important;
            }
        }

        @media only screen and (max-width: 527px) and (min-width: 340px) {
            #top_header .item {
                max-height: 205px !important;
                min-height: 192px;
                height: 100% !important;
            }

            #top_header .item img {
                height: 192px !important;
            }

            .masonry {
                column-count: 2;
            }
        }
    </style>
@endsection
@section('page-script')
    <!-- Add fancyBox -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" type="text/css"
        media="screen" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $("#top_header").owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: false,
            autoplay: true,
            navText: [
                "<i class='fa-solid fa-caret-left'></i>",
                "<i class='fa-solid fa-caret-right'></i>",
            ],
            autoplayHoverPause: true,
            autoHeight: false,
            autoHeightClass: "owl-height",
            responsive: {
                0: {
                    items: 1,
                },
                600: {
                    items: 1,
                },
                1000: {
                    items: 1,
                },
            },
        });
        // $("#vid_car").owlCarousel({
        //     items: 5,
        //     nav: true,
        //     autoplay: true,
        //     navText: [
        //         "<i class='fa-solid fa-caret-left'></i>",
        //         "<i class='fa-solid fa-caret-right'></i>",
        //     ],
        //     merge: true,
        //     loop: true,
        //     margin: 10,
        //     video: true,
        //     Load: true,
        //     center: true,
        //     responsive: {
        //         480: {
        //             items: 3,
        //         },
        //         600: {
        //             items: 4,
        //         },
        //     },
        // });
        // Initialize Owl Carousel
        $("#youtube-carousel").owlCarousel({
            items: 3,
            autoplayHoverPause: true,
            loop: true,
            nav: true,
            margin: 10,
            navText: [
                "<i class='fa-solid fa-caret-left'></i>",
                "<i class='fa-solid fa-caret-right'></i>",
            ],
            autoplay: true,
            responsive: {
                340: {
                    items: 1
                },
                480: {
                    items: 2,
                },
                600: {
                    items: 3,
                },
            },
        });

        // Initialize YouTube Player API
        function onYouTubeIframeAPIReady() {
            // Create YouTube players for each video
            $(".item iframe").each(function() {
                const player = new YT.Player($(this).attr("id"), {
                    events: {
                        onReady: onPlayerReady,
                    },
                });
            });
        }

        function onPlayerReady(event) {
            // You can do something when the video is ready to play here
        }

        // Load the YouTube API script
        const tag = document.createElement("script");
        tag.src = "https://www.youtube.com/iframe_api";
        const firstScriptTag = document.getElementsByTagName("script")[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
        // add all to same gallery
        $(".gallery a").attr("data-fancybox", "mygallery");
        // assign captions and title from alt-attributes of images:
        $(".gallery a").each(function() {
            $(this).attr("data-caption", $(this).find("img").attr("alt"));
            $(this).attr("title", $(this).find("img").attr("alt"));
        });
        $(".gallery a").fancybox();
    </script>
@endsection
<div>
    <div class="site__body">
        {{-- <div class="row">
            <div class="col-md-12 col-sm-12 col-12 mb-1 mb-sm-2 mb-md-2">
                <div class="admission__notices">

                </div>
            </div>
        </div> --}}
        <div class="row">
            <div class="col-md-8 col-sm-12 col-12">
                <div class="carousel-wrap">
                    <div id="top_header" class="owl-carousel">
                        @foreach ($home_slider as $item)
                            <div class="item" style="height: 300px">
                                <img lazy src="/storage/{{ $item->image }}">
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="notice">
                    <h5 class="mb-2 d-flex justify-content-center py-2 w-100 rounded-1"
                        style="background-color: var(--site-primary); color: var(--site-text)">নোটিশ বোর্ড</h5>
                    <ul class="list-group notice-list rounded-0">
                        @foreach ($notices as $item)
                            <a href="{{ route('single-notice-page', ['title' => $item->title]) }}">
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
                    <div class="d-block text-end mt-2">
                        <a href="/notices" class="py-2 px-3 d-inline-block"
                            style="background-color: var(--site-primary); color: var(--site-text)">সকল</a>
                    </div>
                </div>
                <div class="mt-3 mt-sm-2 bg-gray py-2 px-2 border mb-2 d-flex" style="background-color: #f7f7f7">
                    <span class="fw-bold d-flex justify-content-center align-items-center me-1 pe-1 border-end">
                        {{ __('খবর') }}
                    </span>
                    <div class="">
                        @forelse ($news as $item)
                            <div
                                class="d-flex flex-row flex-wrap px-1 py-2 gap-1 justify-content-start align-items-start">
                                <img lazy src="/storage/{{ $item->featured_image }}" style="width: 75px"
                                    class="w-10 rounded" alt="">
                                <div>
                                    <a
                                        href="{{ route('single-blog-page', ['title' => $item->title]) }}">{{ $item->title }}</a>
                                    </br>
                                    <small>
                                        <i class="fa-solid fa-calendar-day text-success"></i>
                                        {{ 'প্রকাশের তারিখ: ' . Carbon\Carbon::parse($item->created_at)->format('h:i A, Y-m-d') }}
                                    </small>
                                </div>
                            </div>
                        @empty
                            {{ __('কোনো তথ্য পাওয়া যায়নি') }}
                        @endforelse
                    </div>
                </div>
                <div class="d-block text-end mt-2">
                    <a href="/blogs" class="py-2 px-3 d-inline-block"
                        style="background-color: var(--site-primary); color: var(--site-text)">সকল</a>
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
                                        <img lazy src="/storage/{{ $item->image }}" class="w-100 rounded"
                                            alt="">
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
                <div class="col-12 my-3">
                    <div class="row g-0">
                        <div class="col-6">
                            <h5>ফটো গ্যালারি</h5>

                        </div>
                        <div class="col-6 text-end">
                            <a href="/photo-gallery" class="text-dark">সকল পোস্ট</a>
                        </div>
                    </div>
                    <div class="gallery masonry">
                        @foreach ($galleryImages as $item)
                            <div class="item">
                                <a href="/storage/{{ $item->image }}" wire:key='{{ $item->index }}'>
                                    <img lazy class="mw-100" src="/storage/{{ $item->image }}"
                                        alt="{{ $item->title }}">
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 col-12">
                @foreach ($individual as $item)
                    <div class="card mb-md-3 mb-sm-2 mb-2" wire:key='{{ $item->index }}'>
                        <div class="card-header" style="background-color: var(--site-primary); color: var(--site-text)">
                            <span
                                class="fw-bold h5 m-0 py-0 w-100 d-block text-center">{{ __($item->person_post) }}</span>
                        </div>
                        <div class="card-body">
                            <div class="d-block text-center my-2">
                                <img lazy class="mw-100 w-50" src="/storage/{{ $item->person_image }}"
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

            <div class="col-12 mt-3 mt-sm-2">
                <div class="row g-0">
                    <div class="col-6">
                        <h5>ভিডিও গ্যালারি</h5>

                    </div>
                    <div class="col-6 text-end">
                        <a href="/video-gallery" class="text-dark">সকল পোস্ট</a>
                    </div>
                </div>
                <div id="youtube-carousel" class="owl-carousel">
                    @foreach ($videoLinks as $videoLink)
                        <div class="item">
                            <iframe width="560" height="315"
                                src="https://www.youtube.com/embed/{{ $videoLink }}" frameborder="0"
                                allowfullscreen></iframe>
                        </div>
                    @endforeach
                    <!-- Add more video slides as needed -->
                </div>

                {{-- <div class="owl-carousel owl-theme" id="vid_car">
                    @foreach ($videoLinks as $videoLink)
                        {{-- <div class="item-video" data-merge="{{ $count++ }}"><a class="owl-video"
                                href="https://www.youtube.com/watch?v={{ $videoLink }}"></a></div> --}}
                {{-- <div class="item-video" data-merge="{{ $count++ }}">
                    <iframe width="auto" height="auto" src="https://www.youtube.com/embed/{{ $videoLink }}"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
                @endforeach
            </div> --}}
            </div>
        </div>
    </div>
</div>
