<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Service Request and Referral Tracker') }}</title>

        @include('partials.theme-init')

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-base-100 text-base-content">
        <div class="navbar mx-auto w-full max-w-4xl">
            <div class="flex-1">
                <a href="/" class="btn btn-ghost text-xl">
                    Service Request &amp; Referral Tracker
                </a>
            </div>
            <div class="flex-none">
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn btn-primary">Dashboard</a>
                @else
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}" class="btn btn-primary">Log in</a>
                    @endif
                @endauth
            </div>
        </div>

        <main class="hero mx-auto min-h-[70vh] max-w-4xl">
            <div class="hero-content text-center">
                <div class="max-w-lg">
                    <h1 class="text-5xl font-bold">
                        Service Request &amp; Referral Tracker
                    </h1>
                    <p class="py-6 text-base-content/70">
                        Submit service requests, track their progress, and manage referrals for farmers in one place.
                    </p>
                    <a href="{{ route('login') }}" class="btn btn-primary">Get Started</a>
                </div>
            </div>
        </main>

        @include('partials.theme-toggle')
    </body>
</html>
