<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- icon --}}
    <link rel="icon" href="{{ asset('img/logo/icon-logo.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles
    @stack('styles')
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .navbar-dark {
            box-shadow: 0px 2px 8px 2px #7e7e7e;
            /* background-color: rgb(216, 216, 216); */
            transition-duration: 0.5s;
            transition-function: ease-in-out;
        }
    </style>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

</head>

<body class=" antialiased">
    <x-jet-banner />

    <div class="min-h-screen">
        @include('global-nav')

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @include('global-footer')

    @stack('modals')

    @livewireScripts
    @stack('scripts')

    <script>
        document.onreadystatechange = function() {
            let lastScrollPosition = 0;
            const navbar = document.querySelector('.navbar-main');
            window.addEventListener('scroll', function(e) {
                lastScrollPosition = window.scrollY;

                if (lastScrollPosition > 50)
                    navbar.classList.add('navbar-dark');
                else
                    navbar.classList.remove('navbar-dark');
            });
        }
    </script>
</body>

</html>
