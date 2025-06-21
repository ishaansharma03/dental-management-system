@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Patient Details</h1>

        <ul>
            <li><strong>Name:</strong> {{ $patient->name }}</li>
            <li><strong>Email:</strong> {{ $patient->email }}</li>
            <li><strong>Phone:</strong> {{ $patient->phone }}</li>
        </ul>

        <a href="{{ route('patients.index') }}" class="btn btn-secondary">Back to Patients</a>
    </div>
@endsection
