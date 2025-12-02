@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>About Us Section</h2>
    @if($aboutUs)
        <a href="{{ route('admin.about-us.edit', $aboutUs->id) }}" class="btn btn-primary">
            <i class="bi bi-pencil"></i> Edit Content
        </a>
    @else
        <p class="text-muted">No content found. Please create initial content.</p>
    @endif
</div>

@if($aboutUs)
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $aboutUs->title }}</h5>
            <div class="row">
                <div class="col-md-6">
                    <h6>Left Column:</h6>
                    <p>{{ Str::limit($aboutUs->left_column_text, 150) }}</p>
                </div>
                <div class="col-md-6">
                    <h6>Right Column:</h6>
                    <p>{{ Str::limit($aboutUs->right_column_text_1, 150) }}</p>
                </div>
            </div>
            <div class="mt-3">
                <h6>Features:</h6>
                <ul>
                    @foreach($aboutUs->features ?? [] as $feature)
                        <li>{{ $feature }}</li>
                    @endforeach
                </ul>
            </div>
            @if($aboutUs->image)
                <div class="mt-3">
                    <h6>Current Image:</h6>
                    <img src="{{ asset('storage/' . $aboutUs->image) }}" alt="About Us" class="img-thumbnail" style="max-width: 200px;">
                </div>
            @endif
            <div class="mt-3">
                <span class="badge {{ $aboutUs->is_active ? 'bg-success' : 'bg-secondary' }}">
                    {{ $aboutUs->is_active ? 'Active' : 'Inactive' }}
                </span>
            </div>
        </div>
    </div>
@else
    <div class="alert alert-info">
        <p>No About Us content found. Please create initial content by running the seeder or manually adding content.</p>
    </div>
@endif
@endsection
