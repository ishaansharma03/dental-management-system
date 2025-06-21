@extends('layouts.app')

@section('title', 'Patients List')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="fw-bold mb-0">Patients</h1>
    <a href="{{ route('patients.create') }}" class="btn btn-primary px-4">+ Add New Patient</a>
</div>

{{-- Success Message --}}
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <table class="table table-hover table-bordered align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Treatment</th>
                    <th>X-ray</th> {{-- ✅ New column --}}
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($patients as $patient)
                    <tr>
                        <td>{{ $patient->id }}</td>
                        <td>{{ $patient->name }}</td>
                        <td>{{ $patient->email }}</td>
                        <td>{{ $patient->phone }}</td>
                        <td>{{ $patient->treatment_type }}</td>
                        <td>
                            @if ($patient->xray_file)
                                <a href="{{ asset('storage/xrays/' . $patient->xray_file) }}" target="_blank">📎 View</a>
                            @else
                                <span class="text-muted">—</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-sm btn-warning me-1">Edit</a>
                            <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this patient?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">No patients found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{-- Pagination --}}
        @if (method_exists($patients, 'links'))
            <div class="mt-4 px-3">
                {{ $patients->links() }}
            </div>
        @endif
    </div>
</div>
@endsection



