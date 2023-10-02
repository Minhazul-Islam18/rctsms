<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4 border-start">
    <section id="sidebar">
        <div class="d-flex flex-wrap flex-column">
            @php
                $latestPosts = DB::table('blog_posts')
                    ->orderBy('created_at', 'DESC')
                    ->take(10)
                    ->get();
                $categories = DB::table('blog_post_categories')->get();
            @endphp
            <h4 class="mb-2 border-bottom py-2 px-2"
                style="background-color: var(--site-primary);color: var(--site-text);">{{ 'আরও সংবাদ' }}</h4>
            <div class="d-flex flex-column gap-2 mt-2">
                @foreach ($latestPosts as $item)
                    <a href="{{ route('single-blog-page', ['title' => $item->title]) }}"
                        class="d-flex flex-row gap-1 shadow-sm rounded text-decoration-none">
                        <img style="width: 72px; height: auto;" src="/storage/{{ $item->featured_image }}" alt="">
                        <div class="d-flex flex-column">
                            <h5 class="text-dark m-0">{{ $item->title }}</h5>
                            <span class="text-dark" style="font-size: .9rem">
                                <i class="fa-solid fa-calendar-day me-2 text-success"></i>
                                {{ Carbon\Carbon::parse($item->created_at)->format('Y-m-d, h:i A') }}
                            </span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
        <div class="d-flex flex-wrap flex-column my-2">
            <h4 class="mb-2 border-bottom py-2 px-2"
                style="background-color: var(--site-primary);color: var(--site-text);">{{ 'ক্যাটাগরি সমূহ' }}</h4>
            <div class="mt-2">
                <ul class="list-group">
                    @foreach ($categories as $item)
                        <a href="{{ route('post-by-category-page', ['id' => $item->id]) }}"
                            class="text-decoration-none">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <small class="text-dark m-0">{{ $item->category_name }}</small>
                            </li>
                        </a>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
</div>
