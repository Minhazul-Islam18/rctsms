@section('page-title')
    {{ 'খবর' }}
@endsection
<div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 col-xxl-8">
    <div>
        <div class="blogs">
            <h5 class="mb-2 d-flex justify-content-center py-2 w-100 rounded-1">খবর</h5>
            <ul class="notice-nav justify-content-center gap-2">
                <li wire:click="$set('selectedCategory', null)" class="{{ !$selectedCategory ? 'active' : '' }}">
                    {{ __('সকল') }}
                </li>
                @foreach ($categories as $category)
                    <li wire:click="$set('selectedCategory', {{ $category->id }})"
                        class="{{ $selectedCategory == $category->id ? 'active' : '' }}">
                        {{ $category->category_name }}</li>
                @endforeach
            </ul>
            <ul class="row blog-list rounded-0 p-0 gx-0 gap-3 row-wrap">
                <div class="col-12 loading-spinner" wire:loading>{{ __('লোড হচ্ছে...') }}</div>
                @foreach ($posts as $item)
                    <a href="{{ route('single-blog-page', ['title' => $item->title]) }}"
                        class="blog-item col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 rounded shadow-sm">
                        <li wire:key='{{ $item->index }}' class="list-unstyled ">
                            <div class="d-flex flex-column gap-1">
                                <img style="width: 100%; height: auto" class="mx-auto rounded"
                                    src="/storage/{{ $item->featured_image }}" />
                                <div class="content py-2 px-2">
                                    <h4 class="m-0 text-dark d-block">{{ $item->title }}</h4>
                                    <span class="text-dark text-sm">
                                        <i class="fa-solid fa-calendar-day me-2 text-success"></i>
                                        {{ Carbon\Carbon::parse($item->created_at)->format('h:i A, Y-m-d') }}
                                    </span>

                                    <span
                                        class="text-secondary d-inline-block">{{ mb_strimwidth($item->description, 0, 100, '....') }}</span>
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
