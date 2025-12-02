@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Edit About Us Section</h2>
    <a href="{{ route('admin.about-us.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Back
    </a>
</div>

<form action="{{ route('admin.about-us.update', $aboutUs->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <div class="card mb-3">
        <div class="card-body">
            <div class="mb-3">
                <label for="title" class="form-label">Section Title</label>
                <input type="text" class="form-control" id="title" name="title" 
                       value="{{ old('title', $aboutUs->title) }}" required>
            </div>

            <div class="mb-3">
                <label for="left_column_text" class="form-label">Left Column Text</label>
                <textarea class="form-control" id="left_column_text" name="left_column_text" 
                          rows="5" required>{{ old('left_column_text', $aboutUs->left_column_text) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="right_column_text_1" class="form-label">Right Column Text (First Paragraph)</label>
                <textarea class="form-control" id="right_column_text_1" name="right_column_text_1" 
                          rows="4" required>{{ old('right_column_text_1', $aboutUs->right_column_text_1) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="right_column_text_2" class="form-label">Right Column Text (Second Paragraph)</label>
                <textarea class="form-control" id="right_column_text_2" name="right_column_text_2" 
                          rows="4" required>{{ old('right_column_text_2', $aboutUs->right_column_text_2) }}</textarea>
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <h5 class="mb-3">Features List</h5>
            <div id="features-container">
                @foreach(old('features', $aboutUs->features ?? ['']) as $index => $feature)
                    <div class="input-group mb-2 feature-item">
                        <input type="text" class="form-control" name="features[]" 
                               value="{{ $feature }}" placeholder="Enter feature text" required>
                        @if($index > 0)
                            <button type="button" class="btn btn-danger remove-feature">
                                <i class="bi bi-trash"></i>
                            </button>
                        @endif
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
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image" 
                       accept="image/*">
                <small class="form-text text-muted">Leave empty to keep current image</small>
                @if($aboutUs->image)
                    <div class="mt-2">
                        <p>Current Image:</p>
                        <img src="{{ asset('storage/' . $aboutUs->image) }}" alt="Current" 
                             class="img-thumbnail" style="max-width: 200px;">
                    </div>
                @endif
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="is_active" name="is_active" 
                       value="1" {{ old('is_active', $aboutUs->is_active) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_active">
                    Active (Show on website)
                </label>
            </div>
        </div>
    </div>

    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-check-circle"></i> Update Content
        </button>
        <a href="{{ route('admin.about-us.index') }}" class="btn btn-secondary">
            Cancel
        </a>
    </div>
</form>

<script>
    document.getElementById('add-feature').addEventListener('click', function() {
        const container = document.getElementById('features-container');
        const newItem = document.createElement('div');
        newItem.className = 'input-group mb-2 feature-item';
        newItem.innerHTML = `
            <input type="text" class="form-control" name="features[]" 
                   placeholder="Enter feature text" required>
            <button type="button" class="btn btn-danger remove-feature">
                <i class="bi bi-trash"></i>
            </button>
        `;
        container.appendChild(newItem);
    });

    document.addEventListener('click', function(e) {
        if (e.target.closest('.remove-feature')) {
            e.target.closest('.feature-item').remove();
        }
    });
</script>
@endsection
