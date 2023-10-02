@section('page-title')
    {{ 'ক্যাটাগরির সংবাদ' }}
@endsection
<div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 col-xxl-8">
    <ul class="row blog-list rounded-0 p-0 gx-0 gap-3 row-wrap">
        <div class="col-12 loading-spinner" wire:loading>{{ __('লোড হচ্ছে...') }}</div>
        @forelse ($posts as $item)
            <a href="{{ route('single-blog-page', ['title' => $item->title]) }}"
                class="blog-item col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 rounded shadow-sm">
                <li wire:key='{{ $item->index }}' class="list-unstyled ">
                    <div class="d-flex flex-column gap-1">
                        <img style="width: 100%; height: auto" class="mx-auto rounded"
                            src="/storage/{{ $item->featured_image }}" />
                        <div class="content py-2 px-2">
                            <h4 class="m-0 text-dark d-block">{{ $item->title }}</h4>
                            <small class="text-dark text-sm">
                                <i class="fa-solid fa-calendar-day me-2 text-success"></i>
                                {{ Carbon\Carbon::parse($item->created_at)->format('h:i A, Y-m-d') }}
                            </small>

                            <small
                                class="text-secondary d-inline-block">{{ mb_strimwidth($item->description, 0, 100, '....') }}</small>
                        </div>
                    </div>
                </li>
            </a>
        @empty
            <span class="d-block text-center fw-bold h5 m-0 text-warning">
                {{ __('কোনো সংবাদ বর্তমানে নেই') }}
            </span>
        @endforelse
    @empty($posts)
        <span class="d-block text-center fw-bold h5 m-0 text-warning">
            {{ __('কোনো সংবাদ বর্তমানে নেই') }}
        </span>
    @endempty
</ul>
</div>
