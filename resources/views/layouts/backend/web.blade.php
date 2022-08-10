<!doctype html>
<html lang="en" dir="ltr">
    <head>
        @include('layouts.backend.header')
    </head>
    <body class="app sidebar-mini ltr light-mode">
        <!-- GLOBAL-LOADER -->
        <div id="global-loader">
            <img src="{{asset('assets/images/loader.svg')}}" class="loader-img" alt="Loader">
        </div>
        <!-- /GLOBAL-LOADER -->

        <!-- PAGE -->
        <div class="page">
            <div class="page-main">
                @include('layouts.backend.navigation')
                @include('layouts.backend.left-sidebar')
                @yield('content')
            </div>
            @include('layouts.backend.footer')
        </div>

        @include('layouts.backend.script')
    </body>
</html>
