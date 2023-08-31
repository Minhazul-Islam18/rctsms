    @livewireScripts
    <script src="{{ asset('backend/js/vendor/jquery-3.5.1.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js"
        integrity="sha512-fHY2UiQlipUq0dEabSM4s+phmn+bcxSYzXP4vAXItBvBHU7zAM/mkhCZjtBEIJexhOMzZbgFlPLuErlJF2b+0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('backend/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/js/vendor/OverlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('backend/js/vendor/autoComplete.min.js') }}"></script>
    <script src="{{ asset('backend/js/vendor/clamp.min.js') }}"></script>
    <script src="{{ asset('backend/icon/acorn-icons.js') }}"></script>
    <script src="{{ asset('backend/icon/acorn-icons-interface.js') }}"></script>
    <script src="{{ asset('backend/icon/acorn-icons-commerce.js') }}"></script>
    <script src="{{ asset('backend/js/base/helpers.js') }}"></script>
    <script src="{{ asset('backend/js/base/globals.js') }}"></script>
    <script src="{{ asset('backend/js/base/nav.js') }}"></script>
    <script src="{{ asset('backend/js/base/search.js') }}"></script>
    <script src="{{ asset('backend/js/base/settings.js') }}"></script>
    <script src="{{ asset('backend/js/common.js') }}"></script>
    <script src="{{ asset('backend/js/scripts.js') }}"></script>
    <script src="{{ asset('backend/js/custom.js') }}"></script>
    </script>


    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <x-livewire-alert::scripts />
    @yield('page-scripts')
