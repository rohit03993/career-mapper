@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
    <h2>Edit Career - {{ $career->title }}</h2>
    <div class="d-flex gap-2">
        <a href="{{ route('careers.show', $career->slug) }}" class="btn btn-outline-primary" target="_blank" rel="noopener">
            <i class="bi bi-box-arrow-up-right"></i> View Page
        </a>
        <a href="{{ route('admin.careers.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Back
        </a>
    </div>
</div>

<p class="text-muted mb-4">Edit all content that appears on the career page. Use the fields below for the main intro, key features, scope, and related sections. Save with <strong>Update Career</strong> when done.</p>

<form action="{{ route('admin.careers.update', $career->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="card mb-3">
        <div class="card-header"><h5 class="mb-0">Basic Information</h5></div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $career->title) }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="slug" class="form-label">Slug <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug', $career->slug) }}" required>
                    <small class="text-muted">URL-friendly (e.g. actuarial-sciences)</small>
                </div>
            </div>
            <div class="mb-3">
                <label for="short_description" class="form-label">Short Description</label>
                <textarea class="form-control" id="short_description" name="short_description" rows="2" placeholder="Brief tagline shown in listings and hero">{{ old('short_description', $career->short_description) }}</textarea>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Main Content <span class="text-muted">(editable)</span></label>
                <textarea class="form-control" id="content" name="content" rows="14" placeholder="Intro, definition, specialisations&#10;&#10;Educational paths: degrees, diplomas, certifications&#10;&#10;Top recruiters: industries, employers&#10;&#10;Trending areas: growing sub-fields&#10;&#10;Use new lines for paragraphs.">{{ old('content', $career->content) }}</textarea>
                <small class="text-muted">Main text on the career page. Suggest: intro, Educational paths, Top recruiters, Trending areas. Use new lines for paragraphs.</small>
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header"><h5 class="mb-0">Images</h5></div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="hero_image" class="form-label">Hero Image</label>
                    @if($career->hero_image)
                        <div class="mb-2"><img src="{{ asset('storage/' . $career->hero_image) }}" alt="Hero" class="img-thumbnail" style="max-width: 200px;"></div>
                    @endif
                    <input type="file" class="form-control" id="hero_image" name="hero_image" accept="image/*">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="featured_image" class="form-label">Featured Image</label>
                    @if($career->featured_image)
                        <div class="mb-2"><img src="{{ asset('storage/' . $career->featured_image) }}" alt="Featured" class="img-thumbnail" style="max-width: 200px;"></div>
                    @endif
                    <input type="file" class="form-control" id="featured_image" name="featured_image" accept="image/*">
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header"><h5 class="mb-0">Key Features <span class="text-muted fw-normal">(editable)</span></h5></div>
        <div class="card-body">
            <p class="text-muted small mb-3">Bullet points shown on the career page. Add, remove, or reorder as needed.</p>
            <div id="features-container">
                @foreach(old('features', $career->features ?? []) as $f)
                    <div class="mb-2 feature-row">
                        <div class="input-group">
                            <input type="text" class="form-control" name="features[]" value="{{ $f }}" placeholder="e.g. High demand in insurance and finance">
                            <button type="button" class="btn btn-danger remove-feature"><i class="bi bi-trash"></i></button>
                        </div>
                    </div>
                @endforeach
            </div>
            <button type="button" class="btn btn-sm btn-secondary mt-2" id="add-feature"><i class="bi bi-plus"></i> Add Feature</button>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header"><h5 class="mb-0">Scope &amp; Guidance <span class="text-muted fw-normal">(editable)</span></h5></div>
        <div class="card-body">
            <p class="text-muted small mb-3">These sections appear on the career page below the main content.</p>
            <div class="mb-3">
                <label for="scope" class="form-label">Scope / Career Prospects</label>
                <textarea class="form-control" id="scope" name="scope" rows="4" placeholder="Where and how this career is used; demand and growth.">{{ old('scope', $career->scope) }}</textarea>
            </div>
            <div class="mb-3">
                <label for="who_can_pursue" class="form-label">Who Can Pursue?</label>
                <textarea class="form-control" id="who_can_pursue" name="who_can_pursue" rows="4" placeholder="Academic background, skills, aptitude.">{{ old('who_can_pursue', $career->who_can_pursue) }}</textarea>
            </div>
            <div class="mb-3">
                <label for="what_you_get" class="form-label">What You'll Get</label>
                <textarea class="form-control" id="what_you_get" name="what_you_get" rows="4" placeholder="Typical roles, outcomes, progression.">{{ old('what_you_get', $career->what_you_get) }}</textarea>
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header"><h5 class="mb-0">SEO & Settings</h5></div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="meta_title" class="form-label">Meta Title</label>
                    <input type="text" class="form-control" id="meta_title" name="meta_title" value="{{ old('meta_title', $career->meta_title) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="order" class="form-label">Order <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="order" name="order" value="{{ old('order', $career->order) }}" min="0" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="meta_description" class="form-label">Meta Description</label>
                <textarea class="form-control" id="meta_description" name="meta_description" rows="2">{{ old('meta_description', $career->meta_description) }}</textarea>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $career->is_active) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_active">Active (show on website)</label>
            </div>
        </div>
    </div>

    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-primary"><i class="bi bi-check-circle"></i> Update Career</button>
        <a href="{{ route('admin.careers.index') }}" class="btn btn-secondary">Cancel</a>
    </div>
</form>

@push('scripts')
<script>
document.getElementById('add-feature').addEventListener('click', function() {
    const c = document.getElementById('features-container');
    const d = document.createElement('div');
    d.className = 'mb-2 feature-row';
    d.innerHTML = '<div class="input-group"><input type="text" class="form-control" name="features[]" placeholder="Enter feature"><button type="button" class="btn btn-danger remove-feature"><i class="bi bi-trash"></i></button></div>';
    c.appendChild(d);
});
document.addEventListener('click', function(e) {
    if (e.target.closest('.remove-feature')) e.target.closest('.feature-row').remove();
});
</script>
@endpush
@endsection
