@section('page-title')
    {{ 'পাঠদানের অনুমতি' }}
@endsection
<div>

    <div class="h2 my-4 d-block text-center">
        পাঠদানের অনুমতি
    </div>
    <div class="table-responsive">
        <table class="table table-light">
            <thead>
                <tr>
                    <th scope="col">ক্রমিক নং</th>
                    <th scope="col">বিবরণ</th>
                    <th scope="col">ফাইলস</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $item)
                    <tr class="">
                        <td scope="row">{{ $item->index }}</td>
                        <td>R1C2</td>
                        <td>R1C3</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
