@extends('layouts.app')

@section('title', 'Treatments')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="fw-bold mb-0">Available Treatments</h1>
    <a href="{{ route('treatments.create') }}" class="btn btn-primary px-4">+ Add New Treatment</a>
</div>

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show">
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
                    <th>Treatment Name</th>
                    <th>Cost</th>
                    <th>Description</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($treatments as $treatment)
                    <tr>
                        <td>{{ $treatment->id }}</td>
                        <td>{{ $treatment->name }}</td>
                        <td>₹ {{ number_format($treatment->cost, 2) }}</td>
                        <td>{{ $treatment->description ?? '—' }}</td>
                        <td class="text-center">
                            <a href="{{ route('treatments.edit', $treatment->id) }}" class="btn btn-sm btn-warning me-1">Edit</a>
                            <form action="{{ route('treatments.destroy', $treatment->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this treatment?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">No treatments found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

