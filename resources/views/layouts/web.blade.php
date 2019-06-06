<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>
            {{ config('app.name') }}
        </title>

        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
        @stack('stylesheets')
        
        <script src="{{ mix('js/app.js') }}" defer="true"></script>
        @stack('scripts')
    </head>
    <body data-controller="application">
        <header class="web">
            <section class="web-layouts grid-container">
                @include('layouts.header')
            </section>
            
            @yield('header')
        </header>

        <main class="web grid-container grid-x grid-margin-y">
            @isset ($query)
                <aside class="cell callout">
                    Results for <strong>{{ $query }}</strong>
                </aside>
            @endisset

            <section class="cell" id="content">
                @yield('content')
            </main>
        </main>

        <footer class="web">
            <footer class="web-layouts grid-container">
                @include('layouts.footer')
            </footer>

            @yield('footer')
        </footer>
    </body>
</html>
