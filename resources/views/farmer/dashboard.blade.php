@extends('layouts.app')

@section('content')
<div class="p-2 flex flex-col justify-center items-center">
    <h1 class="text-xl font-medium">Welcome, {{ $username }}</h1>

    <h3 class="text-md font-medium">Role: {{ $user_role }}</h3>

    <div class="my-2">
        <button
            id="myRequests"
            type="button"
            class="cursor-pointer rounded border-2 border-b-5 border-blue-500 text-blue-500 text-lg font-medium p-2 hover:translate-y-1 hover:border-b-2 hover:bg-blue-500 hover:text-white transition-all"
        >
            My Requests
        </button>
        <button
            id="submitRequest"
            type="button"
            class="cursor-pointer rounded border-2 border-b-5 border-green-500 text-green-500 text-lg font-medium p-2 hover:translate-y-1 hover:border-b-2 hover:bg-green-500 hover:text-white transition-all"
        >
            Submit Request
        </button>
        <button
            id="Track Request"
            type="button"
            class="cursor-pointer rounded border-2 border-b-5 border-red-500 text-red-500 text-lg font-medium p-2 hover:translate-y-1 hover:border-b-2 hover:bg-red-500 hover:text-white transition-all"
        >
            Track Request
        </button>

    </div>
</div>
@endsection
