@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Portfolio / Gallery</h2>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.portfolio.categories.index') }}" class="btn btn-info">
            <i class="bi bi-tags"></i> Manage Categories
        </a>
        <a href="{{ route('admin.portfolio.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Add New Portfolio Item
        </a>
    </div>
</div>

@if($categories->count() > 0)
    @foreach($categories as $category)
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                    <span class="badge bg-info me-2">{{ $category->name }}</span>
                    <small class="text-muted">({{ $category->portfolio_items_count ?? $category->portfolioItems->count() }} items)</small>
                </h5>
                <span class="badge {{ $category->is_active ? 'bg-success' : 'bg-secondary' }}">
                    {{ $category->is_active ? 'Active' : 'Inactive' }}
                </span>
            </div>
            <div class="card-body">
                @if($category->portfolioItems && $category->portfolioItems->count() > 0)
                    <div class="row">
                        @foreach($category->portfolioItems as $item)
                            @php
                                // Handle both local storage paths and external URLs
                                $imageUrl = (strpos($item->image, 'http') === 0) ? $item->image : asset('storage/' . $item->image);
                                $thumbnailUrl = ($item->thumbnail) 
                                    ? ((strpos($item->thumbnail, 'http') === 0) ? $item->thumbnail : asset('storage/' . $item->thumbnail))
                                    : $imageUrl;
                            @endphp
                            <div class="col-md-3 mb-3">
                                <div class="card">
                                    <img src="{{ $thumbnailUrl }}" 
                                         class="card-img-top" alt="{{ $item->title }}" 
                                         style="height: 200px; object-fit: cover;"
                                         onerror="this.src='https://via.placeholder.com/300x300/cccccc/666666?text=No+Image'; this.onerror=null;">
                                    <div class="card-body">
                                        <h6 class="card-title">{{ $item->title }}</h6>
                                        <p class="card-text small text-muted mb-2">
                                            Order: {{ $item->order }} | 
                                            <span class="badge {{ $item->is_active ? 'bg-success' : 'bg-secondary' }} badge-sm">
                                                {{ $item->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </p>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="{{ route('admin.portfolio.edit', $item->id) }}" class="btn btn-primary">
                                                <i class="bi bi-pencil"></i> Edit
                                            </a>
                                            <form action="{{ route('admin.portfolio.destroy', $item->id) }}" method="POST" 
                                                  onsubmit="return confirm('Are you sure?');" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="bi bi-trash"></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-muted mb-0">No items in this category. <a href="{{ route('admin.portfolio.create') }}?category={{ $category->id }}">Add one</a></p>
                @endif
            </div>
        </div>
    @endforeach
@else
    <div class="alert alert-info">
        <p>No categories found. <a href="{{ route('admin.portfolio.categories.create') }}">Create your first category</a> to get started.</p>
    </div>
@endif

@if(isset($orphanedItems) && $orphanedItems->count() > 0)
    <div class="card mb-4 border-warning">
        <div class="card-header bg-warning">
            <h5 class="mb-0">
                <i class="bi bi-exclamation-triangle"></i> Items Without Category ({{ $orphanedItems->count() }})
            </h5>
            <small class="text-muted">These items need to be assigned to a category</small>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach($orphanedItems as $item)
                    @php
                        // Handle both local storage paths and external URLs
                        $imageUrl = (strpos($item->image, 'http') === 0) ? $item->image : asset('storage/' . $item->image);
                        $thumbnailUrl = ($item->thumbnail) 
                            ? ((strpos($item->thumbnail, 'http') === 0) ? $item->thumbnail : asset('storage/' . $item->thumbnail))
                            : $imageUrl;
                    @endphp
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <img src="{{ $thumbnailUrl }}" 
                                 class="card-img-top" alt="{{ $item->title }}" 
                                 style="height: 200px; object-fit: cover;"
                                 onerror="this.src='https://via.placeholder.com/300x300/cccccc/666666?text=No+Image'; this.onerror=null;">
                            <div class="card-body">
                                <h6 class="card-title">{{ $item->title }}</h6>
                                <p class="card-text small text-muted mb-2">
                                    Order: {{ $item->order }} | 
                                    <span class="badge {{ $item->is_active ? 'bg-success' : 'bg-secondary' }} badge-sm">
                                        {{ $item->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </p>
                                <div class="btn-group btn-group-sm" role="group">
                                    <a href="{{ route('admin.portfolio.edit', $item->id) }}" class="btn btn-primary">
                                        <i class="bi bi-pencil"></i> Edit & Assign Category
                                    </a>
                                    <form action="{{ route('admin.portfolio.destroy', $item->id) }}" method="POST" 
                                          onsubmit="return confirm('Are you sure?');" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="bi bi-trash"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif
@endsection