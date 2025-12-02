@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Add New Team Member</h2>
    <a href="{{ route('admin.team.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Back
    </a>
</div>

<form action="{{ route('admin.team.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <div class="card mb-3">
        <div class="card-body">
            <div class="mb-3">
                <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                       id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="position" class="form-label">Position/Title <span class="text-danger">*</span></label>
                <textarea class="form-control @error('position') is-invalid @enderror" 
                          id="position" name="position" rows="3" required>{{ old('position') }}</textarea>
                <small class="form-text text-muted">You can use line breaks (press Enter) for multiple lines</small>
                @error('position')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Photo</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" 
                       id="image" name="image" accept="image/*">
                <small class="form-text text-muted">Recommended: Square image (e.g., 300x300px or 400x400px)</small>
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Social Media Links (Optional)</label>
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <label for="linkedin" class="form-label small">LinkedIn</label>
                        <input type="url" class="form-control @error('linkedin') is-invalid @enderror" 
                               id="linkedin" name="linkedin" value="{{ old('linkedin') }}" placeholder="https://linkedin.com/in/...">
                        @error('linkedin')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="twitter" class="form-label small">Twitter</label>
                        <input type="url" class="form-control @error('twitter') is-invalid @enderror" 
                               id="twitter" name="twitter" value="{{ old('twitter') }}" placeholder="https://twitter.com/...">
                        @error('twitter')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="facebook" class="form-label small">Facebook</label>
                        <input type="url" class="form-control @error('facebook') is-invalid @enderror" 
                               id="facebook" name="facebook" value="{{ old('facebook') }}" placeholder="https://facebook.com/...">
                        @error('facebook')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="instagram" class="form-label small">Instagram</label>
                        <input type="url" class="form-control @error('instagram') is-invalid @enderror" 
                               id="instagram" name="instagram" value="{{ old('instagram') }}" placeholder="https://instagram.com/...">
                        @error('instagram')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="youtube" class="form-label small">YouTube</label>
                        <input type="url" class="form-control @error('youtube') is-invalid @enderror" 
                               id="youtube" name="youtube" value="{{ old('youtube') }}" placeholder="https://youtube.com/...">
                        @error('youtube')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
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
            <i class="bi bi-check-circle"></i> Create Team Member
        </button>
        <a href="{{ route('admin.team.index') }}" class="btn btn-secondary">
            Cancel
        </a>
    </div>
</form>
@endsection
