@section('page-title')
    {{ 'ফটো গ্যালারি' }}
@endsection
@section('page-style')
    <style>
        .masonry {
            margin: 1.5em auto;
            max-width: 768px;
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
        }

        /* Masonry on medium-sized screens */
        @media only screen and (max-width: 1023px) and (min-width: 768px) {
            .masonry {
                column-count: 3;
            }
        }

        /* Masonry on small screens */
        @media only screen and (max-width: 767px) and (min-width: 540px) {
            .masonry {
                column-count: 2;
            }
        }
    </style>
@endsection
<div>
    <div class="h2 my-4 d-block text-center">
        {{ __('ফটো গ্যালারি') }}
    </div>
    <div class="masonry">
        @foreach ($gallery as $item)
            <div class="item">
                <img lazy class="mw-100" src="/storage/{{ $item->image }}" alt="{{ $item->title }}">
            </div>
        @endforeach
    </div>
    {{-- <div class="row gallery">
        @foreach ($gallery as $item)
            <div class="col-12 col-sm-12 col-md-3 my-2">
                <a href="/storage/{{ $item->image }}" wire:key='{{ $item->index }}'>
                    <img lazy class="mw-100" src="/storage/{{ $item->image }}" alt="{{ $item->title }}"></a>
            </div>
        @endforeach
    </div> --}}
</div>
