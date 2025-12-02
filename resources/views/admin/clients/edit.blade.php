@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Edit Client</h2>
    <a href="{{ route('admin.clients.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Back
    </a>
</div>

<form action="{{ route('admin.clients.update', $client->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <div class="card mb-3">
        <div class="card-body">
            <div class="mb-3">
                <label for="name" class="form-label">Client Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                       id="name" name="name" value="{{ old('name', $client->name) }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="initials" class="form-label">Initials (for text-based logo)</label>
                <input type="text" class="form-control @error('initials') is-invalid @enderror" 
                       id="initials" name="initials" value="{{ old('initials', $client->initials) }}" 
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
                <small class="form-text text-muted">Leave empty to keep current logo</small>
                @if($client->logo)
                    <div class="mt-2">
                        <p>Current Logo:</p>
                        <img src="{{ asset('storage/' . $client->logo) }}" alt="{{ $client->name }}" 
                             class="img-thumbnail" style="max-width: 150px;">
                    </div>
                @endif
                @error('logo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="order" class="form-label">Display Order</label>
                <input type="number" class="form-control @error('order') is-invalid @enderror" 
                       id="order" name="order" value="{{ old('order', $client->order) }}" min="0">
                <small class="form-text text-muted">Lower numbers appear first</small>
                @error('order')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="is_active" name="is_active" 
                       value="1" {{ old('is_active', $client->is_active) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_active">
                    Active (Show on website)
                </label>
            </div>
        </div>
    </div>

    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-check-circle"></i> Update Client
        </button>
        <a href="{{ route('admin.clients.index') }}" class="btn btn-secondary">
            Cancel
        </a>
    </div>
</form>
@endsection
