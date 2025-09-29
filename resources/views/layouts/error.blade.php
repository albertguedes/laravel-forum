<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" >
        <meta name="description" content="@yield('description')" >
        <title>@yield('title') | {{ env('APP_NAME') }}</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" >
    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0" >
            <div class="container" >
                <div class="row justify-content-center" >
                    <div class="col-11 col-sm-10 col-md-10 col-lg-8 col-xl-8 col-xxl-8
                    px-0" >
                        <header class="row pt-5" >
                            <div class="col-12 py-4 text-center" >
                                <h1 id="sitename" >
                                    <a href="{{ route('home') }}" >
                                        {{ env('APP_NAME') }}
                                    </a>
                                </h1>
                            </div>
                        </header>
                        <article class="row" >
                            <div class="col-12 pt-5" >
                                @yield('content')
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </main>
        <script src="https://kit.fontawesome.com/f761473b22.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    </body>
</html>
