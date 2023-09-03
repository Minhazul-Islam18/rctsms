@section('page-title')
    {{ $person->person_post }}-{{ $person->person_name }}
@endsection
<div>
    <div class="row my-4">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="d-flex justify-content-center align-items-center">
                <img class="mw-100 w-50 my-4 rounded" src="/storage/{{ $person->person_image }}" alt="">
            </div>
            <p class="text-body text-justify" style="text-align: justify">
                {{ __($person->person_words) }}
            </p>
            <span class="d-block w-100 text-start h4 text-success">{{ $person->person_name }}</span>
            <span class="d-block w-100 text-start h5 fw-bolder text-info mb-0">{{ $person->person_post }}</span>
            <span class="">{{ get_settings(['school_name']) }}</span>
        </div>
        <div class="col-2"></div>
    </div>
</div>
