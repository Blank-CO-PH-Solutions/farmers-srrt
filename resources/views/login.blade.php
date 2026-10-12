@extends('layouts.app')

@section('content')
<div
    class="min-h-screen bg-cover bg-center"
    style="background-image: url('/images/farmers.jpg')"
>
    <div class="flex min-h-screen items-center justify-center bg-black/45 p-4">

        <div class="card w-full max-w-md bg-base-100 shadow-xl">
            <div class="card-body">

                <h1 class="card-title justify-center text-center">
                    Service Request &amp; Referral Tracker
                </h1>

                <p class="text-center text-sm text-base-content/60">
                    Login to access your account
                </p>

                <form method="POST" action="/login" class="mt-2 flex flex-col gap-4">
                    @csrf

                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">Email Address</legend>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="input w-full"
                            placeholder="Enter your email"
                            required
                            autofocus
                        >
                    </fieldset>

                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">Password</legend>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="input w-full"
                            placeholder="Enter your password"
                            required
                        >
                    </fieldset>

                    <label class="label cursor-pointer justify-start gap-3">
                        <input
                            type="checkbox"
                            id="remember"
                            name="remember"
                            class="checkbox"
                        >
                        Remember Me
                    </label>

                    <button type="submit" class="btn btn-primary w-full">
                        Login
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
