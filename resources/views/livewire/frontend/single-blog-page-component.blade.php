@section('page-title')
    {{ $blog->title }}
@endsection
@php
    $blog->images = json_decode($blog->images);
    $io = count($blog->images);
    
    $io = 100 / $io;
@endphp
@section('page-style')
    <style>
        .BlogImages img {
            width: <?=$io ?>%;
        }

        @media screen and (max-width: 750px) {
            .BlogImages img {
                width: <?=100 ?>%;
            }
        }
    </style>
@endsection
<div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-7">
    <div class="my-2">
        <span class="h3 mb-3 d-block">{{ $blog->title }}</span>
        <span class="mb-3 d-block">প্রকাশের তারিখ:
            {{ Carbon\Carbon::parse($blog->created_at)->format('Y/m/d') }}</span>
        <span class="rounded py-1 px-2 bg-dark bg-opacity-10 h6 mb-2">{{ $blog->category->category_name }}</span>

        <div class="d-flex flex-wrap flex-row overflow-hidden w-100 gap-2 my-2 BlogImages">

            @foreach ($blog->images as $item)
                <img style="" class="" src="/storage/{{ $item }}" alt="">
            @endforeach
        </div>
        <p class="text-body text-justify mt-1">
            {{ __($blog->description) }}
        </p>
    </div>
</div>
