@extends('layouts.app')

@section('content')

<div class="min-h-screen flex flex-col   w-full max-w-xl mx-auto">
    <header class="gap-5 my-2 p-2">
    <a href="{{ route('dashboard') }}"
        class="p-2 text-lg font-medium text-gray-100 bg-gray-500 rounded-lg cursor-pointer border-b-5 border-b-gray-600">
        Back to Dashboard
    </a>

</header>
    <div class="flex-1 flex flex-col justify-center items-center w-full max-w-md mx-auto">
        <h1 class="text-3xl font-bold text-center">Submit a Request</h1>

        <form action="/requests" method="POST" class="flex flex-col text-md gap-4 w-full p-5">
            @csrf

            @if ($errors->any())
                <div class="text-red-600 text-sm">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="relative w-full max-w-sm">
                <select name="service_type_id" class="w-full appearance-none rounded-xl border border-gray-300 bg-white px-4 py-3 pr-10 text-gray-700 shadow-sm transition-all focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/20">
                    <option value="" disabled selected>Select a Service</option>
                    @foreach ($serviceTypes as $serviceType)
                        <option value="{{ $serviceType->id }}">{{ $serviceType->name }}</option>
                    @endforeach
                </select>
                <!-- Custom Chevron Icon -->
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-500">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>
            </div>

            <div class="w-full max-w-sm">
                <textarea name="description" id="description" rows="4" placeholder="Description" class="w-full rounded-xl border border-gray-300 bg-white px-4 py-3 text-gray-700 shadow-sm transition-all placeholder:text-gray-400 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/20"></textarea>
            </div>

            <label class="group relative flex cursor-pointer items-center gap-3 select-none">
                <!-- Hidden Native Checkbox -->
                <input name="is_calamity" id="isCalamity" type="checkbox" class="peer sr-only" />

                <!-- Custom Checkbox Box -->
                <div class="flex h-5 w-5 items-center justify-center rounded-md border border-gray-300 bg-white shadow-sm transition-all peer-checked:border-blue-600 peer-checked:bg-blue-600 peer-focus-visible:ring-2 peer-focus-visible:ring-blue-500/20 group-hover:border-gray-400">
                    <!-- Checkmark Icon (Hidden by default, shown when checked) -->
                    <svg class="h-3.5 w-3.5 stroke-white opacity-0 transition-opacity peer-checked:opacity-100" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                </div>

                <!-- Label Text -->
                <span class="text-sm font-medium text-gray-700 group-hover:text-gray-900">
                    This request is calamity-related
                </span>
            </label>

            <div class="w-full max-w-sm">
                <button type="submit" class="w-full rounded-xl bg-blue-600 px-5 py-3 font-medium text-white shadow-sm transition-all hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500/20 active:scale-[0.98]">
                    Submit
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
