@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Why Choose Us Section</h2>
    @if($whyChooseUs)
        <a href="{{ route('admin.why-choose-us.edit') }}" class="btn btn-primary">
            <i class="bi bi-pencil"></i> Edit Content
        </a>
    @else
        <p class="text-muted">No content found. Please create initial content.</p>
    @endif
</div>

@if($whyChooseUs)
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $whyChooseUs->title }}</h5>
            
            <div class="mt-3">
                <h6>Paragraph 1:</h6>
                <p class="text-muted">{{ Str::limit($whyChooseUs->paragraph_1, 200) }}</p>
            </div>
            
            <div class="mt-3">
                <h6>Paragraph 2:</h6>
                <p class="text-muted">{{ Str::limit($whyChooseUs->paragraph_2, 200) }}</p>
            </div>
            
            <div class="mt-3">
                <span class="badge {{ $whyChooseUs->is_active ? 'bg-success' : 'bg-secondary' }}">
                    {{ $whyChooseUs->is_active ? 'Active' : 'Inactive' }}
                </span>
            </div>
        </div>
    </div>
@else
    <div class="alert alert-info">
        <p>No Why Choose Us content found. <a href="{{ route('admin.why-choose-us.edit') }}">Create content</a></p>
    </div>
@endif
@endsection
