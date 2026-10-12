@extends('layouts.app')

@section('content')
<div
    class="min-h-screen bg-cover bg-center"
    style="background-image: url('/images/farmers.jpg')"
>
    <div class="flex min-h-screen items-center justify-center bg-black/45 p-4">

        <div class="card w-full max-w-lg bg-base-100 shadow-xl">
            <div class="card-body">

                <h1 class="card-title justify-center text-center">
                    Service Request &amp; Referral Tracker
                </h1>

                <p class="text-center text-sm text-base-content/60">
                    Register to continue.
                </p>

                <form method="POST" action="/register" class="mt-2 flex flex-col gap-4">
                    @csrf

                    <div class="grid grid-cols-2 grid-flow-row gap-4">
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Name</legend>
                            <input
                                type="text"
                                id="name"
                                name="name"
                                class="input w-full"
                                placeholder="Enter your name"
                                required
                                autofocus
                            >
                        </fieldset>

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
                    </div>

                    <div class="grid grid-cols-2 grid-flow-row gap-4">
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

                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Confirm Password</legend>
                            <input
                                type="password"
                                id="confirmPassword"
                                name="confirmPassword"
                                class="input w-full"
                                placeholder="Enter your password again"
                                required
                            >
                        </fieldset>
                    </div>

                    <button type="submit" class="btn btn-primary w-full">
                        Register
                    </button>

                    <div class="flex items-center justify-between mb-2">
                        <a class="hover:underline text-indigo-400" href="/login">Already have an account?</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
