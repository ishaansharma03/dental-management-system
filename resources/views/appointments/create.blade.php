@extends('layouts.app')

@section('title', 'Schedule Appointment')

@section('content')
<h1 class="mb-4">Schedule New Appointment</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('appointments.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="patient_id" class="form-label">Select Patient</label>
        <select name="patient_id" class="form-control" required>
            <option value="">-- Choose a patient --</option>
            @foreach ($patients as $patient)
                <option value="{{ $patient->id }}">{{ $patient->name }} ({{ $patient->email }})</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="treatment_type" class="form-label">Treatment Type</label>
        <select name="treatment_type" class="form-control" required>
            <option value="">-- Select Treatment --</option>
            <option value="Regular Checkup">Regular Checkup</option>
            <option value="RCT">Root Canal Treatment (RCT)</option>
            <option value="Tooth Extraction">Tooth Extraction</option>
            <option value="Braces">Braces</option>
            <option value="Cleaning">Cleaning</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="appointment_date" class="form-label">Appointment Date</label>
        <input type="date" name="appointment_date" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="appointment_time" class="form-label">Appointment Time</label>
        <input type="time" name="appointment_time" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success">Schedule Appointment</button>
    <a href="{{ route('appointments.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
