@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Dashboard</h2>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><i class="bi bi-info-circle"></i> About Us</h5>
                <p class="card-text">Manage the About Us section content</p>
                    <a href="{{ route('admin.about-us.index') }}" class="btn btn-primary">Manage</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><i class="bi bi-star"></i> Why Us</h5>
                    <p class="card-text">Manage the Why Us section content</p>
                    <a href="{{ route('admin.why-us.index') }}" class="btn btn-primary">Manage</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><i class="bi bi-star-fill"></i> Features</h5>
                    <p class="card-text">Manage the Features section content</p>
                    <a href="{{ route('admin.features.index') }}" class="btn btn-primary">Manage</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><i class="bi bi-building"></i> Clients</h5>
                    <p class="card-text">Manage client logos and collaborators</p>
                    <a href="{{ route('admin.clients.index') }}" class="btn btn-primary">Manage</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><i class="bi bi-briefcase"></i> Services</h5>
                    <p class="card-text">Manage services and assessments</p>
                    <a href="{{ route('admin.services.index') }}" class="btn btn-primary">Manage</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><i class="bi bi-images"></i> Portfolio</h5>
                    <p class="card-text">Manage portfolio/gallery images</p>
                    <a href="{{ route('admin.portfolio.index') }}" class="btn btn-primary">Manage</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><i class="bi bi-people"></i> Team</h5>
                    <p class="card-text">Manage team members</p>
                    <a href="{{ route('admin.team.index') }}" class="btn btn-primary">Manage</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><i class="bi bi-chat-quote"></i> Testimonials</h5>
                    <p class="card-text">Manage customer testimonials</p>
                    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-primary">Manage</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><i class="bi bi-envelope"></i> Contact</h5>
                    <p class="card-text">Manage contact info & messages</p>
                    <a href="{{ route('admin.contact.index') }}" class="btn btn-primary">Manage</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><i class="bi bi-question-circle"></i> Why Choose Us</h5>
                    <p class="card-text">Manage Why Choose Us section</p>
                    <a href="{{ route('admin.why-choose-us.index') }}" class="btn btn-primary">Manage</a>
                </div>
            </div>
        </div>
</div>
@endsection
