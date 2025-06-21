@extends('layouts.app')

@section('title', 'Edit Treatment')

@section('content')
<h1 class="mb-4">Edit Treatment</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('treatments.update', $treatment->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="name" class="form-label">Treatment Name</label>
        <input type="text" name="name" class="form-control" value="{{ $treatment->name }}" required>
    </div>

    <div class="mb-3">
        <label for="cost" class="form-label">Cost (₹)</label>
        <input type="number" step="0.01" name="cost" class="form-control" value="{{ $treatment->cost }}">
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description (optional)</label>
        <textarea name="description" class="form-control" rows="3">{{ $treatment->description }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Update Treatment</button>
    <a href="{{ route('treatments.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
