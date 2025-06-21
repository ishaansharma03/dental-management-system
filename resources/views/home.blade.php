@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="text-center mb-5">
    <h1 class="display-5 fw-bold">
        Welcome to <span class="text-primary">Dental Practice</span> Dashboard
    </h1>
    <p class="lead text-muted">
        Effortlessly manage patients, appointments & treatments — all in one place.
    </p>
</div>

<div class="row g-4 justify-content-center">
    @php
        $cards = [
            ['icon' => '🧑', 'label' => 'Total Patients', 'value' => $totalPatients, 'color' => 'primary'],
            ['icon' => '📅', 'label' => 'Appointments Scheduled', 'value' => $totalAppointments, 'color' => 'info'],
            ['icon' => '✅', 'label' => 'Completed', 'value' => $completedAppointments, 'color' => 'success'],
            ['icon' => '❌', 'label' => 'Cancelled', 'value' => $cancelledAppointments, 'color' => 'danger'],
            ['icon' => '⏳', 'label' => 'Upcoming', 'value' => $upcomingAppointments, 'color' => 'warning'],
        ];
    @endphp

    @foreach ($cards as $card)
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-body text-center py-4">
                    <div class="mb-2 fs-3">{{ $card['icon'] }}</div>
                    <h6 class="fw-semibold">{{ $card['label'] }}</h6>
                    <div class="fs-2 fw-bold text-{{ $card['color'] }}">{{ $card['value'] }}</div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="text-center mt-5">
    <a href="{{ route('patients.create') }}" class="btn btn-primary btn-lg me-3 px-4 shadow-sm">
        + Add Patient
    </a>
    <a href="{{ route('appointments.create') }}" class="btn btn-success btn-lg px-4 shadow-sm">
        + Schedule Appointment
    </a>
</div>
@endsection
