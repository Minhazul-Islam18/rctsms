@section('page-title')
    {{ 'প্রতিষ্ঠানের ইতিহাস' }}
@endsection
<div>
    <div class="site__body">
        <div class="row">
            <div class="col-12 my-4">
                <h3 class="d-block text-center fw-bold">প্রতিষ্ঠানের ইতিহাস</h3>
            </div>
            <div class="col-12 col-md-2 col-sm-12 col-lg-2"></div>
            <div class="col-md-8 col-sm-12 col-12">
                <div class="carousel-wrap">
                    <div class="owl-carousel">
                        @foreach ($home_slider as $item)
                            <div class="item" style="height: 300px">
                                <img src="/storage/{{ $item->image }}">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-2 col-sm-12 col-lg-2"></div>
            <div class="col-12 col-md-1 col-sm-1 col-lg-1"></div>
            <div class="col-12 col-md-10 col-sm-10 col-lg-10">
                <p style="text-align: justify;font-weight: 500;">{{ get_settings('history') }}</p>
            </div>
            <div class="col-12 col-md-1 col-sm-1 col-lg-1"></div>
        </div>
    </div>
</div>
