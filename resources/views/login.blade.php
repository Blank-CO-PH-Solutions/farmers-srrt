@extends('layouts.app')

@section('content')
<div
    class="min-h-screen bg-cover bg-center"
    style="background-image: url('/images/farmers.jpg')"
>
    <!-- Background overlay -->
    <div class="min-h-screen bg-black/45 flex items-center justify-center p-4">

        <!-- Login Card -->
        <div class="w-full max-w-md bg-white rounded-xl shadow-2xl p-8">

            <h3 class="text-2xl font-bold text-center mb-2">
                Service Request & Referral Tracker
            </h3>

            <p class="text-center text-gray-600 text-sm mb-6">
                Login to access your account
            </p>

            <form method="POST" action="/login" class="flex flex-col gap-4">
                @csrf

                <!-- Email -->
                <div class="flex flex-col gap-1">
                    <label
                        for="email"
                        class="font-medium text-sm"
                    >
                        Email Address
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-700 focus:border-blue-900 w-full"
                        placeholder="Enter your email"
                        required
                        autofocus
                    >
                </div>

                <!-- Password -->
                <div class="flex flex-col gap-1">
                    <label
                        for="password"
                        class="font-medium text-sm"
                    >
                        Password
                    </label>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-700 focus:border-blue-900 w-full"
                        placeholder="Enter your password"
                        required
                    >
                </div>

                <!-- Remember Me -->
                <div class="flex items-center gap-2">
                    <input
                        type="checkbox"
                        id="remember"
                        name="remember"
                        class="cursor-pointer"
                    >

                    <label
                        for="remember"
                        class="cursor-pointer select-none font-medium text-sm"
                    >
                        Remember Me
                    </label>
                </div>

                <!-- Login -->
                <button
                    type="submit"
                    class="w-full py-2 rounded bg-blue-600 text-white font-medium cursor-pointer hover:bg-blue-700 transition-colors"
                >
                    Login
                </button>
            </form>

        </div>
    </div>
</div>
@endsection
