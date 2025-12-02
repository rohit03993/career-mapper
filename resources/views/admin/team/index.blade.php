@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Team Members</h2>
    <a href="{{ route('admin.team.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Add New Team Member
    </a>
</div>

@if($teamMembers->count() > 0)
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Social Links</th>
                            <th>Order</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($teamMembers as $member)
                            <tr>
                                <td>
                                    @if($member->image)
                                        @php
                                            $imageUrl = (strpos($member->image, 'http') === 0) ? $member->image : asset('storage/' . $member->image);
                                        @endphp
                                        <img src="{{ $imageUrl }}" alt="{{ $member->name }}" 
                                             style="width: 60px; height: 60px; object-fit: cover; border-radius: 50%;"
                                             onerror="this.src='https://via.placeholder.com/60x60/cccccc/666666?text=No+Image'; this.onerror=null;">
                                    @else
                                        <div style="width: 60px; height: 60px; border-radius: 50%; background: #ddd; display: flex; align-items: center; justify-content: center;">
                                            <i class="bi bi-person" style="font-size: 24px; color: #999;"></i>
                                        </div>
                                    @endif
                                </td>
                                <td><strong>{{ $member->name }}</strong></td>
                                <td>{!! nl2br(e($member->position)) !!}</td>
                                <td>
                                    @if($member->linkedin || $member->twitter || $member->facebook || $member->instagram || $member->youtube)
                                        <div class="d-flex gap-1">
                                            @if($member->linkedin)<a href="{{ $member->linkedin }}" target="_blank" class="text-primary"><i class="bi bi-linkedin"></i></a>@endif
                                            @if($member->twitter)<a href="{{ $member->twitter }}" target="_blank" class="text-info"><i class="bi bi-twitter"></i></a>@endif
                                            @if($member->facebook)<a href="{{ $member->facebook }}" target="_blank" class="text-primary"><i class="bi bi-facebook"></i></a>@endif
                                            @if($member->instagram)<a href="{{ $member->instagram }}" target="_blank" class="text-danger"><i class="bi bi-instagram"></i></a>@endif
                                            @if($member->youtube)<a href="{{ $member->youtube }}" target="_blank" class="text-danger"><i class="bi bi-youtube"></i></a>@endif
                                        </div>
                                    @else
                                        <span class="text-muted">None</span>
                                    @endif
                                </td>
                                <td>{{ $member->order }}</td>
                                <td>
                                    <span class="badge {{ $member->is_active ? 'bg-success' : 'bg-secondary' }}">
                                        {{ $member->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.team.edit', $member->id) }}" class="btn btn-sm btn-primary">
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>
                                        <form action="{{ route('admin.team.destroy', $member->id) }}" method="POST" 
                                              onsubmit="return confirm('Are you sure you want to delete this team member?');" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@else
    <div class="alert alert-info">
        <p>No team members found. <a href="{{ route('admin.team.create') }}">Add your first team member</a></p>
    </div>
@endif
@endsection
