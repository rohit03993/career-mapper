@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Features Section</h2>
    @if($feature)
        <a href="{{ route('admin.features.edit', $feature->id) }}" class="btn btn-primary">
            <i class="bi bi-pencil"></i> Edit Content
        </a>
    @else
        <p class="text-muted">No content found. Please create initial content.</p>
    @endif
</div>

@if($feature)
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $feature->title }}</h5>
            @if($feature->subtitle)
                <p class="text-muted">{{ $feature->subtitle }}</p>
            @endif
            
            <div class="mt-3">
                <h6>Feature Items:</h6>
                <ul>
                    @foreach($feature->items ?? [] as $item)
                        <li>
                            <strong><i class="{{ $item['icon'] ?? '' }}"></i> {{ $item['title'] ?? '' }}:</strong> 
                            {{ $item['description'] ?? '' }}
                        </li>
                    @endforeach
                </ul>
            </div>
            
            @if($feature->image)
                <div class="mt-3">
                    <h6>Current Image:</h6>
                    <img src="{{ asset('storage/' . $feature->image) }}" alt="Features" class="img-thumbnail" style="max-width: 200px;">
                </div>
            @endif
            
            <div class="mt-3">
                <span class="badge {{ $feature->is_active ? 'bg-success' : 'bg-secondary' }}">
                    {{ $feature->is_active ? 'Active' : 'Inactive' }}
                </span>
            </div>
        </div>
    </div>
@else
    <div class="alert alert-info">
        <p>No Features content found. Please create initial content by running the seeder or manually adding content.</p>
    </div>
@endif
@endsection
