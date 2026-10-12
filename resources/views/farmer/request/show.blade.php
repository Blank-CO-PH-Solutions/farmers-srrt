@extends('layouts.app')

@section('content')
    <div class="mx-auto flex w-full max-w-xl flex-col p-5">
        <header class="mb-3">
            <a href="{{ route('dashboard') }}" class="btn btn-neutral">
                Back to Dashboard
            </a>
        </header>

        <section class="flex flex-col gap-5">
            <div class="flex items-center justify-between">
                <span class="text-lg font-medium">{{ $request->reference_number }}</span>

                @php
                    $statusClass = match ($request->status) {
                        'submitted' => 'badge-info',
                        'validated', 'routed' => 'badge-primary',
                        'under_review', 'referred' => 'badge-warning',
                        'resolved', 'closed' => 'badge-success',
                        default => 'badge-neutral',
                    };
                @endphp

                <span class="badge badge-lg {{ $statusClass }} uppercase font-medium">{{ $request->status }}</span>
            </div>

            <h2 class="text-2xl font-medium text-left wrap-break-word">{{ $request->description }}</h2>
        </section>

        <section class="my-5 grid grid-cols-2 gap-4">
            <div class="card bg-base-100 shadow-sm">
                <div class="card-body gap-2">
                    <h2 class="text-2xl font-bold uppercase text-base-content/60">Service</h2>
                    <h2 class="text-xl font-medium">{{ $request->serviceType->name }}</h2>
                </div>
            </div>
            <div class="card bg-base-100 shadow-sm">
                <div class="card-body gap-2">
                    <h2 class="text-2xl font-bold uppercase text-base-content/60">Current Office</h2>
                    <h2 class="text-xl font-medium">{{ $request->currentOffice->name }}</h2>
                </div>
            </div>
        </section>

        <section class="my-2">
            <h1 class="text-2xl font-bold">Request Information</h1>
            <div class="divider my-2"></div>

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

                <div class="overflow-x-auto pb-4">
                    <ul class="steps steps-horizontal w-full min-w-100">
                        @foreach ($progressStatuses as $statusKey => $statusLabel)
                            @php
                                $statusIndex = array_search(
                                    $statusKey,
                                    array_keys($progressStatuses)
                                );

                                $isCompleted = $statusIndex < $currentIndex;
                                $isCurrent = $statusIndex === $currentIndex;
                            @endphp

                            <li class="step @if ($isCompleted) step-success @elseif ($isCurrent) step-primary @endif">
                                {{ $statusLabel }}
                            </li>
                        @endforeach
                    </ul>
                </div>

                @if ($currentStatus === 'referred')
                    <div class="alert alert-warning mt-4">
                        <span>
                            <span class="font-bold">Referred</span>
                            -- This request has been referred to another office for further processing. Please check your notifications for more details. --
                        </span>
                    </div>
                @endif
            </div>
        </section>

        <section class="my-8">
            <h3 class="mb-5 text-xl font-bold">
                Request Activity
            </h3>

            @if ($request->statusHistories->isEmpty())
                <div class="rounded-box border-2 border-dashed border-base-300 p-6 text-center">
                    <p class="text-sm text-base-content/60">
                        No activity has been recorded for this request yet.
                    </p>
                </div>
            @else
                <ul class="timeline timeline-vertical timeline-compact">
                    @foreach ($request->statusHistories as $history)
                        <li>
                            <div class="timeline-start">
                                <time
                                    class="text-sm text-base-content/60"
                                    datetime="{{ $history->created_at?->toIso8601String() }}"
                                >
                                    {{ $history->created_at?->format('M j, Y') }}
                                </time>
                            </div>

                            <div class="timeline-middle">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5 text-primary">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                                </svg>
                            </div>

                            <div class="timeline-end timeline-box">
                                <div class="mb-3 flex flex-wrap items-center justify-between gap-2">
                                    <h4 class="text-base font-bold uppercase">
                                        {{ str_replace('_', ' ', $history->status) }}
                                    </h4>
                                </div>

                                <p class="mb-2 text-sm">
                                    <span class="font-semibold">Office:</span>
                                    {{ $history->office?->name ?? 'Not specified' }}
                                </p>

                                @if ($history->remarks)
                                    <p class="text-sm leading-relaxed">
                                        <span class="font-semibold">
                                            Remarks:
                                        </span>
                                        {{ $history->remarks }}
                                    </p>
                                @endif

                                @if ($history->changedBy)
                                    <p class="mt-3 border-t border-base-300 pt-3 text-xs text-base-content/60">
                                        Updated by {{ $history->changedBy->name }}
                                    </p>
                                @endif
                            </div>

                            @unless ($loop->last)
                                <hr />
                            @endunless
                        </li>
                    @endforeach
                </ul>
            @endif
        </section>

    </div>
@endsection
