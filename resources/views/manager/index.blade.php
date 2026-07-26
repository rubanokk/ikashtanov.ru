<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="min-h-screen">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Панель управления</title>
    <meta name="description" content="@yield('description')" />
    <link rel="icon" type="image/svg" href="/favicon.svg">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="yandex-verification" content="14873900d35d642b" />
    <meta name="google-site-verification" content="bCSus3tabq5C7HjQtSbFKegUJXrhsYpxgHG5R8DCDZA" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body  class="flex flex-col h-full min-h-screen">
    <main id="manager" class="w-full flex-row h-full">
    </main>
    @include('common/icons')
    @vite(['resources/css/manager.css', 'resources/js/manager.js'])
</body>

</html>
