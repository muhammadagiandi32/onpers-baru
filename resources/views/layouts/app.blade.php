<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- SEO Meta Tags -->
    <meta name="description" content="{{ $metaDescription ?? 'Deskripsi default untuk SEO' }}">
    <meta name="keywords" content="{{ $metaKeywords ?? 'keyword1, keyword2, keyword3' }}">
    <meta name="author" content="{{ config('app.name', 'Laravel') }}">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="{{ $metaTitle ?? config('app.name', 'Laravel') }}">
    <meta property="og:description" content="{{ $metaDescription ?? 'Deskripsi default untuk SEO' }}">
    <meta property="og:image" content="{{ $metaImage ?? asset('default-og-image.jpg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $metaTitle ?? config('app.name', 'Laravel') }}">
    <meta name="twitter:description" content="{{ $metaDescription ?? 'Deskripsi default untuk SEO' }}">
    <meta name="twitter:image" content="{{ $metaImage ?? asset('default-twitter-image.jpg') }}">

    <title>{{ $metaTitle ?? config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Schema Markup -->
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "WebPage",
            "name": "{{ $metaTitle ?? config('app.name', 'Laravel') }}",
            "description": "{{ $metaDescription ?? 'Deskripsi default untuk SEO' }}",
            "url": "{{ url()->current() }}",
            "publisher": {
                "@type": "Organization",
                "name": "{{ config('app.name', 'Laravel') }}"
            }
        }
    </script>
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
            {{ $slot }}
        </main>
    </div>
</body>

</html>