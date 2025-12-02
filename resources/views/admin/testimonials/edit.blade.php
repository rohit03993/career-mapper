@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Edit Testimonial</h2>
    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Back
    </a>
</div>

<form action="{{ route('admin.testimonials.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <div class="card mb-3">
        <div class="card-body">
            <div class="mb-3">
                <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                       id="name" name="name" value="{{ old('name', $testimonial->name) }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="designation" class="form-label">Designation <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('designation') is-invalid @enderror" 
                       id="designation" name="designation" value="{{ old('designation', $testimonial->designation) }}" required>
                @error('designation')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="testimonial" class="form-label">Testimonial <span class="text-danger">*</span></label>
                <textarea class="form-control @error('testimonial') is-invalid @enderror" 
                          id="testimonial" name="testimonial" rows="6" required>{{ old('testimonial', $testimonial->testimonial) }}</textarea>
                @error('testimonial')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Photo</label>
                @if($testimonial->image)
                    @php
                        $imageUrl = (strpos($testimonial->image, 'http') === 0) ? $testimonial->image : asset('storage/' . $testimonial->image);
                    @endphp
                    <div class="mb-2">
                        <img src="{{ $imageUrl }}" alt="{{ $testimonial->name }}" 
                             style="width: 150px; height: 150px; object-fit: cover; border-radius: 50%;"
                             onerror="this.src='https://via.placeholder.com/150x150/cccccc/666666?text=No+Image'; this.onerror=null;">
                    </div>
                    <small class="form-text text-muted d-block mb-2">Current photo</small>
                @endif
                <input type="file" class="form-control @error('image') is-invalid @enderror" 
                       id="image" name="image" accept="image/*">
                <small class="form-text text-muted">Leave empty to keep current photo. Recommended: Square image (e.g., 150x150px or 200x200px)</small>
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="order" class="form-label">Display Order</label>
                <input type="number" class="form-control @error('order') is-invalid @enderror" 
                       id="order" name="order" value="{{ old('order', $testimonial->order) }}" min="0">
                <small class="form-text text-muted">Lower numbers appear first</small>
                @error('order')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="is_active" name="is_active" 
                       value="1" {{ old('is_active', $testimonial->is_active) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_active">
                    Active (Show on website)
                </label>
            </div>
        </div>
    </div>

    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-check-circle"></i> Update Testimonial
        </button>
        <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">
            Cancel
        </a>
    </div>
</form>
@endsection
