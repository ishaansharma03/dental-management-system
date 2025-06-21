@extends('layouts.app')

@section('title', 'All Appointments')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="fw-bold mb-0">Appointments</h1>
    <a href="{{ route('appointments.create') }}" class="btn btn-primary px-4">+ Schedule Appointment</a>
</div>

{{-- Success Message --}}
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

{{-- Error Message --}}
@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <table class="table table-hover table-bordered align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Patient</th>
                    <th>Treatment</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($appointments as $appointment)
                    <tr>
                        <td>{{ $appointment->id }}</td>
                        <td>{{ $appointment->patient->name }}</td>
                        <td>{{ $appointment->treatment_type }}</td>
                        <td>{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d M Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($appointment->appointment_time)->format('h:i A') }}</td>
                        <td>
                            <span class="badge 
                                {{ $appointment->status === 'Completed' ? 'bg-success' : ($appointment->status === 'Cancelled' ? 'bg-danger' : 'bg-warning') }}">
                                {{ $appointment->status }}
                            </span>
                        </td>
                        <td class="text-center">
                            @if($appointment->status === 'Scheduled')
                                <form action="{{ route('appointments.updateStatus', [$appointment->id, 'Completed']) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-sm btn-success mb-1">Mark Complete</button>
                                </form>
                                <form action="{{ route('appointments.updateStatus', [$appointment->id, 'Cancelled']) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-sm btn-danger mb-1">Cancel</button>
                                </form>
                            @endif
                            <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-dark" onclick="return confirm('Delete this appointment?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">No appointments scheduled yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{-- Pagination --}}
        @if (method_exists($appointments, 'links'))
            <div class="mt-4 px-3">
                {{ $appointments->links() }}
            </div>
        @endif
    </div>
</div>
@endsection


