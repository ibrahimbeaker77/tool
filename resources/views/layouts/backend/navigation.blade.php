<!-- app-Header -->
<div class="app-header header sticky">
    <div class="container-fluid main-container">
        <div class="d-flex">
            <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar" href="javascript:void(0)"></a>
            <img src="{{asset('assets/images/brand/icon-7.png')}}" style="width:40px; height:40px;"  alt="">
            <!-- sidebar-toggle-->
            <div class="d-flex order-lg-2 ms-auto header-right-icons">
                <button class="navbar-toggler navresponsive-toggler d-lg-none ms-auto" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4"
                    aria-controls="navbarSupportedContent-4" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fe fe-more-vertical"></span>
                </button>
                <div class="navbar navbar-collapse responsive-navbar p-0">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                        <div class="d-flex order-lg-2">
                            <!-- COUNTRY -->
                            <div class="d-flex country">
                                <a class="nav-link icon theme-layout nav-link-bg layout-setting">
                                    <span class="dark-layout"><i class="fe fe-moon"></i></span>
                                    <span class="light-layout"><i class="fe fe-sun"></i></span>
                                </a>
                            </div>

                            <div class="d-flex country">
                                <a class="nav-link icon text-center" data-bs-target="#country-selector"
                                    data-bs-toggle="modal">
                                    <i class="fe fe-globe"></i><span
                                        class="fs-16 ms-2 d-none d-xl-block">English</span>
                                </a>
                            </div>

                            @if (Route::has('login'))
                                @auth
                                    <div class="dropdown d-flex profile-1">
                                        <a href="" data-bs-toggle="dropdown" class="nav-link leading-none d-flex">
                                            @php
                                                $img     = Auth::user()->image;
                                                $profile = !empty($img) ? $img : 'default.png';
                                            @endphp
                                            <img src="{{asset('assets/images/users/'.$profile)}}" alt="profile-user" class="avatar  profile-user brround cover-image">
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                            <div class="drop-heading">
                                                <div class="text-center">
                                                    <h5 class="text-dark mb-0 fs-14 fw-semibold">{{ Auth::user()->name }}</h5>
                                                    <small class="text-muted">{{ (Auth::user()->role == '1' ? 'Admin' : 'Customer') }}</small>
                                                </div>
                                            </div>
                                            <div class="dropdown-divider m-0"></div>
                                            <a class="dropdown-item" href="{{ url('/profile') }}">
                                                <i class="dropdown-icon fe fe-user"></i> Profile
                                            </a>

                                            <a class="dropdown-item" href="{{ url('/dashboard') }}">
                                                <i class="dropdown-icon fe fe-home"></i> Dashboard
                                            </a>

                                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <i class="dropdown-icon icon icon-logout" data-bs-toggle="tooltip" title="icon-logout"></i> {{ __('Sign Out') }} 
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf 
                                            </form>
                                        </div>
                                    </div>
                                @else
                                    <div class="d-flex country">
                                        <a href="{{ route('login') }}" class="nav-link icon text-center">Login</a>
                                    </div>
                                    @if (Route::has('register'))
                                        {{-- <div class="d-flex country">    
                                            <a href="{{ route('register') }}" class="nav-link icon text-center">Register</a>
                                        </div> --}}
                                    @endif
                                @endauth
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /app-Header -->