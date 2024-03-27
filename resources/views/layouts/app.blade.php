<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <!-- Scripts -->
    @include('sweetalert::alert')

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <x-banner />

    @if (auth()->user()->role === 'admin')
        <div class="min-h-screen"
            style="background-image: url('/img/KapalRS.jpg'); background-repeat: no-repeat; background-size: cover; background-attachment: fixed;">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="min-w-full mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    @elseif (auth()->user()->role === 'user')
        <div class="min-h-screen"
            style="background-image: url('/img/User.jpg'); background-repeat: no-repeat; background-size: cover; background-attachment: fixed;">

            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-screen mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    @elseif (auth()->user()->role === 'dokter')
        <div class="min-h-screen bg-gray-100" {{-- style="background-image: url('/img/bg-dokter.jpg'); background-repeat: no-repeat; background-size: cover;"> --}}>
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-full mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>


    @endif





    @stack('modals')

    @livewireScripts
    <footer class="text-white text-center py-2 bg-blue-400 fixed bottom-0 w-full font-semibold"
        style="font-family: sans-serif">
        <div class="footer">
            2024 PT PAL INDONESIA
        </div>
    </footer>
</body>

</html>
