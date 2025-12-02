@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Edit Features Section</h2>
    <a href="{{ route('admin.features.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Back
    </a>
</div>

<form action="{{ route('admin.features.update', $feature->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <div class="card mb-3">
        <div class="card-body">
            <div class="mb-3">
                <label for="title" class="form-label">Section Title</label>
                <input type="text" class="form-control" id="title" name="title" 
                       value="{{ old('title', $feature->title) }}" required>
            </div>

            <div class="mb-3">
                <label for="subtitle" class="form-label">Subtitle (Optional)</label>
                <input type="text" class="form-control" id="subtitle" name="subtitle" 
                       value="{{ old('subtitle', $feature->subtitle) }}">
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <h5 class="mb-3">Feature Items</h5>
            <div id="items-container">
                @foreach(old('items', $feature->items ?? []) as $index => $item)
                    <div class="card mb-2 item-row">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label">Icon Class</label>
                                    <input type="text" class="form-control" name="items[{{ $index }}][icon]" 
                                           value="{{ $item['icon'] ?? '' }}" placeholder="bx bx-receipt" required>
                                    <small class="text-muted">e.g., bx bx-receipt</small>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control" name="items[{{ $index }}][title]" 
                                           value="{{ $item['title'] ?? '' }}" placeholder="Feature Title" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Description</label>
                                    <input type="text" class="form-control" name="items[{{ $index }}][description]" 
                                           value="{{ $item['description'] ?? '' }}" placeholder="Feature Description" required>
                                </div>
                                <div class="col-md-1 d-flex align-items-end">
                                    @if($index > 0)
                                        <button type="button" class="btn btn-danger remove-item">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <button type="button" class="btn btn-sm btn-secondary mt-2" id="add-item">
                <i class="bi bi-plus"></i> Add Feature Item
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
                @if($feature->image)
                    <div class="mt-2">
                        <p>Current Image:</p>
                        <img src="{{ asset('storage/' . $feature->image) }}" alt="Current" 
                             class="img-thumbnail" style="max-width: 200px;">
                    </div>
                @endif
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="is_active" name="is_active" 
                       value="1" {{ old('is_active', $feature->is_active) ? 'checked' : '' }}>
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
        <a href="{{ route('admin.features.index') }}" class="btn btn-secondary">
            Cancel
        </a>
    </div>
</form>

<script>
    let itemIndex = {{ count(old('items', $feature->items ?? [])) }};
    
    document.getElementById('add-item').addEventListener('click', function() {
        const container = document.getElementById('items-container');
        const newItem = document.createElement('div');
        newItem.className = 'card mb-2 item-row';
        newItem.innerHTML = `
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <label class="form-label">Icon Class</label>
                        <input type="text" class="form-control" name="items[${itemIndex}][icon]" 
                               placeholder="bx bx-receipt" required>
                        <small class="text-muted">e.g., bx bx-receipt</small>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control" name="items[${itemIndex}][title]" 
                               placeholder="Feature Title" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Description</label>
                        <input type="text" class="form-control" name="items[${itemIndex}][description]" 
                               placeholder="Feature Description" required>
                    </div>
                    <div class="col-md-1 d-flex align-items-end">
                        <button type="button" class="btn btn-danger remove-item">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        `;
        container.appendChild(newItem);
        itemIndex++;
    });

    document.addEventListener('click', function(e) {
        if (e.target.closest('.remove-item')) {
            e.target.closest('.item-row').remove();
        }
    });
</script>
@endsection
