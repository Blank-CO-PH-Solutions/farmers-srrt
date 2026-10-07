<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Service Request and Referral Tracker')</title>

    @vite('resources/css/app.css')
</head>
<body class="flex flex-col">

    <!-- Main Content Container -->
    <main class="grow">
        <div class="flex flex-col">
            @yield('content')
        </div>
    </main>
</body>
</html>
