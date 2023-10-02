@section('page-title')
    {{ 'প্রতিষ্ঠানের ইতিহাস' }}
@endsection
<div>
    <div class="site__body">
        <div class="row">
            <div class="col-12 my-4">
                <h3 class="d-block text-center fw-bold">প্রতিষ্ঠানের ইতিহাস</h3>
            </div>
            <div class="col-md-7 col-sm-12 col-12">
                <img class="w-100 border border-5" src="/storage/{{ get_settings('history_image') }}">
            </div>
            <div class="col-12 col-md-5 col-sm-12 col-lg-5">
                <div class="card text-white bg-secondary bg-opacity-10">
                    <div class="card-body">
                        <ul class="list-group bg-transparent">
                            <li class="list-group-item bg-transparent border-0">
                                প্রতিষ্ঠানের নাম:{{ get_settings('school_name') }}
                            </li>
                            <li class="list-group-item bg-transparent border-0">
                                প্রতিষ্ঠার সন:{{ get_settings('established_at') }}
                            </li>
                            <li class="list-group-item bg-transparent border-0">
                                ঠিকানা:{{ get_settings('address') }}
                            </li>
                            <li class="list-group-item bg-transparent border-0">
                                EIIN নং: {{ get_settings('eiin_no') }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-sm-12 col-lg-12">
                <p class="mt-3" style="text-align: justify;font-weight: 500;">{{ get_settings('history') }}</p>
            </div>
        </div>
    </div>
</div>
