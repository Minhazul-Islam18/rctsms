<!DOCTYPE html>
<html lang="en" data-footer="true">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />
    <title>@yield('page-title') | {{ get_settings('site_title') ?? config('app.name') }}</title>
    {{-- <link rel="apple-touch-icon-precomposed" sizes="57x57" --}}
    {{-- href="{{ asset('backend/img/favicon/apple-touch-icon-57x57.png') }}" /> --}}
    {{-- <link rel="apple-touch-icon-precomposed" sizes="114x114" --}}
    {{-- href="{{ asset('backend/img/favicon/apple-touch-icon-114x114.png') }}" /> --}}
    {{-- <link rel="apple-touch-icon-precomposed" sizes="72x72" --}}
    {{-- href="{{ asset('backend/img/favicon/apple-touch-icon-72x72.png') }}" /> --}}
    {{-- <link rel="apple-touch-icon-precomposed" sizes="144x144" --}}
    {{-- href="{{ asset('backend/img/favicon/apple-touch-icon-144x144.png') }}" /> --}}
    {{-- <link rel="apple-touch-icon-precomposed" sizes="60x60" --}}
    {{-- href="{{ asset('backend/img/favicon/apple-touch-icon-60x60.png') }}" /> --}}
    {{-- <link rel="apple-touch-icon-precomposed" sizes="120x120" --}}
    {{-- href="{{ asset('backend/img/favicon/apple-touch-icon-120x120.png') }}" /> --}}
    {{-- <link rel="apple-touch-icon-precomposed" sizes="76x76" --}}
    {{-- href="{{ asset('backend/img/favicon/apple-touch-icon-76x76.png') }}" /> --}}
    {{-- <link rel="apple-touch-icon-precomposed" sizes="152x152" --}}
    {{-- href="{{ asset('backend/img/favicon/apple-touch-icon-152x152.png') }}" /> --}}
    {{-- <link rel="icon" type="image/png" href="{{ asset('backend/img/favicon/favicon-196x196.png') }}" --}}
    {{-- sizes="196x196" /> --}}
    <link rel="icon" type="image/png" href="{{ asset('storage') }}/{{ get_settings('favicon') }}" sizes="96x96" />
    {{-- <link rel="icon" type="image/png" href="{{ asset('backend/img/favicon/favicon-32x32.png') }}" sizes="32x32" /> --}}
    {{-- <link rel="icon" type="image/png" href="{{ asset('backend/img/favicon/favicon-16x16.png') }}" sizes="16x16" /> --}}
    {{-- <link rel="icon" type="image/png" href="{{ asset('backend/img/favicon/favicon-128.png') }}" sizes="128x128" /> --}}
    <meta name="application-name" content="&nbsp;" />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="{{ asset('backend/img/favicon/mstile-144x144.png') }}" />
    {{-- <meta name="msapplication-square70x70logo" content="{{ asset('backend/img/favicon/mstile-70x70.png') }}" /> --}}
    {{-- <meta name="msapplication-square150x150logo" content="{{ asset('backend/img/favicon/mstile-150x150.png') }}" /> --}}
    {{-- <meta name="msapplication-wide310x150logo" content="{{ asset('backend/img/favicon/mstile-310x150.png') }}" /> --}}
    {{-- <meta name="msapplication-square310x310logo" content="{{ asset('backend/img/favicon/mstile-310x310.png') }}" /> --}}
    <link rel="preconnect" href="https://fonts.gstatic.com/" />
    @include('backend/admin/layouts/sections/styles')
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body>
    <div id="root">
        <div class="mobile-menu-toggle">
            <div class="hamburger">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
        </div>
        <div class="sw-25 side-menu mb-0 primary navbar-collapse mobile-menu" id="mobile-menu">
            <div class="close-button" id="close-button">&times;</div>
            <ul>
                <li>
                    <a href="{{ route('admin.dashboard') }}">
                        <i data-acorn-icon="home" class="icon" data-acorn-size="18"></i>
                        <span class="label">Dashboard</span>
                    </a>
                </li>
                @can('change settings')
                    <li>
                        <ul>
                            <div class="border-bottom py-2 mb-2">
                                <i data-acorn-icon="grid-1" class="icon" data-acorn-size="18"></i>
                                <span class="label">Content Management</span>
                            </div>
                            <!-- Add your sidebar links here -->
                            <li class="accordion">
                                <a href="#"><i class="bi bi-diagram-3-fill"></i> <span>Features</span></a>
                                <ul class="submenu">
                                    <li>
                                        <a class="{{ Route::currentRouteName() === 'syllabus' ? 'menu-active' : '' }}"
                                            href="{{ route('syllabus') }}">
                                            <i class="bi bi-journals"></i>
                                            <span class="label">Syllabus</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="{{ Route::currentRouteName() === 'co-curriculum' ? 'menu-active' : '' }}"
                                            href="{{ route('co-curriculum') }}">
                                            <i class="bi bi-flag"></i>
                                            <span class="label">Co Curriculums</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="{{ Route::currentRouteName() === 'teaching-permission' ? 'menu-active' : '' }}"
                                            href="{{ route('teaching-permission') }}">
                                            <i class="bi bi-journal-check"></i>
                                            <span class="label">Teaching Permission</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="{{ Route::currentRouteName() === 'qualification-acceptance' ? 'menu-active' : '' }}"
                                            href="{{ route('qualification-acceptance') }}">
                                            <i class="bi bi-patch-check-fill"></i>
                                            <span class="label">Qualification Acceptance</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="{{ Route::currentRouteName() === 'teachers-staffs' ? 'menu-active' : '' }}"
                                            href="{{ route('teachers-staffs') }}">
                                            <i class="bi bi-person-vcard-fill"></i>
                                            <span class="label">Teachers and staffs</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="{{ Route::currentRouteName() === 'committee' ? 'menu-active' : '' }}"
                                            href="{{ route('committee') }}">
                                            <i class="bi bi-person-workspace"></i>
                                            <span class="label">Committee</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="{{ Route::currentRouteName() === 'classes' ? 'menu-active' : '' }}"
                                            href="{{ route('classes') }}">
                                            <i data-acorn-icon="book-open" class="icon" data-acorn-size="18"></i>
                                            <span class="label">Classes</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="{{ Route::currentRouteName() === 'notice' ? 'menu-active' : '' }}"
                                            href="{{ route('notice') }}">
                                            <i data-acorn-icon="book" class="icon" data-acorn-size="18"></i>
                                            <span class="label">Notice</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="{{ Route::currentRouteName() === 'image-gallery' ? 'menu-active' : '' }}"
                                            href="{{ route('image-gallery') }}">
                                            <i class="bi bi-images"></i>
                                            <span class="label ">Photo
                                                Gallery</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="{{ Route::currentRouteName() === 'slider-settings' ? 'menu-active' : '' }}"
                                            href="{{ route('slider-settings') }}">
                                            <i class="bi bi-card-image"></i>
                                            <span class="label ">Homepage
                                                Slider</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="{{ Route::currentRouteName() === 'important-links' ? 'menu-active' : '' }}"
                                            href="{{ route('important-links') }}">
                                            <i data-acorn-icon="link" class="icon" data-acorn-size="18"></i>
                                            <span class="label ">Important
                                                Links</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="{{ Route::currentRouteName() === 'homepage-widgets' ? 'menu-active' : '' }}"
                                            href="{{ route('homepage-widgets') }}">
                                            <i data-acorn-icon="notebook-1" class="icon" data-acorn-size="18"></i>
                                            <span class="label ">Homepage
                                                About
                                                Widgets</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="accordion">
                                <a href="#"><i data-acorn-icon="gear" class="icon" data-acorn-size="18"></i>
                                    <span>Settings</span></a>
                                <ul class="submenu">
                                    <li class="checker">
                                        <a class=" {{ Route::currentRouteName() === 'admin-settings' ? 'menu-active' : '' }}"
                                            href="{{ route('admin-settings') }}">
                                            General
                                        </a>
                                    </li>
                                    <li class="checker"><a
                                            class=" {{ Route::currentRouteName() === 'school-settings' ? 'menu-active' : '' }}"
                                            href="{{ route('school-settings') }}">Institute Profile</a></li>
                                    <li class="checker"><a
                                            class=" {{ Route::currentRouteName() === 'header-footer-settings' ? 'menu-active' : '' }}"
                                            href="{{ route('header-footer-settings') }}">Header & Footer</a></li>
                                    @can('role manage')
                                        <li class="checker"><a
                                                class=" {{ Route::currentRouteName() === 'role-settings' ? 'menu-active' : '' }}"
                                                href="{{ route('role-settings') }}">Roles</a></li>
                                    @endcan
                                    @can('permission manage')
                                        <li class="checker"><a
                                                class=" {{ Route::currentRouteName() === 'permission-settings' ? 'menu-active' : '' }}"
                                                href="{{ route('permission-settings') }}">Permission</a></li>
                                    @endcan
                                </ul>
                            </li>
                        </ul>
                    </li>
                @endcan
            </ul>
        </div>

        @include('backend/admin/layouts/sections/navbar')
        <main class="ps-md-2 ps-lg-2">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-auto d-none d-lg-flex"
                        style="height: 100vh;overflow-y: scroll;scrollbar-color: var(--primary) transparent;scrollbar-width: thin !important;">
                        @include('backend/admin/layouts/sections/sidebar')
                    </div>
                    <div class="col">
                        @yield('content')
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div class="modal fade modal-right scroll-out-negative" id="settings" data-bs-backdrop="true" tabindex="-1"
        role="dialog" aria-labelledby="settings" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable full" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Theme Settings</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="scroll-track-visible">
                        <div class="mb-5" id="color">
                            <label class="mb-3 d-inline-block form-label">Color</label>
                            <div class="row d-flex g-3 justify-content-between flex-wrap mb-3">
                                <a href="#" class="flex-grow-1 w-50 option col" data-value="light-blue"
                                    data-parent="color">
                                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                                        <div class="blue-light"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">LIGHT BLUE</span>
                                    </div>
                                </a>
                                <a href="#" class="flex-grow-1 w-50 option col" data-value="dark-blue"
                                    data-parent="color">
                                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                                        <div class="blue-dark"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">DARK BLUE</span>
                                    </div>
                                </a>
                            </div>
                            <div class="row d-flex g-3 justify-content-between flex-wrap mb-3">
                                <a href="#" class="flex-grow-1 w-50 option col" data-value="light-teal"
                                    data-parent="color">
                                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                                        <div class="teal-light"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">LIGHT TEAL</span>
                                    </div>
                                </a>
                                <a href="#" class="flex-grow-1 w-50 option col" data-value="dark-teal"
                                    data-parent="color">
                                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                                        <div class="teal-dark"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">DARK TEAL</span>
                                    </div>
                                </a>
                            </div>
                            <div class="row d-flex g-3 justify-content-between flex-wrap mb-3">
                                <a href="#" class="flex-grow-1 w-50 option col" data-value="light-sky"
                                    data-parent="color">
                                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                                        <div class="sky-light"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">LIGHT SKY</span>
                                    </div>
                                </a>
                                <a href="#" class="flex-grow-1 w-50 option col" data-value="dark-sky"
                                    data-parent="color">
                                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                                        <div class="sky-dark"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">DARK SKY</span>
                                    </div>
                                </a>
                            </div>
                            <div class="row d-flex g-3 justify-content-between flex-wrap mb-3">
                                <a href="#" class="flex-grow-1 w-50 option col" data-value="light-red"
                                    data-parent="color">
                                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                                        <div class="red-light"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">LIGHT RED</span>
                                    </div>
                                </a>
                                <a href="#" class="flex-grow-1 w-50 option col" data-value="dark-red"
                                    data-parent="color">
                                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                                        <div class="red-dark"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">DARK RED</span>
                                    </div>
                                </a>
                            </div>
                            <div class="row d-flex g-3 justify-content-between flex-wrap mb-3">
                                <a href="#" class="flex-grow-1 w-50 option col" data-value="light-green"
                                    data-parent="color">
                                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                                        <div class="green-light"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">LIGHT GREEN</span>
                                    </div>
                                </a>
                                <a href="#" class="flex-grow-1 w-50 option col" data-value="dark-green"
                                    data-parent="color">
                                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                                        <div class="green-dark"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">DARK GREEN</span>
                                    </div>
                                </a>
                            </div>
                            <div class="row d-flex g-3 justify-content-between flex-wrap mb-3">
                                <a href="#" class="flex-grow-1 w-50 option col" data-value="light-lime"
                                    data-parent="color">
                                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                                        <div class="lime-light"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">LIGHT LIME</span>
                                    </div>
                                </a>
                                <a href="#" class="flex-grow-1 w-50 option col" data-value="dark-lime"
                                    data-parent="color">
                                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                                        <div class="lime-dark"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">DARK LIME</span>
                                    </div>
                                </a>
                            </div>
                            <div class="row d-flex g-3 justify-content-between flex-wrap mb-3">
                                <a href="#" class="flex-grow-1 w-50 option col" data-value="light-pink"
                                    data-parent="color">
                                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                                        <div class="pink-light"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">LIGHT PINK</span>
                                    </div>
                                </a>
                                <a href="#" class="flex-grow-1 w-50 option col" data-value="dark-pink"
                                    data-parent="color">
                                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                                        <div class="pink-dark"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">DARK PINK</span>
                                    </div>
                                </a>
                            </div>
                            <div class="row d-flex g-3 justify-content-between flex-wrap mb-3">
                                <a href="#" class="flex-grow-1 w-50 option col" data-value="light-purple"
                                    data-parent="color">
                                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                                        <div class="purple-light"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">LIGHT PURPLE</span>
                                    </div>
                                </a>
                                <a href="#" class="flex-grow-1 w-50 option col" data-value="dark-purple"
                                    data-parent="color">
                                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                                        <div class="purple-dark"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">DARK PURPLE</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="mb-5" id="navcolor">
                            <label class="mb-3 d-inline-block form-label">Override Nav Palette</label>
                            <div class="row d-flex g-3 justify-content-between flex-wrap">
                                <a href="#" class="flex-grow-1 w-33 option col" data-value="default"
                                    data-parent="navcolor">
                                    <div class="card rounded-md p-3 mb-1 no-shadow">
                                        <div class="figure figure-primary top"></div>
                                        <div class="figure figure-secondary bottom"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">DEFAULT</span>
                                    </div>
                                </a>
                                <a href="#" class="flex-grow-1 w-33 option col" data-value="light"
                                    data-parent="navcolor">
                                    <div class="card rounded-md p-3 mb-1 no-shadow">
                                        <div class="figure figure-secondary figure-light top"></div>
                                        <div class="figure figure-secondary bottom"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">LIGHT</span>
                                    </div>
                                </a>
                                <a href="#" class="flex-grow-1 w-33 option col" data-value="dark"
                                    data-parent="navcolor">
                                    <div class="card rounded-md p-3 mb-1 no-shadow">
                                        <div class="figure figure-muted figure-dark top"></div>
                                        <div class="figure figure-secondary bottom"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">DARK</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="mb-5" id="behaviour">
                            <label class="mb-3 d-inline-block form-label">Menu Behaviour</label>
                            <div class="row d-flex g-3 justify-content-between flex-wrap">
                                <a href="#" class="flex-grow-1 w-50 option col" data-value="pinned"
                                    data-parent="behaviour">
                                    <div class="card rounded-md p-3 mb-1 no-shadow">
                                        <div class="figure figure-primary left large"></div>
                                        <div class="figure figure-secondary right small"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">PINNED</span>
                                    </div>
                                </a>
                                <a href="#" class="flex-grow-1 w-50 option col" data-value="unpinned"
                                    data-parent="behaviour">
                                    <div class="card rounded-md p-3 mb-1 no-shadow">
                                        <div class="figure figure-primary left"></div>
                                        <div class="figure figure-secondary right"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">UNPINNED</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="mb-5" id="layout">
                            <label class="mb-3 d-inline-block form-label">Layout</label>
                            <div class="row d-flex g-3 justify-content-between flex-wrap">
                                <a href="#" class="flex-grow-1 w-50 option col" data-value="fluid"
                                    data-parent="layout">
                                    <div class="card rounded-md p-3 mb-1 no-shadow">
                                        <div class="figure figure-primary top"></div>
                                        <div class="figure figure-secondary bottom"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">FLUID</span>
                                    </div>
                                </a>
                                <a href="#" class="flex-grow-1 w-50 option col" data-value="boxed"
                                    data-parent="layout">
                                    <div class="card rounded-md p-3 mb-1 no-shadow">
                                        <div class="figure figure-primary top"></div>
                                        <div class="figure figure-secondary bottom small"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">BOXED</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="mb-5" id="radius">
                            <label class="mb-3 d-inline-block form-label">Radius</label>
                            <div class="row d-flex g-3 justify-content-between flex-wrap">
                                <a href="#" class="flex-grow-1 w-33 option col" data-value="rounded"
                                    data-parent="radius">
                                    <div class="card rounded-md radius-rounded p-3 mb-1 no-shadow">
                                        <div class="figure figure-primary top"></div>
                                        <div class="figure figure-secondary bottom"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">ROUNDED</span>
                                    </div>
                                </a>
                                <a href="#" class="flex-grow-1 w-33 option col" data-value="standard"
                                    data-parent="radius">
                                    <div class="card rounded-md radius-regular p-3 mb-1 no-shadow">
                                        <div class="figure figure-primary top"></div>
                                        <div class="figure figure-secondary bottom"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">STANDARD</span>
                                    </div>
                                </a>
                                <a href="#" class="flex-grow-1 w-33 option col" data-value="flat"
                                    data-parent="radius">
                                    <div class="card rounded-md radius-flat p-3 mb-1 no-shadow">
                                        <div class="figure figure-primary top"></div>
                                        <div class="figure figure-secondary bottom"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">FLAT</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="settings-buttons-container">
        <button type="button" class="btn settings-button btn-primary p-0" data-bs-toggle="modal"
            data-bs-target="#settings" id="settingsButton">
            <span class="d-inline-block no-delay" data-bs-delay="0" data-bs-offset="0,3" data-bs-toggle="tooltip"
                data-bs-placement="left" title="Settings">
                <i data-acorn-icon="paint-roller" class="position-relative"></i>
            </span>
        </button>
    </div>
    @pushOnce('js')
        @include('backend/admin/layouts/sections/scripts')
    @endPushOnce
    @stack('js')

</body>



</html>
