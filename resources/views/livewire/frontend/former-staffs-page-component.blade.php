@section('page-title')
    {{ 'প্রাক্তণ স্টাফদের ও কার্যকাল' }}
@endsection
<div>
    <div class="h2 my-4 d-block text-center">{{ __('প্রাক্তণ স্টাফদের ও কার্যকাল') }}</div>
    <div class="table-responsive mb-4">
        <table class="table table-light border-1 border-dark">
            <thead class="border-top border-dark">
                <tr>
                    <th class="border-end border-dark border-start" scope="col">ক্রমিক নং</th>
                    <th class="border-end border-dark" scope="col">ছবি</th>
                    <th class="border-end border-dark" scope="col">নাম ও শিক্ষাগত যোগ্যতা</th>
                    <th class="border-end border-dark" scope="col">পদবি</th>
                    <th class="border-end border-dark" scope="col">যোগাযোগ</th>
                    <th class="border-end border-dark" scope="col">কার্যকাল</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($staffs as $item)
                    <tr>
                        <td class="border-end border-dark border-start" scope="row">{{ $iteration++ }}</td>
                        <td class="border-end border-dark">
                            <img src="/storage/{{ $item->image }}" class="mw-100" width="100px" alt="">
                        </td>
                        <td class="border-end border-dark">
                            <div class="text-dark">{{ $item->name }}</div>
                            <div class="text-dark">{{ $item->educational_qualification }}</div>
                        </td>
                        <td class="border-end border-dark">
                            <span class="text-dark">{{ $item->post }}</span>
                        </td>
                        <td class="border-end border-dark">
                            <div class="text-dark">মোবাইল: {{ $item->mobile }}</div>
                            <div class="text-dark">ই-মেইল: {{ $item->email }}</div>
                            <div class="text-dark">ফেইসবুক: {{ $item->facebook }}</div>
                            <div class="text-dark">ওয়েবসাইট: {{ $item->website }}</div>
                        </td>
                        <td class="border-end border-dark">
                            <span class="text-dark">{{ date('Y-m-d', strtotime($item->start_date)) }} থেকে
                                {{ date('Y-m-d', strtotime($item->end_date)) }}</span>
                            <span class="text-dark"></span>
                        </td>
                    </tr>
                @endforeach
                @if ($staffs->isEmpty())
                    <tr>
                        <td colspan="5" class="border-start border-end border-dark">
                            <span
                                class="text-warning fw-bold w-100 text-center d-block">{{ __('কোনো তথ্য পাওয়া যায়নি') }}</span>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
        {{ $staffs->links() }}
    </div>

</div>
