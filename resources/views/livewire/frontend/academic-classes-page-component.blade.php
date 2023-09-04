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
                        <td class="border-end border-dark border-start" scope="row">{{ $item->count() }}</td>
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
            </tbody>
        </table>
    </div>

</div>
