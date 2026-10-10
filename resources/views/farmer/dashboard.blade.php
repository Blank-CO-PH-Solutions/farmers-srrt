@extends('layouts.app')

@section('content')
<div id='farmerDashboard' class="flex flex-col items-center justify-center p-2">
    <div class="flex items-center justify-between w-full">
        <div>
            <h1 class="text-xl font-medium">Welcome, {{ $username }}</h1>

            <h3 class="font-medium text-md">Role: {{ $user_role }}</h3>
        </div>

        <form method="POST" action="/logout">
            @csrf
            <button
                id="logoutBtn"
                type="submit"
                class="p-2 text-lg font-medium text-white transition-all bg-red-500 border-2 rounded-lg cursor-pointer border-b-5 border-b-red-700 hover:bg-red-700"
                on
            >
                Logout
            </button>
        </form>

    </div>

    <section id="data" class="grid w-full h-full max-w-lg grid-cols-3 grid-rows-1 gap-4 my-10 max-h-md">
        <div id="overallRequests" class="p-4 text-center text-white bg-blue-500 border-blue-700 rounded-lg shadow-md border-b-5">
            <h1 class="text-5xl font-bold">3</h1>
            <h3 class="text-2xl font-medium">Requests</h3>
        </div>

        <div id="pendingRequests" class="p-4 text-center text-white rounded-lg shadow-md border-b-5 border-amber-700 bg-amber-500">
            <h1 class="text-5xl font-bold">1</h1>
            <h3 class="text-2xl font-medium">Pending</h3>
        </div>

        <div id="resolvedRequests" class="p-4 text-center text-white bg-green-500 border-green-700 rounded-lg shadow-md border-b-5">
            <h1 class="text-5xl font-bold">2</h1>
            <h3 class="text-2xl font-medium">Resolved</h3>
        </div>
    </section>

    <section id="myRequests" class="flex flex-col justify-center w-full max-w-lg">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-bold">My Requests</h1>
            <a href="/requests/create" class="w-auto p-2 my-2 text-lg text-white bg-green-500 border-2 rounded-lg cursor-pointer hover:bg-green-700 border-b-5 border-b-green-700 ">Submit Request</a>
        </div>

        <div class="grid w-full max-w-lg grid-flow-row grid-cols-1 gap-4 my-2 md:grid-cols-3">
            @foreach($requests as $request)
                <div id="request" class="w-full p-4 border-2 border-black rounded-lg  border-b-5">
                    <h2 id="referenceNumber" class="text-2xl">{{ $request->reference_number }}</h2>
                    <h3 class="text-xl">{{ $request->serviceType->name }}</h3>
                    <h4 class="text-md">Status: {{ $request->status }}</h4>
                    <h5 class="text-md">Current Office: {{ $request->currentOffice->name }}</h5>

                    <a href="/requests/{{ $request->id }}" class="float-right p-2 my-2 text-lg text-center text-black bg-white border-2 rounded-lg cursor-pointer hover:bg-black hover:text-white border-b-5 border-b-black w-30">View</a>
                </div>
            @endforeach
        </div>

    </section>
</div>
@endsection
