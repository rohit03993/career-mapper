@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Edit Services Section</h2>
    <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Back
    </a>
</div>

<form action="{{ route('admin.services.update', $service->id) }}" method="POST">
    @csrf
    @method('PUT')
    
    <div class="card mb-3">
        <div class="card-body">
            <div class="mb-3">
                <label for="title" class="form-label">Section Title</label>
                <input type="text" class="form-control" id="title" name="title" 
                       value="{{ old('title', $service->title) }}" required>
            </div>

            <div class="mb-3">
                <label for="subtitle" class="form-label">Subtitle</label>
                <input type="text" class="form-control" id="subtitle" name="subtitle" 
                       value="{{ old('subtitle', $service->subtitle) }}">
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <h5 class="mb-3">Service Items</h5>
            <div id="items-container">
                @foreach(old('items', $service->items ?? []) as $index => $item)
                    <div class="card mb-2 item-row">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label">Icon Class</label>
                                    <input type="text" class="form-control" name="items[{{ $index }}][icon]" 
                                           value="{{ $item['icon'] ?? '' }}" placeholder="bx bxl-dribbble" required>
                                    <small class="text-muted">e.g., bx bxl-dribbble</small>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Service Title</label>
                                    <input type="text" class="form-control" name="items[{{ $index }}][title]" 
                                           value="{{ $item['title'] ?? '' }}" placeholder="Service Name" required>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Link (Optional)</label>
                                    <input type="text" class="form-control" name="items[{{ $index }}][link]" 
                                           value="{{ $item['link'] ?? '' }}" placeholder="# or URL">
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
                <i class="bi bi-plus"></i> Add Service Item
            </button>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="is_active" name="is_active" 
                       value="1" {{ old('is_active', $service->is_active) ? 'checked' : '' }}>
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
        <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">
            Cancel
        </a>
    </div>
</form>

<script>
    let itemIndex = {{ count(old('items', $service->items ?? [])) }};
    
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
                               placeholder="bx bxl-dribbble" required>
                        <small class="text-muted">e.g., bx bxl-dribbble</small>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Service Title</label>
                        <input type="text" class="form-control" name="items[${itemIndex}][title]" 
                               placeholder="Service Name" required>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Link (Optional)</label>
                        <input type="text" class="form-control" name="items[${itemIndex}][link]" 
                               placeholder="# or URL">
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
