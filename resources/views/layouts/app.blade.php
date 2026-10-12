<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Service Request and Referral Tracker')</title>

    @include('partials.theme-init')

    @vite('resources/css/app.css')
</head>
<body class="min-h-screen bg-base-100 text-base-content">
    <main class="flex min-h-screen flex-col">
        @yield('content')
    </main>

    @include('partials.theme-toggle')
</body>
</html>
