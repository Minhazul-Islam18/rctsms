@section('page-title')
    {{ 'ব্লগ ও সংবাদ' }}
@endsection
<div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 col-xxl-8">
    <div>
        <div class="blogs">
            <h5 class="mb-2 d-flex justify-content-center py-2 w-100 rounded-1">ব্লগ ও সংবাদ</h5>
            <ul class="row blog-list rounded-0 p-0 gx-0 row-wrap">
                @foreach ($posts as $item)
                    <a href="{{ route('single-blog-page', ['title' => $item->title]) }}"
                        class="col-6 col-sm-4 col-md-4 col-lg-4 col-xl-4 text-decoration-none">
                        <li wire:key='{{ $item->index }}' class="blog-item list-unstyled me-2 rounded shadow-sm">
                            <div class="d-flex flex-column gap-1">
                                <img style="width: 100%; height: auto" class="mx-auto rounded"
                                    src="/storage/{{ $item->featured_image }}" />
                                <div class="content py-2 px-2">
                                    <h4 class="m-0 text-dark d-block">{{ $item->title }}</h4>
                                    <small class="text-dark text-sm">
                                        <i class="fa-solid fa-calendar-day text-success"></i>
                                        {{ Carbon\Carbon::parse($item->created_at)->format('h:i A, Y-m-d') }}
                                    </small>

                                    <small
                                        class="text-secondary d-inline-block">{{ mb_strimwidth($item->description, 0, 100, '....') }}</small>
                                </div>
                            </div>
                        </li>
                    </a>
                @endforeach
                @empty($posts)
                    <span class="d-block text-center fw-bold h5 m-0 text-warning">
                        {{ __('কোনো তথ্য বর্তমানে নেই') }}
                    </span>
                @endempty
            </ul>
        </div>
    </div>
</div>
