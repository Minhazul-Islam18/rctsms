@section('page-title')
    {{ 'কৃতি শিক্ষার্থী' }}
@endsection
<div>
    <div class="row my-4">
        <div class="col-12">
            <div class="">
                <h5 class="mb-2 d-flex justify-content-center py-2 w-100">কৃতি শিক্ষার্থী</h5>
                <div class="table-responsive">
                    <table class="table border">
                        <thead>
                            <tr>
                                <th class="text-center border-end" scope="col">ক্রমিক নাম্বার</th>
                                <th class="text-center border-end" scope="col">ছবি</th>
                                <th class="text-center border-end" scope="col">নাম</th>
                                <th class="text-center border-end" scope="col">অধ্যয়নের সময়কাল </th>
                                <th class="text-center border-end" scope="col">কৃতিত্ব</th>
                            </tr>
                        </thead>
                        <tbody wire:sortable="ReOrder" wire:sortable.options="{ animation: 100 }">
                            @foreach ($mStudents as $item)
                                <tr wire:sortable.item="{{ $item->id }}" wire:key='{{ $item->index }}'>
                                    <td class="border-end" scope="row">
                                        {{ $count++ }}
                                    </td>
                                    <td class="border-end">
                                        <img style="min-width: 80px; max-width: 100px"
                                            src="/storage/{{ $item->image }}" alt="">
                                    </td>
                                    <td class="border-end">
                                        {{ $item->study_period }}
                                    </td>
                                    <td class="border-end">
                                        {{ $item->name }}
                                    </td>
                                    <td class="border-end">
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
    </div>
</div>
