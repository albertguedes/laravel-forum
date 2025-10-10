<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" >
        <meta name="description" content="@yield('description')" >
        @php($title = View::getSections()['title'] ?? null)
        @if (is_null($title) || $title == 'Home')
            <title>{{ env('APP_NAME') }}</title>
        @else
            <title>@yield('title') | {{ env('APP_NAME') }}</title>
        @endif
        <link href="{{ asset('assets/vendor/Bootstrap/bootstrap.min.css') }}" rel="stylesheet" >
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,400;0,700;0,800;1,400&display=swap" rel="stylesheet">
        <link href="{{ asset('assets/css/fonts.css') }}" rel="stylesheet" >
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" >
        @yield('styles')
        @yield('scripts')
    </head>
    <body class="d-flex flex-column h-100">
        <div class="container" >
            <main id="main" class="flex-shrink-0" >
                <div class="row justify-content-center" >
                    <div class="px-0 col-sm-10 col-md-10 col-lg-8 col-xl-8 col-xxl-8" >
                        <header id="header" class="py-5 mt-5 row" >
                            <div class="py-4 text-center col-12 text-md-start" >
                                @if( Request::url() == route('home') )
                                <h1 id="sitename" >
                                    <a href="{{ route('home') }}" >
                                        {{ env('APP_NAME') }}
                                    </a> <i data-eva="github"></i>
                                </h1>
                                @else
                                <div id="sitename" >
                                    <a href="{{ route('home') }}" >
                                        {{ env('APP_NAME') }}
                                    </a>
                                </div>
                                @endif
                            </div>
                        </header>
                        <article id="content" class="row" >
                            @include('partials.flash-message')
                            <div class="pt-5 col-12" >
                                @yield('content')
                            </div>
                        </article>
                    </div>
                </div>
            </main>
            <footer id="footer" class="container py-5 my-5 border-top" >
                @include('partials.footer')
            </footer>
        </div>
        <script src="{{ asset('assets/vendor/Jquery/jquery-3.7.1.min.js') }}" type="text/javascript" ></script>
        <script src="{{ asset('assets/vendor/FontAwesome/f761473b22.js') }}" type="text/javascript" ></script>
        <script src="{{ asset('assets/vendor/Bootstrap/bootstrap.bundle.min.js') }}" type="text/javascript" ></script>
        <script src="{{ asset('assets/js/script.js') }}" type="text/javascript" ></script>
        @yield('footer_scripts')
    </body>
</html>
