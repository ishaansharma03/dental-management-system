@extends('layouts.app')

@section('title', 'Add New Patient')

@section('content')
<h1 class="mb-4">Add New Patient</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('patients.store') }}" method="POST" enctype="multipart/form-data"> {{-- ✅ added enctype --}}
    @csrf

    <div class="mb-3">
        <label for="name" class="form-label">Patient Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email Address</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="phone" class="form-label">Phone Number</label>
        <input type="text" name="phone" class="form-control" required>
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

    <hr class="my-4">

    <h5 class="mb-3">Insurance Information (Optional)</h5>

    <div class="mb-3">
        <label for="insurance_provider" class="form-label">Insurance Provider</label>
        <input type="text" name="insurance_provider" class="form-control">
    </div>

    <div class="mb-3">
        <label for="policy_number" class="form-label">Policy Number</label>
        <input type="text" name="policy_number" class="form-control">
    </div>

    <div class="mb-3">
        <label for="coverage_details" class="form-label">Coverage Details</label>
        <textarea name="coverage_details" class="form-control" rows="3" placeholder="Describe coverage or limits..."></textarea>
    </div>

    {{-- ✅ X-ray file upload --}}
    <div class="mb-3">
        <label for="xray_file" class="form-label">Upload X-ray (optional)</label>
        <input type="file" name="xray_file" class="form-control" accept=".jpg,.jpeg,.png,.pdf">
        <small class="text-muted">Accepted formats: JPG, PNG, PDF (Max: 2MB)</small>
    </div>

    <button type="submit" class="btn btn-success">Add Patient</button>
</form>
@endsection


