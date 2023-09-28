@section('page-title')
    {{ 'শ্ৰেণীসমূহ' }}
@endsection
<div>
    <div class="h2 my-4 d-block text-center">{{ __('শ্ৰেণীসমূহ') }}</div>
    <div class="table-responsive mb-4">
        <table class="table table-light border-1 border-dark">
            <thead class="border-top border-dark">
                <tr>
                    <th class="border-end border-dark border-start" scope="col">ক্রমিক নং</th>
                    <th class="border-end border-dark" scope="col">বিবরণ</th>
                    <th class="border-end border-dark" scope="col">ফাইলস</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($classes as $item)
                    <tr>
                        <td class="border-end border-dark border-start" scope="row">{{ $count++ }}</td>
                        <td class="border-end border-dark">
                            <div class="text-dark">{{ $item->class_name }}</div>
                        </td>
                        <td class="border-end border-dark">
                            <div class="text-dark">{{ $item->observation }}</div>
                        </td>
                    </tr>
                @endforeach
                @if ($classes->isEmpty())
                    <tr>
                        <td colspan="5" class="border-start border-end border-dark">
                            <span
                                class="text-warning fw-bold w-100 text-center d-block">{{ __('কোনো তথ্য পাওয়া যায়নি') }}</span>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
        {{ $classes->links() }}
    </div>

</div>
