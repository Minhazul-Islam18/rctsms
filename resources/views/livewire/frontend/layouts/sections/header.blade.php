        <header class="site__header">
            <div class="Header__top_image" style="background-color: var(--site-primary); color: var(--site-text)">
                <img src="{{ asset('storage') }}/{{ get_settings('header_logo') }}" alt="">
            </div>
            <nav class="navbar navbar-expand-lg navbar-light mb-2 mt-1 border-top border-bottom"
                style="background-color: var(--site-primary);">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav header__navbar">
                        @foreach (sitemenu() as $menu)
                            <li wire:key="{{ $menu->id }}">
                                <a href="{{ $menu->url }}" wire:navigate
                                    class="{{ request()->is($menu->url) ? 'active' : '' }}">{{ $menu->name }}</a>
                                @if (count($menu->submenus) > 0)
                                    <i class="ms-1 fa-solid fa-caret-down" style="color: var(--site-text)"></i>
                                    <ul class="dropdown-menu-prev">
                                        @foreach ($menu->submenus as $submenu)
                                            <li wire:key="{{ $submenu->id }}"><a href="{{ $submenu->url }}"
                                                    wire:navigate
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
