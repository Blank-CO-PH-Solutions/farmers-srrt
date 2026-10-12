@extends('layouts.app')

@section('content')

<div class="mx-auto flex min-h-screen w-full max-w-xl flex-col">
    <header class="p-2">
        <a href="{{ route('dashboard') }}" class="btn btn-neutral">
            Back to Dashboard
        </a>
    </header>

    <div class="flex flex-1 flex-col items-center justify-center">
        <div class="card w-full max-w-md bg-base-100 shadow-sm">
            <div class="card-body">
                <h1 class="card-title justify-center text-3xl">Submit a Request</h1>

                <form action="/requests" method="POST" class="mt-2 flex flex-col gap-4">
                    @csrf

                    @if ($errors->any())
                        <div class="alert alert-error">
                            <ul class="list-inside list-disc text-sm">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">Service</legend>
                        <select name="service_type_id" class="select w-full">
                            <option value="" disabled selected>Select a Service</option>
                            @foreach ($serviceTypes as $serviceType)
                                <option value="{{ $serviceType->id }}" @selected(old('service_type_id') == $serviceType->id)>{{ $serviceType->name }}</option>
                            @endforeach
                        </select>
                    </fieldset>

                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">Description</legend>
                        <textarea
                            name="description"
                            id="description"
                            rows="4"
                            placeholder="Description"
                            class="textarea w-full"
                        >{{ is_array(old('description')) ? '' : old('description') }}</textarea>
                    </fieldset>

                    <label class="label cursor-pointer justify-start gap-3">
                        <input name="is_calamity" id="isCalamity" type="checkbox" value="1" class="checkbox" @checked(old('is_calamity')) />
                        This request is calamity-related
                    </label>

                    <button type="submit" class="btn btn-primary w-full">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
