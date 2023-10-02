@section('page-title')
    {{ 'যোগাযোগ' }}
@endsection
<div>
    <div class="site__body">
        <div class="row my-4">
            <div class="col-12 col-md-5 col-sm-5 col-lg-5 order-1 order-md-1 my-4">
                <h3 class="d-block text-start fw-bold">যোগাযোগের ঠিকানা:</h3>
                <div class="wpb_text_column wpb_content_element ">
                    <div class="wpb_wrapper">
                        <p><strong>{{ get_settings('school_name') }}</strong><br>
                            {{ get_settings('address') }}</p>
                        <p class="mb-1"><strong>ফোন:</strong></p>
                        <p>অফিস: {{ get_settings('contact_number') }}</p>
                        <p><strong>ই-মেইল:</strong> <a
                                href="mailto:{{ get_settings('contact_mail') }}">{{ get_settings('contact_mail') }}</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-2 col-sm-2 col-lg-2 order-3 order-md-2"></div>
            <div class="col-12 col-md-5 col-sm-5 col-lg-5 order-2 order-md-3">
                <div class="mw-100 contact_page_map">{!! get_settings('location') !!}</div>
            </div>
        </div>
    </div>
</div>
