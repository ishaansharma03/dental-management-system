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

{{-- 🧠 Floating AI Chatbot Button --}}
<button id="chatbotToggle" class="btn btn-dark rounded-circle shadow" style="position: fixed; bottom: 20px; right: 20px; z-index: 1050;">
    💬
</button>

{{-- 🧠 Floating AI Chat Window --}}
<div id="chatbotWidget" class="card shadow-lg" style="display: none; position: fixed; bottom: 80px; right: 20px; width: 320px; z-index: 1050;">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <span>Dental AI Assistant</span>
        <button type="button" id="chatbotClose" class="btn btn-sm btn-light">×</button>
    </div>
    <div class="card-body">
        @if (session('bot_reply'))
            <div class="alert alert-info p-2"><strong>AI:</strong> {{ session('bot_reply') }}</div>
        @endif

        <form method="POST" action="{{ route('chatbot.send') }}">
            @csrf
            <div class="mb-2">
                <textarea name="message" class="form-control" placeholder="Ask something..." required>{{ old('message') }}</textarea>
            </div>
            <button type="submit" class="btn btn-sm btn-success w-100">Send</button>
        </form>
    </div>
</div>

{{-- 🔄 Toggle Script --}}
<script>
    const toggle = document.getElementById('chatbotToggle');
    const widget = document.getElementById('chatbotWidget');
    const close = document.getElementById('chatbotClose');

    toggle.addEventListener('click', () => {
        widget.style.display = widget.style.display === 'none' ? 'block' : 'none';
    });

    close.addEventListener('click', () => {
        widget.style.display = 'none';
    });
</script>
@endsection

