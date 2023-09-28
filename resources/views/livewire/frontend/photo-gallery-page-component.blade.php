@section('page-title')
    {{ 'ফটো গ্যালারি' }}
@endsection
<div>
    <div class="h2 my-4 d-block text-center">
        {{ __('ফটো গ্যালারি') }}
    </div>
    <div class="row gallery">
        @foreach ($gallery as $item)
            <div class="col-12 col-sm-12 col-md-3 my-2">
                <a href="/storage/{{ $item->image }}" wire:key='{{ $item->index }}'>
                    <img lazy class="mw-100" src="/storage/{{ $item->image }}" alt="{{ $item->title }}"></a>
            </div>
        @endforeach
    </div>
</div>
