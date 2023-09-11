        <header class="site__header">
            <!-- Add this code inside your <header> element -->
            <div class="mobile-menu-toggle" id="mobile-menu-toggle">
                <div class="hamburger-icon">
                    <div class="bar"></div>
                    <div class="bar"></div>
                    <div class="bar"></div>
                </div>
            </div>
            <nav class="sidebar-menu">
                <div class="close-button" id="close-button">&times;</div>
                <ul class="sidebar-menu-list">
                    @foreach (sitemenu() as $submenu)
                        <li wire:key="{{ $submenu->id }}">
                            <div class="{{ count($submenu->submenus) > 0 ? 'accordion-item' : null }}">
                                <a href="{{ count($submenu->submenus) > 0 ? 'javascript:void(0)' : $submenu->url }}"
                                    {{-- {{ count($submenu->submenus) > 0 ? null : 'wire:navigate' }} --}}
                                    class="{{ request()->is($submenu->url) ? 'active' : '' }}">{{ $submenu->name }}</a>
                                @if (count($submenu->submenus) > 0)
                                    <i class="ms-1 fa-solid fa-caret-down" style="color: var(--site-text)"></i>
                                @endif
                            </div>
                            <ul class="dropdown-menu-prev accordion-content">
                                @foreach ($submenu->submenus as $subsubmenu)
                                    <li wire:key="{{ $subsubmenu->id }}">
                                        <a href="{{ $subsubmenu->url }}" {{-- wire:navigate --}}
                                            class="{{ request()->is($subsubmenu->url) ? 'active' : '' }}">{{ $subsubmenu->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </nav>

            <div class="Header__top_image" style="background-color: var(--site-primary); color: var(--site-text)">
                <img src="{{ asset('storage') }}/{{ get_settings('header_logo') }}" alt="">
            </div>
            <nav class="navbar navbar-expand-lg navbar-light mb-2 mt-1 border-top border-bottom"
                style="background-color: var(--site-primary);">
                <div class="w-100" id="navbarNav">
                    <ul class="navbar-nav header__navbar d-flex w-100 flex-row justify-content-around ">
                        @foreach (sitemenu() as $menu)
                            <li wire:key="{{ $menu->id }}">
                                <a href="{{ $menu->url }}" {{-- wire:navigate --}}
                                    class="{{ request()->is($menu->url) ? 'active' : '' }}">{{ $menu->name }}</a>
                                @if (count($menu->submenus) > 0)
                                    <i class="ms-1 fa-solid fa-caret-down" style="color: var(--site-text)"></i>
                                    <ul class="dropdown-menu-prev">
                                        @foreach ($menu->submenus as $submenu)
                                            <li wire:key="{{ $submenu->id }}"><a href="{{ $submenu->url }}"
                                                    {{-- wire:navigate --}}
                                                    class="{{ request()->is($submenu->url) ? 'active' : '' }}">{{ $submenu->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </nav>
        </header>
