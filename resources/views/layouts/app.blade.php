<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>TSTT</title>
        <link rel="icon" href="https://bmobile.co.tt/wp-content/uploads/2017/07/cropped-logo_bmobile-150x150.png" sizes="32x32" />

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.js" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @if (Route::has('login'))
                @auth
                    @livewire('navigation-dropdown')
                @else
                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    </div>
                @endif
            @endif
            
            <!-- Page Heading -->
            <header class="flex-1 min-w-0">
                <h2 class="text-center text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:leading-9 sm:truncate">
                    {{ $header }}
                </h2>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
