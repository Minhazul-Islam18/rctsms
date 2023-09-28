@section('page-title')
    {{ 'খবর' }}
@endsection
<div>
    <div class="row my-4">
        <div class="col-1"></div>
        <div class="col-10">
            <div class="notice">
                <h5 class="mb-2 d-flex justify-content-center py-2 w-100 rounded-1"
                    style="background-color: var(--site-primary); color: var(--site-text)">নোটিশ বোর্ড</h5>
                <ul class="notice-nav">
                    <li wire:click="$set('selectedCategory', null)" class="{{ !$selectedCategory ? 'active' : '' }}">
                        {{ __('সকল') }}
                    </li>
                    @foreach ($categories as $category)
                        <li wire:click="$set('selectedCategory', {{ $category->id }})"
                            class="{{ $selectedCategory == $category->id ? 'active' : '' }}">
                            {{ $category->category_name }}</li>
                    @endforeach
                </ul>
                <ul class="list-group notice-list rounded-0">
                    <div class="loading-spinner" wire:loading>{{ __('লোড হচ্ছে...') }}</div>
                    @foreach ($posts as $item)
                        <a href="{{ route('single-blog-page', ['title' => $item->title]) }}">
                            <li wire:key='{{ $item->index }}' class="list-group-item ">
                                <div class="d-flex flex-column gap-1">
                                    <h3 class="m-0">{{ $item->title }}</h3>
                                    <span class="text-truncate">{{ $item->description }}</span>
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
        <div class="col-2"></div>
    </div>
</div>
