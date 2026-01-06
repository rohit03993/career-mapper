@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Grade Pages</h2>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="row">
    @forelse($gradePages as $gradePage)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ ucfirst(str_replace('-', ' ', $gradePage->slug)) }}</h5>
                    <p class="text-muted">{{ Str::limit($gradePage->hero_title, 60) }}</p>
                    
                    @if($gradePage->hero_image)
                        <div class="mb-2">
                            @php
                                $imageUrl = (strpos($gradePage->hero_image, 'http') === 0) ? $gradePage->hero_image : asset('storage/' . $gradePage->hero_image);
                            @endphp
                            <img src="{{ $imageUrl }}" alt="{{ $gradePage->slug }}" 
                                 class="img-thumbnail" style="max-width: 100%; height: 150px; object-fit: cover;">
                        </div>
                    @endif
                    
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <span class="badge {{ $gradePage->is_active ? 'bg-success' : 'bg-secondary' }}">
                            {{ $gradePage->is_active ? 'Active' : 'Inactive' }}
                        </span>
                        <a href="{{ route('admin.grade-pages.edit', $gradePage->id) }}" class="btn btn-sm btn-primary">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-info">
                <p>No grade pages found. Please run the seeder to create initial grade pages.</p>
            </div>
        </div>
    @endforelse
</div>
@endsection

