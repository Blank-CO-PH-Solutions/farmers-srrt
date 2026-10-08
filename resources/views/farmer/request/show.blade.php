@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex flex-col justify-center w-full max-w-xl mx-auto p-5">
        <header class="mb-3">
            <a href="{{ url()->previous() }}"
                class="p-2 bg-gray-500 rounded-lg text-gray-100 font-medium text-lg cursor-pointer">
                Back to My Requests
            </a>


        </header>

        <section class="flex flex-col justify-center gap-5 my-2">
            <div class="flex justify-between items-center">
                <span class="text-lg font-medium">{{ $request->reference_number }}</span>
                <?php
                $statusClass = 'bg-black text-white';

                switch ($request->status) {
                    case 'submitted':
                        $statusClass = 'bg-green-500 text-white border-b-5 border-b-green-700';
                        break;
                    default:
                        break;
                }
                ?>
                <span class="p-2 rounded-xl text-md uppercase {{ $statusClass }} font-medium">{{ $request->status }}</span>
            </div>

            <h2 class="font-medium text-2xl text-left">{{ $request->description }}</h2>
        </section>

        <section class="grid grid-cols-2 grid-flow-row gap-4 my-5">
            <div
                class="p-4 flex flex-col justify-center border-2 h-40 cols-span-1 rounded-xl border-b-5 border-b-black gap-4">
                <h2 class="text-2xl font-bold uppercase">Service</h2>
                <h2 class="text-xl font-medium">{{ $request->serviceType->name }}</h2>
            </div>
            <div class="p-4 flex flex-col justify-center border-2 col-span-1 rounded-xl border-b-5 border-b-black gap-4">
                <h2 class="text-2xl font-bold uppercase">Current Office</h2>
                <h2 class="text-xl font-medium">{{ $request->currentOffice->name }}</h2>
            </div>
        </section>

        <section class="my-2">
            <h1 class="text-2xl font-bold">Request Information</h1>
            <hr class="my-2" />

            <p class="text-lg font-medium">Submitted: {{ $request->submitted_at->format('M j, Y') }}</p>
            <p class="text-lg font-medium">Priority: {{ ucfirst($request->priority) }}</p>
            <p class="text-lg font-medium">Calamity-related: {{ $request->is_calamity == 1 ? 'Yes' : 'No' }}</p>

            @php
                // 1. Define all possible statuses in chronological order
                $allStatuses = ['submitted', 'pending', 'in progress', 'approved', 'completed'];

                // 2. Index existing histories by status string (lowercase for case-insensitive matching)
                // Make sure to eager load relations in your controller: $request->load('statusHistories.office', 'statusHistories.changedBy');
                $completedHistory = $request->statusHistories->keyBy(fn($item) => strtolower($item->status));
            @endphp

            <div class="my-6 max-w-xl">
                <!-- Timeline Container -->
                <div class="relative pl-7 border-l-2 border-slate-200 space-y-8">

                    @foreach ($allStatuses as $statusKey)
                        @php
                            $history = $completedHistory->get(strtolower($statusKey));
                            $isCompleted = !is_null($history);
                        @endphp

                        <div class="relative group">

                            @if ($isCompleted)
                                <!-- COMPLETED / REACHED STATUS -->

                                <!-- Solid Black Outer Ring with Black Core Dot -->
                                <div
                                    class="absolute -left-[39px] top-0.5 h-5 w-5 rounded-full border-2 border-slate-900 bg-white ring-4 ring-white flex items-center justify-center">
                                    <div class="h-2.5 w-2.5 rounded-full bg-slate-900"></div>
                                </div>

                                <div class="flex flex-col gap-1">
                                    <!-- Status Title & Timestamp -->
                                    <div class="flex flex-wrap items-baseline justify-between gap-x-4 gap-y-1">
                                        <h4 class="text-base font-bold text-slate-900 leading-snug">
                                            {{ ucfirst($statusKey) }}
                                        </h4>
                                        <time class="text-xs font-medium text-slate-500 whitespace-nowrap">
                                            {{ $history->created_at->format('M j, Y • g:i A') }}
                                        </time>
                                    </div>

                                    <!-- Office & Changed By Meta Tags -->
                                    @if ($history->office || $history->changedBy)
                                        <div class="flex flex-wrap items-center gap-2 text-xs text-slate-500">
                                            @if ($history->office)
                                                <span class="inline-flex items-center font-medium text-slate-700">
                                                    {{ $history->office->name }}
                                                </span>
                                            @endif

                                            @if ($history->office && $history->changedBy)
                                                <span>•</span>
                                            @endif

                                            @if ($history->changedBy)
                                                <span>By {{ $history->changedBy->name }}</span>
                                            @endif
                                        </div>
                                    @endif

                                    <!-- Remarks -->
                                    @if (!empty($history->remarks))
                                        <p class="text-sm text-slate-600 leading-relaxed break-words mt-0.5">
                                            {{ $history->remarks }}
                                        </p>
                                    @endif
                                </div>
                            @else
                                <!-- PENDING / UNREACHED STATUS -->

                                <!-- Hollow Circle Dot -->
                                <div
                                    class="absolute -left-[39px] top-0.5 h-5 w-5 rounded-full border-2 border-slate-300 bg-white ring-4 ring-white">
                                </div>

                                <!-- Title Only (No timestamp, remarks, or metadata) -->
                                <div class="flex flex-col">
                                    <h4 class="text-base font-semibold text-slate-400 leading-snug">
                                        {{ ucfirst($statusKey) }}
                                    </h4>
                                </div>
                            @endif

                        </div>
                    @endforeach

                </div>
            </div>
        </section>
    </div>
@endsection()
