@section('page-title')
    {{ 'কর্মরত শিক্ষকদের তালিকা' }}
@endsection
<div>
    <div class="h2 my-4 d-block text-center">{{ __('কর্মরত শিক্ষকদের তালিকা') }}</div>
    <div class="table-responsive mb-4">
        <table class="table table-light border-1 border-dark">
            <thead class="border-top border-dark">
                <tr>
                    <th class="border-end border-dark border-start" scope="col">ক্রমিক নং</th>
                    <th class="border-end border-dark" scope="col">ছবি</th>
                    <th class="border-end border-dark" scope="col">নাম ও শিক্ষাগত যোগ্যতা</th>
                    <th class="border-end border-dark" scope="col">পদবি</th>
                    <th class="border-end border-dark" scope="col">যোগাযোগ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teachers as $item)
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
                            <div class="text-dark">মোবাইল: {{ $item->phone }}</div>
                            <div class="text-dark">ই-মেইল: {{ $item->email }}</div>
                            <div class="text-dark">ফেইসবুক: {{ $item->facebook }}</div>
                            <div class="text-dark">ওয়েবসাইট: {{ $item->website }}</div>
                        </td>
                    </tr>
                @endforeach
                @if ($teachers->isEmpty())
                    <tr>
                        <td colspan="5" class="border-start border-end border-dark">
                            <span
                                class="text-warning fw-bold w-100 text-center d-block">{{ __('কোনো তথ্য পাওয়া যায়নি') }}</span>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
        {{ $teachers->links() }}
    </div>

</div>
