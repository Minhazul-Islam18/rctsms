@section('page-title')
    {{ 'ফটো গ্যালারি' }}
@endsection
@section('page-style')
    <style>
        .masonry {
            margin: 1.5em auto;
            /*max-width: 768px;*/
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
                column-count: 5;
            }
        }

        /* Masonry on medium-sized screens */
        @media only screen and (max-width: 1023px) and (min-width: 768px) {
            .masonry {
                column-count: 4;
            }
        }

        /* Masonry on small screens */
        @media only screen and (max-width: 767px) and (min-width: 540px) {
            .masonry {
                column-count: 3;
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
<script>
                // add all to same gallery
        $(".gallery a").attr("data-fancybox", "mygallery");
        // assign captions and title from alt-attributes of images:
        $(".gallery a").each(function() {
            $(this).attr("data-caption", $(this).find("img").attr("alt"));
            $(this).attr("title", $(this).find("img").attr("alt"));
        });
        $(".gallery a").fancybox();
     $(".gallery a").fancybox();
</script>
    @endsection
<div>
    <div class="h2 my-4 d-block text-center">
        {{ __('ফটো গ্যালারি') }}
    </div>
<div class="gallery masonry">
                    @foreach ($gallery as $item)
                        <div class="item">
                            <a href="/storage/{{ $item->image }}" wire:key='{{ $item->index }}'>
                                <img lazy class="mw-100" src="/storage/{{ $item->image }}"
                                    alt="{{ $item->title }}">
                            </a>
                        </div>
                    @endforeach
                </div>
</div>
