@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Add New Category</h2>
    <a href="{{ route('admin.portfolio.categories.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Back
    </a>
</div>

<form action="{{ route('admin.portfolio.categories.store') }}" method="POST">
    @csrf
    
    <div class="card mb-3">
        <div class="card-body">
            <div class="mb-3">
                <label for="name" class="form-label">Category Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                       id="name" name="name" value="{{ old('name') }}" required 
                       placeholder="e.g., App, Card, Web, Design">
                <small class="form-text text-muted">The slug will be auto-generated (e.g., "App" becomes "filter-app")</small>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="order" class="form-label">Display Order</label>
                <input type="number" class="form-control @error('order') is-invalid @enderror" 
                       id="order" name="order" value="{{ old('order', 0) }}" min="0">
                <small class="form-text text-muted">Lower numbers appear first in filter buttons</small>
                @error('order')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="is_active" name="is_active" 
                       value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_active">
                    Active (Show on website)
                </label>
            </div>
        </div>
    </div>

    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-check-circle"></i> Create Category
        </button>
        <a href="{{ route('admin.portfolio.categories.index') }}" class="btn btn-secondary">
            Cancel
        </a>
    </div>
</form>
@endsection
