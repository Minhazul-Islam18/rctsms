<ul class="sw-25 side-menu mb-0 primary" id="">
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
