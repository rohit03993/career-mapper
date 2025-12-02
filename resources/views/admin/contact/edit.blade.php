@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Edit Contact Information</h2>
    <a href="{{ route('admin.contact.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Back
    </a>
</div>

<form action="{{ route('admin.contact.update') }}" method="POST">
    @csrf
    @method('PUT')
    
    <div class="card mb-3">
        <div class="card-body">
            <div class="mb-3">
                <label for="location" class="form-label">Location Address</label>
                <textarea class="form-control @error('location') is-invalid @enderror" 
                          id="location" name="location" rows="2">{{ old('location', $contactInfo->location ?? '') }}</textarea>
                <small class="form-text text-muted">Main business location address</small>
                @error('location')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="office_address" class="form-label">Office Address</label>
                <textarea class="form-control @error('office_address') is-invalid @enderror" 
                          id="office_address" name="office_address" rows="2">{{ old('office_address', $contactInfo->office_address ?? '') }}</textarea>
                <small class="form-text text-muted">Additional office address</small>
                @error('office_address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                       id="email" name="email" value="{{ old('email', $contactInfo->email ?? '') }}">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('phone') is-invalid @enderror" 
                       id="phone" name="phone" value="{{ old('phone', $contactInfo->phone ?? '') }}"
                       placeholder="e.g., +916396292221 or +91 6396292221"
                       required>
                <small class="form-text text-muted">
                    <i class="bi bi-info-circle"></i> This phone number is used in the "Call Now" button in the website header. 
                    Format: Include country code (e.g., +91 for India) followed by the phone number.
                </small>
                @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="map_embed_url" class="form-label">Google Maps Embed URL</label>
                <textarea class="form-control @error('map_embed_url') is-invalid @enderror" 
                          id="map_embed_url" name="map_embed_url" rows="3">{{ old('map_embed_url', $contactInfo->map_embed_url ?? '') }}</textarea>
                <small class="form-text text-muted">Paste the full iframe src URL from Google Maps embed code</small>
                @error('map_embed_url')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="is_active" name="is_active" 
                       value="1" {{ old('is_active', $contactInfo->is_active ?? true) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_active">
                    Active (Show on website)
                </label>
            </div>
        </div>
    </div>

    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-check-circle"></i> Update Contact Information
        </button>
        <a href="{{ route('admin.contact.index') }}" class="btn btn-secondary">
            Cancel
        </a>
    </div>
</form>
@endsection
