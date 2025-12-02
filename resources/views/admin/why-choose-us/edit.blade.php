@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Edit Why Choose Us Section</h2>
    <a href="{{ route('admin.why-choose-us.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Back
    </a>
</div>

<form action="{{ route('admin.why-choose-us.update') }}" method="POST">
    @csrf
    @method('PUT')
    
    <div class="card mb-3">
        <div class="card-body">
            <div class="mb-3">
                <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" 
                       id="title" name="title" value="{{ old('title', $whyChooseUs->title ?? 'Why Choose Us') }}" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="paragraph_1" class="form-label">First Paragraph <span class="text-danger">*</span></label>
                <textarea class="form-control @error('paragraph_1') is-invalid @enderror" 
                          id="paragraph_1" name="paragraph_1" rows="6" required>{{ old('paragraph_1', $whyChooseUs->paragraph_1 ?? '') }}</textarea>
                <small class="form-text text-muted">First paragraph of the Why Choose Us section</small>
                @error('paragraph_1')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="paragraph_2" class="form-label">Second Paragraph <span class="text-danger">*</span></label>
                <textarea class="form-control @error('paragraph_2') is-invalid @enderror" 
                          id="paragraph_2" name="paragraph_2" rows="6" required>{{ old('paragraph_2', $whyChooseUs->paragraph_2 ?? '') }}</textarea>
                <small class="form-text text-muted">Second paragraph of the Why Choose Us section</small>
                @error('paragraph_2')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="is_active" name="is_active" 
                       value="1" {{ old('is_active', $whyChooseUs->is_active ?? true) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_active">
                    Active (Show on website)
                </label>
            </div>
        </div>
    </div>

    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-check-circle"></i> Update Why Choose Us Section
        </button>
        <a href="{{ route('admin.why-choose-us.index') }}" class="btn btn-secondary">
            Cancel
        </a>
    </div>
</form>
@endsection
