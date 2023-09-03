        <header class="site__header">
            <div class="Header__top_image">
                <img src="{{ asset('storage') }}/{{ get_settings('header_logo') }}" alt="">
            </div>
            <nav class="navbar navbar-expand-lg navbar-light bg-light mb-2 mt-4 border-top border-bottom">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav header__navbar">
                        {{-- @dd(sitemenu()) --}}
                        @foreach (sitemenu() as $menu)
                            <li wire:key="{{ $menu->id }}">
                                {{ $menu->name }}
                                @if (count($menu->submenus) > 0)
                                    <ul class="dropdown-menu-prev">
                                        @foreach ($menu->submenus as $submenu)
                                            <li wire:key="{{ $submenu->id }}">{{ $submenu->name }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                        {{-- <li class="nav-item active">
                            <a class="nav-link" href="#">হোম</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">প্রতিষ্ঠান সম্পর্কে</a>
                            <div class="dropdown">
                                <ul>
                                    <li>প্রতিষ্ঠানের ইতিহাস</li>
                                    <li>সভাপতির বাণী</li>
                                    <li>প্রতিষ্ঠান প্রধানের বাণী</li>
                                    <li>সহকারী প্রধানের বাণী</li>
                                    <li>পাঠদানের অনুমতি</li>
                                    <li>শ্রেণি সমূহ</li>
                                    <li>সর্বশেষ কমিটি</li>
                                    <li>প্রাক্তণ সভাপতিগণ ও কার্যকাল</li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">শিক্ষক-কর্মচারী</a>
                            <div class="dropdown">
                                <ul>
                                    <li>বর্তমান শিক্ষক-শিক্ষিকা</li>
                                    <li>বর্তমান কর্মচারী</li>
                                    <li>শিক্ষক-কর্মচারীদের উপস্থিতি</li>
                                    <li>প্রাক্তণ প্রধান শিক্ষকগণ ও কার্যকাল</li>
                                    <li>প্রাক্তণ কর্মচারীগণ ও কার্যকাল</li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="#">শিক্ষার্থী</a>
                            <div class="dropdown">
                                <ul>
                                    <li>অধ্যায়নরত শিক্ষার্থীর সংখ্যা</li>
                                    <li>শিক্ষার্থীদের উপস্থিতি</li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">পাঠদান সংক্রান্ত</a>
                            <div class="dropdown">
                                <ul>
                                    <li>রুটিন
                                    </li>
                                    <li>পাঠ্যসূচী
                                    </li>
                                    <li>
                                        বিবিধ নোটিশ</li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">ফলাফল</a>
                            <div class="dropdown">
                                <ul>
                                    <li>পাবলিক পরীক্ষার ফলাফল
                                    </li>
                                    <li>একাডেমিক ফলাফল</li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">যোগাযোগ</a>
                        </li> --}}
                    </ul>
                </div>
            </nav>
        </header>
