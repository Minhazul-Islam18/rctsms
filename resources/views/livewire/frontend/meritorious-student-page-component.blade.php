@section('page-title')
    {{ 'কৃতি শিক্ষার্থী' }}
@endsection
<div>
    <div class="row my-4">
        <div class="col-1"></div>
        <div class="col-10">
            <div class="">
                <h5 class="mb-2 d-flex justify-content-center py-2 w-100">কৃতি শিক্ষার্থী</h5>
                <div class="table-responsive">
                    <table class="table table-primary">
                        <thead>
                            <tr>
                                <th scope="col">ক্রমিক নাম্বার</th>
                                <th scope="col">ছবি</th>
                                <th scope="col">নাম</th>
                                <th scope="col">অধ্যয়নের সময়কাল </th>
                                <th scope="col">কৃতিত্ব</th>
                            </tr>
                        </thead>
                        <tbody wire:sortable="ReOrder" wire:sortable.options="{ animation: 100 }">
                            @foreach ($mStudents as $item)
                                <tr wire:sortable.item="{{ $item->id }}" wire:key='{{ $item->index }}'>
                                    <td>
                                        {{ $count++ }}
                                    </td>
                                    <td scope="row">
                                        <img style="min-width: 80px; max-width: 100px"
                                            src="/storage/{{ $item->image }}" alt="">
                                    </td>
                                    <td>
                                        {{ $item->study_period }}
                                    </td>
                                    <td>
                                        {{ $item->name }}
                                    </td>
                                    <td>
                                        {{ $item->merits }}
                                    </td>
                                </tr>
                            @endforeach
                            <div class="d-flex">{{ $mStudents->links() }}</div>
                            @if ($mStudents->count() <= 0)
                                <tr>
                                    <td colspan="3" class="text-center">{{ 'Nothing Found' }}</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
</div>
