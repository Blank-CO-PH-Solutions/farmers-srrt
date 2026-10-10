@extends('layouts.app')

@section('content')

<form action="" method="POST">
    <select id="serviceType" name="serviceType">
        <option value="" selected>Select a Service</option>
        @foreach ($serviceTypes as $serviceType)
            <option value="{{ $serviceType->id }}">{{ $serviceType->name }}</option>
        @endforeach
    </select>

    <textarea name="description" id="description" placeholder="Description"></textarea>

    <label for="isCalamity">
        <input type="checkbox" name="isCalamity" id="isCalamity">
    </label>
</form>

@endsection
