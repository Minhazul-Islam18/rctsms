@section('page-title')
    {{ 'যোগাযোগ' }}
@endsection
<div>
    <div class="site__body">
        <div class="row my-4">
            <div class="col-5 my-4">
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
            <div class="col-2 col-md-2 col-sm-2 col-lg-2"></div>
            <div class="col-5 col-md-5 col-sm-5 col-lg-5">
                <div class="mw-100 contact_page_map">{!! get_settings('location') !!}</div>
                {{-- <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29393.15019176776!2d90.97071868986833!3d22.944931591112375!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3754bc2ddb600fe1%3A0xbbbb313498ce42e8!2sChandraganj!5e0!3m2!1sen!2sbd!4v1694017860493!5m2!1sen!2sbd"
                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
            </div>
        </div>
    </div>
</div>
