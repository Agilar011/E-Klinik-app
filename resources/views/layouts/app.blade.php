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

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>

{{-- <style>
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    transition: .3s ease-in-out;
    }

    html{
        font-family: 'inter', 'Times New Roman', Times, serif;
        background-image: linear-gradient(rgba(252, 252, 252, 0.6), rgba(119, 191, 249, 0.6)),url(img/KapalRS3.jpg);
        background-attachment: fixed;
        background-size: 100%;
        color: #000000;
        scroll-behavior: smooth;
        overflow-y: hidden;
    }

    html::-webkit-scrollbar {
        display: none;
    }
</style> --}}
