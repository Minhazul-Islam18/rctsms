        <header class="site__header">
            <div class="Header__top_image bg-info">
                <img src="{{ asset('storage') }}/{{ get_settings('logo') }}" alt="">
            </div>
            <nav class="navbar navbar-expand-lg navbar-light bg-warning mb-2 mt-4 border-top border-bottom">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav header__navbar">
                        @foreach (sitemenu() as $menu)
                            <li wire:key="{{ $menu->id }}">
                                <a href="{{ $menu->url }}">{{ $menu->name }}</a>
                                @if (count($menu->submenus) > 0)
                                    <ul class="dropdown-menu-prev">
                                        @foreach ($menu->submenus as $submenu)
                                            <li wire:key="{{ $submenu->id }}"><a
                                                    href="{{ $submenu->url }}">{{ $submenu->name }}</a></li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </nav>
        </header>
