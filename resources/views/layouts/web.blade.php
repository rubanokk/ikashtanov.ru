<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="min-h-screen bg-woodsmoke-1000">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')" />
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="yandex-verification" content="b4551322ca494e32" />
    <meta name="google-site-verification" content="bCSus3tabq5C7HjQtSbFKegUJXrhsYpxgHG5R8DCDZA" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-sans antialiased text-woodsmoke-400 relative">
    @include('common/header')
    <main class="w-full flex-row h-full">
        @yield('content')
    </main>
    @include('common/footer')
    @include('common/form')
    @include('common/icons')
    @include('common/metrika')
</body>

</html>
