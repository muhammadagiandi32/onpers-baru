<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- SEO Meta Tags -->
        <title>{{ $title ?? config('app.name', 'Laravel') }}</title>
        <meta name="description" content="{{ $description ?? 'Deskripsi default website' }}">
        <meta name="keywords" content="{{ $keywords ?? 'keyword1, keyword2, keyword3' }}">
        <meta name="robots" content="index, follow">
        <link rel="canonical" href="{{ url()->current() }}">

        <!-- Open Graph Meta Tags (for Social Media) -->
        <meta property="og:type" content="website">
        <meta property="og:title" content="{{ $title ?? config('app.name', 'Laravel') }}">
        <meta property="og:description" content="{{ $description ?? 'Deskripsi default website' }}">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:image" content="{{ $og_image ?? asset('default-image.jpg') }}">

        <!-- Twitter Card -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ $title ?? config('app.name', 'Laravel') }}">
        <meta name="twitter:description" content="{{ $description ?? 'Deskripsi default website' }}">
        <meta name="twitter:image" content="{{ $og_image ?? asset('default-image.jpg') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

         <!-- Favicon -->
         <link rel="icon" type="img/logo" href="{{ asset('img/logo/logo-onpers.png') }}">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                @yield('content')
            </main>
        </div>
    </body>
</html>
