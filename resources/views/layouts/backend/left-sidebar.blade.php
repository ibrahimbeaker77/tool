<!--APP-SIDEBAR-->
<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1" href="index.html">
                <!-- Prime Tools -->
                <img src="{{asset('assets/images/brand/icon-5.png')}}" style="width:165px; height:45px;"  alt="" class="">
                <!-- <img src="{{asset('assets/images/brand/icon-7.png')}}" style="width:40px; height:40px;"  alt=""> -->
                 <!-- <img src="{{asset('assets/images/brand/icon.jpg')}}"  class="header-brand-img desktop-logo" alt="logo">
                <img src="{{asset('assets/images/brand/icon-7.png')}}"  class="header-brand-img toggle-logo"
                    alt="logo">  -->
            </a>
            <!-- LOGO -->
        </div>
        <div class="main-sidemenu">
            <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg"
                    fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg></div>
            <ul class="side-menu">
                <li class="sub-category">
                    <h3>Main</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{url('dashboard')}}"><i class="side-menu__icon fe fe-home"></i><span class="side-menu__label">Dashboard</span></a>
                </li>
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{url('profile')}}"><i class="side-menu__icon fe fe-user"></i><span class="side-menu__label">Profile</span></a>
                </li>
                
                @canany(['permission-list','permission-create'])
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{url('permissions')}}"><i class="side-menu__icon fe fe-users"></i><span class="side-menu__label">Permissions</span></a>
                </li>
                @endcanany

                @canany(['role-list','role-create'])
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{url('roles')}}"><i class="side-menu__icon fe fe-users"></i><span class="side-menu__label">Roles</span></a>
                </li>
                @endcanany

                @canany(['user-list','user-create'])
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{url('users')}}"><i class="side-menu__icon fe fe-users"></i><span class="side-menu__label">Users</span></a>
                </li>
                @endcanany

                @canany(['user-list','user-create'])
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{url('users')}}"><i class="side-menu__icon fe fe-users"></i><span class="side-menu__label">Orders</span></a>
                </li>
                @endcanany

                <li class="sub-category">
                    <h3>General Information</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i class="side-menu__icon fe fe-slack"></i><span class="side-menu__label">General</span><i class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1"><a href="javascript:void(0)">General</a></li>
                        <li><a href="{{route('pages.index')}}" class="slide-item {{ (request()->is('pages')) ? 'active' : '' }}">Pages</a></li>

                        <li><a href="{{route('faqs.index')}}" class="slide-item {{ (request()->is('faqs')) ? 'active' : '' }}">FAQs</a></li>

                        <li class="sub-slide">
                            <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span class="sub-side-menu__label">Blogs</span><i class="sub-angle fe fe-chevron-right"></i></a>
                            <ul class="sub-slide-menu">
                                <li><a href="{{route('blogs-category.index')}}" class="sub-slide-item {{ (request()->is('blogs-category')) ? 'active' : '' }}"> Blog Categories</a></li>
                                <li><a href="{{route('blogs.index')}}" class="sub-slide-item {{ (request()->is('blogs')) ? 'active' : '' }}"> All Blogs</a></li>
                            </ul>
                        </li>

                        <li class="sub-slide">
                            <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span class="sub-side-menu__label">Tools</span><i class="sub-angle fe fe-chevron-right"></i></a>
                            <ul class="sub-slide-menu">
                                <li><a href="{{route('tools-category.index')}}" class="sub-slide-item {{ (request()->is('tools-category')) ? 'active' : '' }}"> Tool Categories</a></li>
                                <li><a href="{{route('tools.index')}}" class="sub-slide-item {{ (request()->is('tools')) ? 'active' : '' }}"> All Tools</a></li>
                            </ul>
                        </li>

                        <li><a href="{{route('testimonials.index')}}" class="slide-item {{ (request()->is('testimonials')) ? 'active' : '' }}">Testimonials</a></li>

                        <li><a href="{{route('subscribers.index')}}" class="slide-item {{ (request()->is('subscribers')) ? 'active' : '' }}">Subscribers</a></li>

                        <li><a href="{{route('contact.index')}}" class="slide-item {{ (request()->is('contact')) ? 'active' : '' }}">Contact us</a></li>

                        <li><a href="{{route('advertise.index')}}" class="slide-item {{ (request()->is('advertise')) ? 'active' : '' }}">Advertise</a></li>

                        <li><a href="{{route('social-links.index')}}" class="slide-item {{ (request()->is('social-links')) ? 'active' : '' }}">Social Links</a></li>

                        <li><a href="{{route('packages.index')}}" class="slide-item {{ (request()->is('packages')) ? 'active' : '' }}">Packages</a></li>

                        <li><a href="{{route('company-information.index')}}" class="slide-item {{ (request()->is('company-information')) ? 'active' : '' }}">Company Information</a></li>
                        
                    </ul>
                </li>

                <li class="sub-category">
                    <h3>Tools Integration</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                            class="side-menu__icon fa fa-tasks"></i><span
                            class="side-menu__label">Tools Integration</span><i
                            class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1"><a href="javascript:void(0)">Tools Integration</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!--/APP-SIDEBAR-->
</div>