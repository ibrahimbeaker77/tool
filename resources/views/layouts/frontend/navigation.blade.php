<div class="app-header header sticky" style="padding: 0">
    <div class="container main-container">
        <div class="d-flex">
            <a class="mt-3 fs-6" href="/">
            <img src="{{asset('assets/images/brand/icon-5.png')}}" alt="nothing" style="width:150px; height:40px;" class="mb-2">
            </a>
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
                            <div class="dropdown d-flex">
                                <a href="javascript:void(0)" class="nav-link icon" data-bs-toggle="dropdown">
                                    <i class="fe fe-search"></i>
                                </a>
                                <div class="dropdown-menu header-search dropdown-menu-start">
                                    <div class="input-group w-100 p-2">
                                        <input type="text" class="form-control" placeholder="Search....">
                                        <div class="input-group-text btn btn-primary">
                                            <i class="fa fa-search" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

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
                                    <div class="d-flex country">
                                        <a href="" class="btn ripple btn-min w-sm btn-secondary me-2 my-auto d-lg-none d-xl-block d-block">Price</a>
                                    </div>
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
                                        <a href="" class="btn ripple btn-min w-sm btn-secondary me-2 my-auto d-lg-none d-xl-block d-block">Price</a>
                                    </div>
                                    <div class="d-flex country">
                                        <a href="{{ route('login') }}" class="btn ripple btn-min w-sm btn-primary me-2 my-auto d-lg-none d-xl-block d-block">Login</a>
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