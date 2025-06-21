@extends('layouts.app')

@section('title', 'Edit Patient')

@section('content')
<h1 class="mb-4">Edit Patient</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('patients.update', $patient->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="name" class="form-label">Full Name</label>
        <input type="text" name="name" class="form-control" value="{{ $patient->name }}" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" name="email" class="form-control" value="{{ $patient->email }}" required>
    </div>

    <div class="mb-3">
        <label for="phone" class="form-label">Phone Number</label>
        <input type="text" name="phone" class="form-control" value="{{ $patient->phone }}" required>
    </div>

    <div class="mb-3">
        <label for="treatment_type" class="form-label">Treatment Type</label>
        <select name="treatment_type" class="form-control" required>
            <option value="">-- Select Treatment --</option>
            <option value="Regular Checkup" {{ $patient->treatment_type == 'Regular Checkup' ? 'selected' : '' }}>Regular Checkup</option>
            <option value="RCT" {{ $patient->treatment_type == 'RCT' ? 'selected' : '' }}>Root Canal Treatment (RCT)</option>
            <option value="Tooth Extraction" {{ $patient->treatment_type == 'Tooth Extraction' ? 'selected' : '' }}>Tooth Extraction</option>
            <option value="Braces" {{ $patient->treatment_type == 'Braces' ? 'selected' : '' }}>Braces</option>
            <option value="Cleaning" {{ $patient->treatment_type == 'Cleaning' ? 'selected' : '' }}>Cleaning</option>
        </select>
    </div>

    <hr class="my-4">

    <h5 class="mb-3">Insurance Information (Optional)</h5>

    <div class="mb-3">
        <label for="insurance_provider" class="form-label">Insurance Provider</label>
        <input type="text" name="insurance_provider" class="form-control" value="{{ $patient->insurance_provider }}">
    </div>

    <div class="mb-3">
        <label for="policy_number" class="form-label">Policy Number</label>
        <input type="text" name="policy_number" class="form-control" value="{{ $patient->policy_number }}">
    </div>

    <div class="mb-3">
        <label for="coverage_details" class="form-label">Coverage Details</label>
        <textarea name="coverage_details" class="form-control" rows="3">{{ $patient->coverage_details }}</textarea>
    </div>

    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{ route('patients.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection


