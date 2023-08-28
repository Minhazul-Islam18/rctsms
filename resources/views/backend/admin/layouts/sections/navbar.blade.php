      <div id="nav" class="nav-container d-flex">
          <div class="nav-content d-flex">
              <div class="logo position-relative">
                  <a href="Dashboard.GettingStarted.html">
                      <div class="img"></div>
                  </a>
              </div>
              <div class="user-container d-flex">
                  <a href="#" class="d-flex user position-relative" data-bs-toggle="dropdown" aria-haspopup="true"
                      aria-expanded="false">
                      @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                          <button
                              class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                              <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                                  alt="{{ Auth::user()->name }}" />
                          </button>
                      @else
                          <div class="me-2">
                              {!! Avatar::create(Auth::user()->name)->toSvg() !!}
                          </div>
                          {{ Auth::user()->name }}
                      @endif
                  </a>
                  <div class="dropdown-menu dropdown-menu-end user-menu wide">
                      <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="{{ route('profile.show') }}">
                                  {{ __('Profile') }}</a></li>
                          @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                              <li><a class="dropdown-item" href="{{ route('api-tokens.index') }}">
                                      {{ __('API Tokens') }}
                                  </a></li>
                          @endif

                          <div class="border-t border-gray-200 dark:border-gray-600"></div>

                          <!-- Authentication -->
                          <form method="POST" action="{{ route('logout') }}" x-data>
                              @csrf

                              <li><a class="dropdown-item" href="{{ route('logout') }}"
                                      @click.prevent="$root.submit();">
                                      {{ __('Log Out') }}
                                  </a></li>
                          </form>
                      </ul>
                      <div class="row mb-0 ms-0 me-0">
                          <div class="col-12 ps-1 mb-2">
                              <div class="text-extra-small text-primary">ACCOUNT</div>
                          </div>
                          <div class="col-6 ps-1 pe-1">
                              <ul class="list-unstyled">
                                  <li>
                                      <a class="dropdown-item ps-0" href="{{ route('profile.show') }}">
                                          {{ __('Profile') }}</a>
                                  </li>
                                  @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                      <li><a class="dropdown-item" href="{{ route('api-tokens.index') }}">
                                              {{ __('API Tokens') }}
                                          </a></li>
                                  @endif
                              </ul>
                          </div>
                          <div class="col-6 pe-1 ps-1">
                              <ul class="list-unstyled">
                                  <form method="POST" action="{{ route('logout') }}" x-data>
                                      @csrf
                                      <li>
                                          <a class="dropdown-item" href="{{ route('logout') }}"
                                              @click.prevent="$root.submit();">
                                              <i data-acorn-icon="logout" class="me-2" data-acorn-size="14"></i>
                                              <span class="align-middle">{{ __('Log Out') }}</span>
                                          </a>
                                      </li>
                                  </form>
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
              <ul class="list-unstyled list-inline text-center menu-icons">
                  <li class="list-inline-item">
                      <a href="#" id="colorButton">
                          <i data-acorn-icon="light-on" class="light" data-acorn-size="18"></i>
                          <i data-acorn-icon="light-off" class="dark" data-acorn-size="18"></i>
                      </a>
                  </li>
              </ul>
              <div class="menu-container flex-grow-1">
                  <ul id="menu" class="menu">
                      <li>
                          <a href="/">
                              <i data-acorn-icon="eye" data-acorn-size="18"></i>
                              <span class="label">Visit Site</span>
                          </a>
                      </li>
                  </ul>
              </div>
              <div class="mobile-buttons-container">
                  <a href="#" id="mobileMenuButton" class="menu-button">
                      <i data-acorn-icon="menu"></i>
                  </a>
              </div>
          </div>
          <div class="nav-shadow"></div>
      </div>
