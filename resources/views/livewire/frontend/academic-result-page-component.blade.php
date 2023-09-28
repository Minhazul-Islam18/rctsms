@section('page-title')
    {{ 'একাডেমিক ফলাফল' }}
@endsection
<div>
    <h4 class="mb-3 mt-4 d-block text-center">{{ __('একাডেমিক ফলাফল') }}</h4>
    <div class="table-responsive">
        <table class="table table-light border">
            <thead>
                <tr>
                    <th scope="col">ক্রমিক নাম্বার </th>
                    <th scope="col">শ্রেণী</th>
                    <th scope="col">বিবরণ</th>
                    <th scope="col">ডাউনলোড</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($results as $item)
                    <tr class="">
                        <td scope="row">{{ $count++ }}</td>
                        <td>{{ __($item->class->class_name) }}</td>
                        <td>{{ __($item->content) }}</td>
                        <td>
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
