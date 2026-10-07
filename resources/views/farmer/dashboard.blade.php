@extends('layouts.app')

@section('content')
<div id='farmerDashboard' class="p-2 flex flex-col justify-center items-center">
    <div class="flex justify-between items-center w-full">
        <div>
            <h1 class="text-xl font-medium">Welcome, {{ $username }}</h1>

            <h3 class="text-md font-medium">Role: {{ $user_role }}</h3>
        </div>

        <form method="POST" action="/logout">
            @csrf
            <button
                id="logoutBtn"
                type="submit"
                class="cursor-pointer rounded-lg border-2 bg-red-500 border-b-5 border-b-red-700 text-white hover:bg-red-700 text-lg font-medium p-2 transition-all"
                on
            >
                Logout
            </button>
        </form>

    </div>

    <section id="data" class="grid grid-cols-3 grid-rows-1 gap-4 w-full max-w-lg my-10 h-full max-h-md">
        <div id="overallRequests" class="rounded-lg shadow-md text-center p-4  border-b-5 border-blue-700 bg-blue-500 text-white">
            <h1 class="font-bold text-5xl">3</h1>
            <h3 class="font-medium text-2xl">Requests</h3>
        </div>

        <div id="pendingRequests" class="rounded-lg shadow-md text-center p-4 border-b-5 border-amber-700 bg-amber-500 text-white">
            <h1 class="font-bold text-5xl">1</h1>
            <h3 class="font-medium text-2xl">Pending</h3>
        </div>

        <div id="resolvedRequests" class="rounded-lg shadow-md text-center p-4 border-b-5 border-green-700 bg-green-500 text-white">
            <h1 class="font-bold text-5xl">2</h1>
            <h3 class="font-medium text-2xl">Resolved</h3>
        </div>
    </section>

    <section id="myRequests" class="flex flex-col justify-center w-full max-w-lg">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold">My Requests</h1>
            <button class="border-2 cursor-pointer bg-green-500 text-white hover:bg-green-700 text-lg p-2 w-auto border-b-5 border-b-green-700 my-2 rounded-lg ">Submit Request</button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 grid-flow-row gap-4 w-full max-w-lg my-2">
            <div id="request" class=" p-4 rounded-lg border-2 w-full border-b-5 border-black">
                <h2 id="requestID" class="text-2xl">REQ-2026-0001</h2>
                <h3 class="text-xl">Crop Damage Assistance</h3>
                <h4 class="text-md">Status: Referred</h4>
                <h5 class="text-md">Current Office: Provincial Agriculture</h5>

                <button class="border-2 cursor-pointer bg-white text-black hover:bg-black hover:text-white border-b-5 border-b-black text-lg p-2 w-30 my-2 rounded-lg float-right">View</button>
            </div>
        </div>

    </section>
</div>
@endsection
