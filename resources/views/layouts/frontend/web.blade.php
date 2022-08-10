<!doctype html>
<html lang="en" dir="ltr">
    <head>
        @include('layouts.frontend.header')
    </head>
    <body class="app sidebar-mini ltr light-mode">
        <div id="global-loader">
            <img src="{{asset('assets/images/loader.svg')}}" class="loader-img" alt="Loader">
        </div>
        <div class="page">
            <div class="page-main">
                @include('layouts.frontend.navigation')
                @yield('content')
            </div>

            @include('layouts.frontend.footer')
        </div>

        @include('layouts.frontend.script')
    </body>
</html>