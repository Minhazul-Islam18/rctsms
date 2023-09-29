@section('page-title')
    {{ 'নোটিশ বোর্ড' }}
@endsection
<div>
    <div class="row my-4">
        <div class="col-12">
            <div class="notice">
                <h5 class="mb-2 d-flex justify-content-center py-2 w-100 rounded-1"
                    style="background-color: var(--site-primary); color: var(--site-text)">নোটিশ বোর্ড</h5>
                <ul class="notice-nav gap-2">
                    <li wire:click="$set('selectedCategory', null)" class="{{ !$selectedCategory ? 'active' : '' }}">
                        {{ __('সকল') }}
                    </li>
                    @foreach ($categories as $category)
                        <li wire:click="$set('selectedCategory', {{ $category->id }})"
                            class="{{ $selectedCategory == $category->id ? 'active' : '' }}">
                            {{ $category->category_name }}</li>
                    @endforeach
                </ul>
                {{-- <ul class="list-group notice-list rounded-0"> --}}
                <div class="loading-spinner" wire:loading>{{ __('লোড হচ্ছে...') }}</div>
                <div class="table-responsive">
                    <table class="table table-light border">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">শিরোনাম</th>
                                <th scope="col">প্রকাশের তারিখ</th>
                                <th scope="col">ডাউনলোড</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($notices as $item)
                                <tr wire:key='{{ $item->index }}'>
                                    <td>{{ $count++ }}</td>
                                    <td>
                                        <a href="{{ route('single-notice-page', ['title' => $item->title]) }}">
                                            <span>{{ $item->title }}</span>
                                        </a>
                                    </td>
                                    <td>
                                        {{ Carbon\Carbon::parse($item->created_at)->format('m/d/Y') }}
                                    </td>
                                    <td>
                                        @foreach (json_decode($item->files) as $itm)
                                            <button class="btn btn-warning btn-sm me-2"
                                                wire:click="downloadFile('{{ $itm }}')" type="button">
                                                <i class="fa fa-download" aria-hidden="true"></i>
                                                Download</button>
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                            @empty($notices)
                                <tr>
                                    <td colspan="3"> <span class="d-block text-center fw-bold h5 m-0 text-warning">
                                            {{ __('কোনো তথ্য বর্তমানে নেই') }}
                                        </span>
                                    </td>
                                </tr>
                            @endempty
                        </tbody>
                    </table>
                </div>


                {{-- </ul> --}}
            </div>
        </div>
    </div>
</div>
