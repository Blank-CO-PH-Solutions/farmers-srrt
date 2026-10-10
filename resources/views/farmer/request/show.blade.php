@extends('layouts.app')

@section('content')
    <div class="flex flex-col justify-center w-full max-w-xl min-h-screen p-5 mx-auto">
        <header class="mb-3">
            <a href="{{ route('dashboard') }}"
                class="p-2 text-lg font-medium text-gray-100 bg-gray-500 rounded-lg cursor-pointer border-b-5 border-b-gray-600">
                Back to Dashboard
            </a>


        </header>

        <section class="flex flex-col justify-center gap-5 my-2">
            <div class="flex items-center justify-between">
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

            <h2 class="text-2xl font-medium text-left wrap-break-word">{{ $request->description }}</h2>
        </section>

        <section class="grid grid-flow-row grid-cols-2 gap-4 my-5">
            <div
                class="flex flex-col justify-center h-40 gap-4 p-4 border-2 cols-span-1 rounded-xl border-b-5 border-b-black">
                <h2 class="text-2xl font-bold uppercase">Service</h2>
                <h2 class="text-xl font-medium">{{ $request->serviceType->name }}</h2>
            </div>
            <div class="flex flex-col justify-center col-span-1 gap-4 p-4 border-2 rounded-xl border-b-5 border-b-black">
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
                $progressStatuses = [
                    'submitted' => 'Submitted',
                    'validated' => 'Validated',
                    'routed' => 'Routed',
                    'under_review' => 'Under Review',
                    'resolved' => 'Resolved',
                    'closed' => 'Closed',
                ];

                $currentStatus = $request->status;

                // "referred" is a referral event, not a main progress stage.
                // Visually, the request has reached the Under Review stage.
                $currentProgressStatus = match ($currentStatus) {
                    'referred' => 'under_review',
                    default => $currentStatus,
                };

                $currentIndex = array_search(
                    $currentProgressStatus,
                    array_keys($progressStatuses)
                )
            @endphp

            <div class="my-8">
                <h2 class="mb-5 text-2xl font-bold">
                    Request Progress
                </h2>

                <div class="pb-4 overflow-x-auto">
                    <div class="min-w-175">
                        <div class="flex items-center gap-4">
                            @foreach ($progressStatuses as $statusKey => $statusLabel)
                                @php
                                    $statusIndex = array_search(
                                        $statusKey,
                                        array_keys($progressStatuses)
                                    );

                                    $isCompleted = $statusIndex < $currentIndex;
                                    $isCurrent = $statusIndex === $currentIndex;
                                @endphp

                                {{-- Status circle --}}
                                <div class="flex flex-col items-center">

                                    <div
                                        class="w-8 h-8 rounded-full border-2 flex items-center justify-center
                                        @if ($isCompleted)
                                            bg-green-500 border-green-600 text-white
                                        @elseif ($isCurrent)
                                            bg-blue-500 border-blue-600 text-white
                                        @else
                                            bg-white border-gray-300 text-gray-400
                                        @endif"
                                    >
                                        @if ($isCompleted)
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        @elseif ($isCurrent)
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 animate-pulse" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                            </svg>
                                        @endif
                                    </div>

                                    <span
                                        class="mt-2 text-sm font-medium text-center
                                        @if ($isCompleted || $isCurrent)
                                            text-black
                                        @else
                                            text-gray-400
                                        @endif"
                                    >
                                        {{ $statusLabel }}
                                    </span>
                                </div>

                                {{-- Connector line --}}
                                @if (!$loop->last)
                                    <div
                                        class="flex-1 h-1 mx-2
                                        @if ($statusIndex < $currentIndex)
                                            bg-green-500
                                        @else
                                            bg-gray-200
                                        @endif"
                                    ></div>
                                @endif
                            @endforeach

                        </div>
                    </div>
                </div>

                @if ($currentStatus === 'referred')
                    <div class="p-3 mt-4 border-2 border-black rounded-lg">
                        <span class="font-bold">Referred</span>
                        <span class="text-sm">
                            -- This request has been referred to another office for further processing. Please check your notifications for more details. --
                        </span>
                    </div>
                @endif
            </div>
        </section>
    </div>
@endsection()
