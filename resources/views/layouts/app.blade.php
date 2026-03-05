<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <meta http-equiv="Expires" content="0">
        <meta http-equiv="Last-Modified" content="0">
        <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
        <meta http-equiv="Pragma" content="no-cache">

        <title>{{ config('app.name', 'Quiniela') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite([
            'resources/css/app.css', 
            'resources/css/styles.css', 
            'resources/js/app.js',
            'resources/js/functions-views.js',
            'resources/js/functions.js'
        ])

        {{-- <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/styles.css')}}">
        <script src="{{asset('js/app.js')}}"></script> --}}
    </head>
    <body
        class="font-sans antialiased bg-[--light-color] bg-auth bg-fixed text-[--dark-color] overflow-x-hidden"
        style="background-image: url({{ asset('images/portadas/estadio-banner.png') }});"
    >
        <div class="min-h-screen">
            @include('layouts.navigation')            

            <!-- Page Heading -->
            @if (isset($header) && !empty($header))
                <header class="shadow bg-[--secondary-color]">
                    <div class="p-6 text-center text-white">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>