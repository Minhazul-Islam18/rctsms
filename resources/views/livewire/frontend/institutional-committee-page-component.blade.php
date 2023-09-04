@section('page-title')
    {{ 'সর্বশেষ কমিটি' }}
@endsection
<div>
    <div class="h2 my-4 d-block text-center">{{ __('সর্বশেষ কমিটি') }}</div>
    <div class="table-responsive mb-4">
        <table class="table table-light border-1 border-dark">
            <thead class="border-top border-dark">
                <tr>
                    <th class="border-end border-dark border-start" scope="col">ক্রমিক নং</th>
                    <th class="border-end border-dark" scope="col">ছবি</th>
                    <th class="border-end border-dark" scope="col">নাম ও শিক্ষাগত যোগ্যতা</th>
                    <th class="border-end border-dark" scope="col">পরিচয়</th>
                    <th class="border-end border-dark" scope="col">পদবি</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($committees as $item)
                    <tr>
                        <td class="border-end border-dark border-start" scope="row">{{ $iteration++ }}</td>
                        <td class="border-end border-dark">
                            <div class="text-dark">{{ $item->person_name }}</div>
                            <div class="text-dark">{{ $item->educational_qualification }}</div>
                        </td>
                        <td class="border-end border-dark">
                            <img src="/storage/{{ $item->person_image }}" class="mw-100" width="100px" alt="">
                        </td>
                        <td class="border-end border-dark">
                            <span class="text-dark">{{ $item->identity }}</span>
                        </td>
                        <td class="border-end border-dark">
                            <div class="text-dark">{{ $item->person_post }}</div>
                        </td>
                    </tr>
                @endforeach
                @if ($committees->isEmpty())
                    <tr>
                        <td colspan="5" class="border-start border-end border-dark">
                            <span
                                class="text-warning fw-bold w-100 text-center d-block">{{ __('কোনো তথ্য পাওয়া যায়নি') }}</span>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
        {{ $committees->links() }}
    </div>

</div>
