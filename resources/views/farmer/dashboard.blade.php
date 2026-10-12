@extends('layouts.app')

@section('content')
<div class="mx-auto flex w-full max-w-xl flex-col p-5 md:max-w-4xl">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-xl font-medium">Welcome, {{ $username }}</h1>

            <h3 class="text-md font-medium">Role: {{ $user_role }}</h3>
        </div>

        <form method="POST" action="/logout">
            @csrf
            <button id="logoutBtn" type="submit" class="btn btn-error">
                Logout
            </button>
        </form>
    </div>

    <section id="data" class="my-10 grid w-full grid-cols-1 gap-4 sm:grid-cols-3">
        <div class="card bg-primary text-primary-content shadow-sm">
            <div class="card-body items-center text-center">
                <h1 class="text-5xl font-bold">{{ $stats['total'] }}</h1>
                <h3 class="text-2xl font-medium">Requests</h3>
            </div>
        </div>

        <div class="card bg-warning text-warning-content shadow-sm">
            <div class="card-body items-center text-center">
                <h1 class="text-5xl font-bold">{{ $stats['pending'] }}</h1>
                <h3 class="text-2xl font-medium">Pending</h3>
            </div>
        </div>

        <div class="card bg-success text-success-content shadow-sm">
            <div class="card-body items-center text-center">
                <h1 class="text-5xl font-bold">{{ $stats['resolved'] }}</h1>
                <h3 class="text-2xl font-medium">Resolved</h3>
            </div>
        </div>
    </section>

    <section id="myRequests" class="flex w-full flex-col">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-bold">My Requests</h1>
            <a href="/requests/create" class="btn btn-primary">Submit Request</a>
        </div>

        <div class="my-2 grid w-full grid-cols-1 gap-4 md:grid-cols-2">
            @foreach($requests as $request)
                <div class="card bg-base-100 shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title">{{ $request->reference_number }}</h2>
                        <h3 class="text-lg">{{ $request->serviceType->name }}</h3>
                        <p>
                            Status:
                            <span class="badge text-white {{ match ($request->status) {
                                'submitted' => 'badge-info',
                                'validated', 'routed' => 'badge-primary',
                                'under_review', 'referred' => 'badge-warning',
                                'resolved', 'closed' => 'badge-success',
                                default => 'badge-neutral',
                            } }}">{{ $request->status }}</span>
                        </p>
                        <p>Current Office: {{ $request->currentOffice->name }}</p>

                        <div class="card-actions justify-end">
                            <a href="/requests/{{ $request->id }}" class="btn btn-sm">View</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</div>
@endsection
