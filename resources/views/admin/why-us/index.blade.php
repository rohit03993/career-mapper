@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Why Us Section</h2>
    @if($whyUs)
        <a href="{{ route('admin.why-us.edit', $whyUs->id) }}" class="btn btn-primary">
            <i class="bi bi-pencil"></i> Edit Content
        </a>
    @else
        <p class="text-muted">No content found. Please create initial content.</p>
    @endif
</div>

@if($whyUs)
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $whyUs->title }}</h5>
            <p class="text-muted">{{ $whyUs->intro_text }}</p>
            
            <div class="mt-3">
                <h6>Items:</h6>
                <ul>
                    @foreach($whyUs->items ?? [] as $item)
                        <li>
                            <strong>{{ $item['number'] ?? '' }}:</strong> {{ $item['text'] ?? '' }}
                        </li>
                    @endforeach
                </ul>
            </div>
            
            <div class="mt-3">
                <h6>Conclusion:</h6>
                <p>{{ $whyUs->conclusion_text }}</p>
            </div>
            
            @if($whyUs->image)
                <div class="mt-3">
                    <h6>Current Image:</h6>
                    <img src="{{ asset('storage/' . $whyUs->image) }}" alt="Why Us" class="img-thumbnail" style="max-width: 200px;">
                </div>
            @endif
            
            <div class="mt-3">
                <span class="badge {{ $whyUs->is_active ? 'bg-success' : 'bg-secondary' }}">
                    {{ $whyUs->is_active ? 'Active' : 'Inactive' }}
                </span>
            </div>
        </div>
    </div>
@else
    <div class="alert alert-info">
        <p>No Why Us content found. Please create initial content by running the seeder or manually adding content.</p>
    </div>
@endif
@endsection
