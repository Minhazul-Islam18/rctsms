@section('page-title')
    {{ 'পাঠদানের অনুমতি' }}
@endsection
<div>
    <div class="h2 my-4 d-block text-center">
        পাঠদানের অনুমতি
    </div>
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
                @foreach ($permissions as $item)
                    <tr>
                        <td class="border-end border-dark border-start" scope="row">{{ $iteration++ }}</td>
                        <td class="border-end border-dark">
                            <div class="text-truncate">{{ $item->description }}</div>
                        </td>
                        <td class="border-end border-dark">
                            @foreach (json_decode($item->files) as $itm)
                                <button class="btn btn-warning btn-sm" wire:click="downloadFile('{{ $itm }}')"
                                    type="button">Download</button>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
                @if ($permissions->isEmpty())
                    <tr>
                        <td colspan="5" class="border-start border-end border-dark">
                            <span
                                class="text-warning fw-bold w-100 text-center d-block">{{ __('কোনো তথ্য পাওয়া যায়নি') }}</span>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
        {{-- {{ $classes->links() }} --}}
    </div>

</div>
