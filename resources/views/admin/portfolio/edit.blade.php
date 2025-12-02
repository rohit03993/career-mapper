@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Edit Portfolio Item</h2>
    <a href="{{ route('admin.portfolio.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Back
    </a>
</div>

<form action="{{ route('admin.portfolio.update', $portfolioItem->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <div class="card mb-3">
        <div class="card-body">
            <div class="mb-3">
                <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" 
                       id="title" name="title" value="{{ old('title', $portfolioItem->title) }}" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="portfolio_category_id" class="form-label">Category <span class="text-danger">*</span></label>
                <select class="form-control @error('portfolio_category_id') is-invalid @enderror" 
                        id="portfolio_category_id" name="portfolio_category_id" required>
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('portfolio_category_id', $portfolioItem->portfolio_category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                <small class="form-text text-muted">
                    <a href="{{ route('admin.portfolio.categories.create') }}" target="_blank">Create a new category</a>
                </small>
                @error('portfolio_category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" 
                       id="image" name="image" accept="image/*">
                <small class="form-text text-muted">Leave empty to keep current image</small>
                @if($portfolioItem->image)
                    <div class="mt-2">
                        <p>Current Image:</p>
                        <img src="{{ asset('storage/' . $portfolioItem->image) }}" alt="{{ $portfolioItem->title }}" 
                             class="img-thumbnail" style="max-width: 200px;">
                    </div>
                @endif
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="thumbnail" class="form-label">Thumbnail (Optional)</label>
                <input type="file" class="form-control @error('thumbnail') is-invalid @enderror" 
                       id="thumbnail" name="thumbnail" accept="image/*">
                <small class="form-text text-muted">Leave empty to keep current thumbnail</small>
                @if($portfolioItem->thumbnail)
                    <div class="mt-2">
                        <p>Current Thumbnail:</p>
                        <img src="{{ asset('storage/' . $portfolioItem->thumbnail) }}" alt="{{ $portfolioItem->title }}" 
                             class="img-thumbnail" style="max-width: 150px;">
                    </div>
                @endif
                @error('thumbnail')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description (Optional)</label>
                <textarea class="form-control @error('description') is-invalid @enderror" 
                          id="description" name="description" rows="3">{{ old('description', $portfolioItem->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="order" class="form-label">Display Order</label>
                <input type="number" class="form-control @error('order') is-invalid @enderror" 
                       id="order" name="order" value="{{ old('order', $portfolioItem->order) }}" min="0">
                <small class="form-text text-muted">Lower numbers appear first</small>
                @error('order')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="is_active" name="is_active" 
                       value="1" {{ old('is_active', $portfolioItem->is_active) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_active">
                    Active (Show on website)
                </label>
            </div>
        </div>
    </div>

    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-check-circle"></i> Update Portfolio Item
        </button>
        <a href="{{ route('admin.portfolio.index') }}" class="btn btn-secondary">
            Cancel
        </a>
    </div>
</form>
@endsection
