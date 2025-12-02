@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Add New Client</h2>
    <a href="{{ route('admin.clients.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Back
    </a>
</div>

<form action="{{ route('admin.clients.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <div class="card mb-3">
        <div class="card-body">
            <div class="mb-3">
                <label for="name" class="form-label">Client Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                       id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="initials" class="form-label">Initials (for text-based logo)</label>
                <input type="text" class="form-control @error('initials') is-invalid @enderror" 
                       id="initials" name="initials" value="{{ old('initials') }}" 
                       placeholder="e.g., CM, EDU" maxlength="10">
                <small class="form-text text-muted">Leave empty if uploading a logo image</small>
                @error('initials')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="logo" class="form-label">Logo Image</label>
                <input type="file" class="form-control @error('logo') is-invalid @enderror" 
                       id="logo" name="logo" accept="image/*">
                <small class="form-text text-muted">Upload a logo image (PNG, JPG, GIF, SVG). If not provided, initials will be used.</small>
                @error('logo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="order" class="form-label">Display Order</label>
                <input type="number" class="form-control @error('order') is-invalid @enderror" 
                       id="order" name="order" value="{{ old('order', 0) }}" min="0">
                <small class="form-text text-muted">Lower numbers appear first</small>
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
            <i class="bi bi-check-circle"></i> Add Client
        </button>
        <a href="{{ route('admin.clients.index') }}" class="btn btn-secondary">
            Cancel
        </a>
    </div>
</form>
@endsection
