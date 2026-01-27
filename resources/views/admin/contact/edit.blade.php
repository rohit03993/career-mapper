@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Edit Contact Information</h2>
    <a href="{{ route('admin.contact.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Back
    </a>
</div>

<p class="text-muted mb-3">Update the contact details shown in the <strong>footer</strong> and <strong>Contact Us</strong> section. Changes apply site-wide.</p>

<form action="{{ route('admin.contact.update') }}" method="POST">
    @csrf
    @method('PUT')
    
    <div class="card mb-3">
        <div class="card-body">
            <div class="mb-3">
                <label for="location" class="form-label">Address</label>
                <textarea class="form-control @error('location') is-invalid @enderror" 
                          id="location" name="location" rows="2" placeholder="e.g. Main office address">{{ old('location', $contactInfo->location ?? '') }}</textarea>
                <small class="form-text text-muted">Shown as "Address" in footer and contact section. Leave empty if using Centers below.</small>
                @error('location')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <h5 class="mt-4 mb-3">Centers (optional — only filled centers appear on the contact page)</h5>
            
            <div class="mb-3">
                <label for="center_1" class="form-label">Center 1 Address</label>
                <textarea class="form-control @error('center_1') is-invalid @enderror" 
                          id="center_1" name="center_1" rows="2" placeholder="Enter Center 1 address">{{ old('center_1', $contactInfo->center_1 ?? '') }}</textarea>
                <small class="form-text text-muted">Leave empty if this center is not needed</small>
                @error('center_1')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="center_2" class="form-label">Center 2 Address</label>
                <textarea class="form-control @error('center_2') is-invalid @enderror" 
                          id="center_2" name="center_2" rows="2" placeholder="Enter Center 2 address">{{ old('center_2', $contactInfo->center_2 ?? '') }}</textarea>
                <small class="form-text text-muted">Leave empty if this center is not needed</small>
                @error('center_2')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="center_3" class="form-label">Center 3 Address</label>
                <textarea class="form-control @error('center_3') is-invalid @enderror" 
                          id="center_3" name="center_3" rows="2" placeholder="Enter Center 3 address">{{ old('center_3', $contactInfo->center_3 ?? '') }}</textarea>
                <small class="form-text text-muted">Leave empty if this center is not needed</small>
                @error('center_3')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="center_4" class="form-label">Center 4 Address</label>
                <textarea class="form-control @error('center_4') is-invalid @enderror" 
                          id="center_4" name="center_4" rows="2" placeholder="Enter Center 4 address">{{ old('center_4', $contactInfo->center_4 ?? '') }}</textarea>
                <small class="form-text text-muted">Leave empty if this center is not needed</small>
                @error('center_4')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="office_address" class="form-label">Office Address</label>
                <textarea class="form-control @error('office_address') is-invalid @enderror" 
                          id="office_address" name="office_address" rows="2" placeholder="e.g. Branch or secondary address">{{ old('office_address', $contactInfo->office_address ?? '') }}</textarea>
                <small class="form-text text-muted">Shown as "Office Address" in footer and contact section. Leave empty if not needed.</small>
                @error('office_address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                       id="email" name="email" value="{{ old('email', $contactInfo->email ?? '') }}" placeholder="e.g. contact@example.com">
                <small class="form-text text-muted">Shown in footer, contact section, and header.</small>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('phone') is-invalid @enderror" 
                       id="phone" name="phone" value="{{ old('phone', $contactInfo->phone ?? '') }}"
                       placeholder="e.g. +91 6396292221"
                       required>
                <small class="form-text text-muted">
                    <i class="bi bi-info-circle"></i> Used in the "Call Now" button (header), footer, and contact section. Include country code (e.g. +91).
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
