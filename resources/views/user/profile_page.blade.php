@extends('user.master')

@section('body')
<div class="niyd-profile-view py-4"> 
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                
                
                <div class="card-header border-0 py-5 text-center text-white" 
                     style="background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);">
                    <div class="mb-3">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white text-primary rounded-circle shadow-sm" 
                             style="width: 100px; height: 100px;">
                            <i class="fas fa-user fa-3x"></i>
                        </div>
                    </div>
                    <h3 class="fw-bold mb-0 text-white">{{ $user->name }}</h3>
                    <span class="badge bg-white text-primary rounded-pill px-4 py-2 mt-2 fw-bold text-uppercase shadow-sm">
                        {{ $user->course->name ?? 'Member' }}
                    </span>
                </div>

                
                <div class="card-body p-4 p-md-5 bg-white">
                    <div class="d-flex align-items-center mb-4">
                        <div class="p-2 bg-light rounded-3 me-3">
                            <i class="fas fa-id-card text-primary fs-4"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-0">Account Information</h5>
                    </div>

                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="small text-muted d-block text-uppercase fw-bold mb-1">Full Name</label>
                            <div class="p-3 bg-light rounded-3 fw-semibold text-dark">{{ $user->name }}</div>
                        </div>
                        
                        <div class="col-md-6">
                            <label class="small text-muted d-block text-uppercase fw-bold mb-1">Email Address</label>
                            <div class="p-3 bg-light rounded-3 fw-semibold text-dark">{{ $user->email }}</div>
                        </div>

                        <div class="col-md-6">
                            <label class="small text-muted d-block text-uppercase fw-bold mb-1">Phone Number</label>
                            <div class="p-3 bg-light rounded-3 fw-semibold text-dark">{{ $user->phone ?? 'Not Provided' }}</div>
                        </div>

                        <div class="col-md-6">
                            <label class="small text-muted d-block text-uppercase fw-bold mb-1">Blood Group</label>
                            <div class="p-3 bg-light rounded-3 fw-semibold">
                                <span class="badge bg-danger px-3">{{ $user->blood_group ?? 'N/A' }}</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="small text-muted d-block text-uppercase fw-bold mb-1">Registered As</label>
                            <div class="p-3 bg-light rounded-3">
                                <span class="text-success fw-bold">
                                    <i class="fas fa-check-circle me-1"></i> {{ $user->course->name ?? 'General User' }}
                                </span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="small text-muted d-block text-uppercase fw-bold mb-1">Member Since</label>
                            <div class="p-3 bg-light rounded-3 fw-semibold text-dark">{{ $user->created_at->format('d M, Y') }}</div>
                        </div>
                    </div>

                    <div class="mt-5 pt-3 border-top d-flex gap-2">
                        <button type="button" class="btn btn-primary px-4 py-2 fw-bold rounded-3 shadow-sm" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                            <i class="fas fa-edit me-2"></i> Edit Profile
                        </button>
                        @if($user->role_id == 1)
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-dark px-4 py-2 fw-bold rounded-3">
                                <i class="fas fa-lock me-2"></i> Admin Panel
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="editProfileModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4">
            <div class="modal-header text-white border-0" style="background: #4e73df;">
                <h5 class="modal-title fw-bold">Update Profile Info</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('user.profile.update') }}" method="POST">
                @csrf
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label fw-bold small text-uppercase">Full Name</label>
                        <input type="text" name="name" class="form-control bg-light border-0 py-2" value="{{ $user->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold small text-uppercase">Phone Number</label>
                        <input type="text" name="phone" class="form-control bg-light border-0 py-2" value="{{ $user->phone }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold small text-uppercase">Blood Group</label>
                        <select name="blood_group" class="form-select bg-light border-0 py-2">
                            @foreach(['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-'] as $group)
                                <option value="{{ $group }}" {{ $user->blood_group == $group ? 'selected' : '' }}>{{ $group }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer bg-light border-0 rounded-bottom-4">
                    <button type="button" class="btn btn-link text-muted fw-bold text-decoration-none" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary px-4 fw-bold rounded-3">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection