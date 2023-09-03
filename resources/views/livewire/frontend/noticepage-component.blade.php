@section('page-title')
    {{ $notice->title }}
@endsection
<div>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <span
                class="rounded-1 text-center h4 d-block py-2 w-100 border-1 border-background my-4 bg-primary">{{ $notice->title }}</span>

            <img class="mw-100 my-4 rounded" src="/storage/{{ $notice->image }}" alt="">
            <p class="text-body text-justify">
                {{ __($notice->description) }}
            </p>
        </div>
        <div class="col-2"></div>
    </div>
</div>
