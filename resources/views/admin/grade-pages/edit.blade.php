@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Edit Grade Page - {{ ucfirst(str_replace('-', ' ', $gradePage->slug)) }}</h2>
    <a href="{{ route('admin.grade-pages.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Back
    </a>
</div>

@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.grade-pages.update', $gradePage->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="mb-3">Hero Section</h5>
            
            <div class="mb-3">
                <label for="hero_title" class="form-label">Hero Title <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="hero_title" name="hero_title" 
                       value="{{ old('hero_title', $gradePage->hero_title) }}" required>
            </div>

            <div class="mb-3">
                <label for="hero_subtitle" class="form-label">Hero Subtitle <span class="text-danger">*</span></label>
                <textarea class="form-control" id="hero_subtitle" name="hero_subtitle" 
                          rows="3" required>{{ old('hero_subtitle', $gradePage->hero_subtitle) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="hero_image" class="form-label">Hero Image URL</label>
                <input type="text" class="form-control" id="hero_image" name="hero_image" 
                       value="{{ old('hero_image', $gradePage->hero_image) }}" 
                       placeholder="Enter image URL (e.g., https://example.com/image.jpg)">
                <small class="form-text text-muted">Or upload an image file below</small>
            </div>

            <div class="mb-3">
                <label for="hero_image_file" class="form-label">Upload Hero Image</label>
                <input type="file" class="form-control" id="hero_image_file" name="hero_image_file" 
                       accept="image/*">
                <small class="form-text text-muted">Leave empty to keep current image or use URL above</small>
                @if($gradePage->hero_image)
                    <div class="mt-2">
                        <p>Current Image:</p>
                        @php
                            $imageUrl = (strpos($gradePage->hero_image, 'http') === 0) ? $gradePage->hero_image : asset('storage/' . $gradePage->hero_image);
                        @endphp
                        <img src="{{ $imageUrl }}" alt="Current" 
                             class="img-thumbnail" style="max-width: 300px;">
                    </div>
                @endif
            </div>

            <div class="mb-3">
                <label for="button_text" class="form-label">Button Text</label>
                <input type="text" class="form-control" id="button_text" name="button_text" 
                       value="{{ old('button_text', $gradePage->button_text) }}" 
                       placeholder="e.g., Apply for Class 8-9 Counseling Session">
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <h5 class="mb-3">Feature Links Bar</h5>
            <div id="feature-links-container">
                @php
                    $featureLinks = old('feature_links', $gradePage->feature_links ?? [
                        'Career & Subject Assessment',
                        'Personalised Guidance',
                        'Profile Building',
                        'Virtual Internships',
                        'Subject & Career Mapping'
                    ]);
                @endphp
                @foreach($featureLinks as $index => $link)
                    <div class="mb-2 feature-link-row">
                        <div class="input-group">
                            <input type="text" class="form-control" name="feature_links[{{ $index }}]" 
                                   value="{{ $link }}" placeholder="Feature link text">
                            @if($index > 0)
                                <button type="button" class="btn btn-danger remove-feature-link">
                                    <i class="bi bi-trash"></i>
                                </button>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
            <button type="button" class="btn btn-sm btn-secondary mt-2" id="add-feature-link">
                <i class="bi bi-plus"></i> Add Feature Link
            </button>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <h5 class="mb-3">Features</h5>
            <div id="features-container">
                @foreach(old('features', $gradePage->features ?? []) as $index => $feature)
                    <div class="card mb-3 feature-row">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label class="form-label">Image URL</label>
                                    <input type="text" class="form-control" name="features[{{ $index }}][image]" 
                                           value="{{ $feature['image'] ?? '' }}" 
                                           placeholder="https://example.com/image.jpg">
                                    <small class="form-text text-muted">Enter image URL (recommended) or use icon below</small>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label class="form-label">Icon Class (Fallback)</label>
                                    <input type="text" class="form-control" name="features[{{ $index }}][icon]" 
                                           value="{{ $feature['icon'] ?? '' }}" 
                                           placeholder="e.g., ri-book-open-line">
                                    <small class="form-text text-muted">Use RemixIcon classes if no image URL</small>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label class="form-label">Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="features[{{ $index }}][title]" 
                                           value="{{ $feature['title'] ?? '' }}" placeholder="Feature title" required>
                                </div>
                                <div class="col-md-11 mb-2">
                                    <label class="form-label">Description <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="features[{{ $index }}][description]" 
                                              rows="2" placeholder="Feature description" required>{{ $feature['description'] ?? '' }}</textarea>
                                </div>
                                <div class="col-md-1 d-flex align-items-end">
                                    @if($index > 0)
                                        <button type="button" class="btn btn-danger remove-feature">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <button type="button" class="btn btn-sm btn-secondary mt-2" id="add-feature">
                <i class="bi bi-plus"></i> Add Feature
            </button>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="is_active" name="is_active" 
                       value="1" {{ old('is_active', $gradePage->is_active) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_active">
                    Active (Show on website)
                </label>
            </div>
        </div>
    </div>

    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-check-circle"></i> Update Grade Page
        </button>
        <a href="{{ route('admin.grade-pages.index') }}" class="btn btn-secondary">
            Cancel
        </a>
    </div>
</form>

<script>
    let featureIndex = {{ count(old('features', $gradePage->features ?? [])) }};
    let featureLinkIndex = {{ count(old('feature_links', $gradePage->feature_links ?? [])) }};
    
    // Add Feature
    document.getElementById('add-feature').addEventListener('click', function() {
        const container = document.getElementById('features-container');
        const newFeature = document.createElement('div');
        newFeature.className = 'card mb-3 feature-row';
        newFeature.innerHTML = `
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <label class="form-label">Image URL</label>
                        <input type="text" class="form-control" name="features[${featureIndex}][image]" 
                               placeholder="https://example.com/image.jpg">
                        <small class="form-text text-muted">Enter image URL (recommended) or use icon below</small>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label class="form-label">Icon Class (Fallback)</label>
                        <input type="text" class="form-control" name="features[${featureIndex}][icon]" 
                               placeholder="e.g., ri-book-open-line">
                        <small class="form-text text-muted">Use RemixIcon classes if no image URL</small>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="features[${featureIndex}][title]" 
                               placeholder="Feature title" required>
                    </div>
                    <div class="col-md-11 mb-2">
                        <label class="form-label">Description <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="features[${featureIndex}][description]" 
                                  rows="2" placeholder="Feature description" required></textarea>
                    </div>
                    <div class="col-md-1 d-flex align-items-end">
                        <button type="button" class="btn btn-danger remove-feature">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        `;
        container.appendChild(newFeature);
        featureIndex++;
    });

    // Remove Feature
    document.addEventListener('click', function(e) {
        if (e.target.closest('.remove-feature')) {
            e.target.closest('.feature-row').remove();
        }
    });

    // Add Feature Link
    document.getElementById('add-feature-link').addEventListener('click', function() {
        const container = document.getElementById('feature-links-container');
        const newLink = document.createElement('div');
        newLink.className = 'mb-2 feature-link-row';
        newLink.innerHTML = `
            <div class="input-group">
                <input type="text" class="form-control" name="feature_links[${featureLinkIndex}]" 
                       placeholder="Feature link text">
                <button type="button" class="btn btn-danger remove-feature-link">
                    <i class="bi bi-trash"></i>
                </button>
            </div>
        `;
        container.appendChild(newLink);
        featureLinkIndex++;
    });

    // Remove Feature Link
    document.addEventListener('click', function(e) {
        if (e.target.closest('.remove-feature-link')) {
            e.target.closest('.feature-link-row').remove();
        }
    });
</script>
@endsection

