@extends('admin.master')

@section('content')
<div class="container-fluid py-4 py-md-5">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-9">
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                
                <div class="card-header py-5 text-center border-0" 
                     style="background: linear-gradient(45deg, #4e73df, #224abe) !important;">
                    
                    <div class="mb-3 d-flex justify-content-center">
                        <div class="bg-white rounded-circle shadow-lg d-flex align-items-center justify-content-center" 
                             style="width: 110px; height: 110px; border: 5px solid rgba(255,255,255,0.3);">
                            <span class="display-4 fw-bold" style="color: #4e73df !important; line-height: 1;">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </span>
                        </div>
                    </div>

                    <h3 class="fw-bold mb-1" style="color: #ffffff !important;">{{ $user->name }}</h3>
                    
                    <div class="mt-2">
                        <span class="badge rounded-pill px-4 py-2 fw-bold text-uppercase shadow-sm" 
                              style="background-color: #ffffff !important; color: #4e73df !important; font-size: 0.8rem;">
                            <i class="fas fa-user-tag me-1"></i> {{ $user->course->name ?? 'Student / Member' }}
                        </span>
                    </div>
                </div>

                <div class="card-body p-4 p-md-5 bg-white">
                    <div class="d-flex align-items-center justify-content-between mb-4 border-bottom pb-3">
                        <h5 class="fw-bold m-0" style="color: #333 !important;">
                            <i class="fas fa-id-card-alt me-2" style="color: #4e73df;"></i> Account Details
                        </h5>
                        <span class="small fw-bold text-muted px-3 py-1 bg-light rounded-pill border">ID: #{{ str_pad($user->id, 5, '0', STR_PAD_LEFT) }}</span>
                    </div>

                    <div class="row g-4">
                        @php
                            $infoFields = [
                                ['label' => 'Full Name', 'value' => $user->name, 'icon' => 'fa-user'],
                                ['label' => 'Email Address', 'value' => $user->email, 'icon' => 'fa-envelope'],
                                ['label' => 'Phone Number', 'value' => $user->phone ?? 'Not Provided', 'icon' => 'fa-phone-alt'],
                                ['label' => 'Member Since', 'value' => $user->created_at->format('d M, Y'), 'icon' => 'fa-calendar-alt'],
                            ];
                        @endphp

                        @foreach($infoFields as $field)
                        <div class="col-12 col-md-6">
                            <label class="small text-muted d-block text-uppercase fw-bold mb-1" style="letter-spacing: 0.5px;">{{ $field['label'] }}</label>
                            <div class="p-3 bg-light rounded-3 d-flex align-items-center border shadow-sm">
                                <i class="fas {{ $field['icon'] }} me-3 text-muted" style="width: 20px;"></i>
                                <span class="fw-bold text-dark">{{ $field['value'] }}</span>
                            </div>
                        </div>
                        @endforeach

                        <div class="col-12 col-md-6">
                            <label class="small text-muted d-block text-uppercase fw-bold mb-1">Blood Group</label>
                            <div class="p-3 bg-light rounded-3 d-flex align-items-center border shadow-sm">
                                <i class="fas fa-tint me-3 text-danger" style="width: 20px;"></i>
                                <span class="badge bg-danger px-3 py-2 rounded-pill fw-bold shadow-sm">
                                    {{ $user->blood_group ?? 'N/A' }}
                                </span>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <label class="small text-muted d-block text-uppercase fw-bold mb-1">Registered As</label>
                            <div class="p-3 bg-success-subtle rounded-3 d-flex align-items-center border border-success shadow-sm">
                                <i class="fas fa-check-circle me-3 text-success" style="width: 20px;"></i>
                                <span class="fw-bold text-success">{{ $user->course->name ?? 'General User' }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="mt-5 d-flex flex-wrap gap-2 pt-4 border-top">
                        <button type="button" class="btn px-4 py-2 fw-bold rounded-pill shadow-sm" 
                                style="background-color: #4e73df !important; color: #fff !important;" 
                                data-bs-toggle="modal" data-bs-target="#editProfileModal">
                            <i class="fas fa-edit me-2"></i> Update Profile
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editProfileModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="modal-header py-3 border-0" style="background-color: #4e73df !important;">
                <h5 class="modal-title fw-bold text-white"><i class="fas fa-pen-nib me-2 small"></i>Update Profile</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('user.profile.update') }}" method="POST">
                @csrf
                <div class="modal-body p-4" style="background-color: #f8f9fc;">
                    <div class="mb-4">
                        <label class="form-label fw-bold small text-muted text-uppercase">Full Name</label>
                        <div class="input-group shadow-sm rounded-3 overflow-hidden">
                            <span class="input-group-text bg-white border-0"><i class="fas fa-user text-muted"></i></span>
                            <input type="text" name="name" class="form-control border-0 py-2 ps-1" value="{{ $user->name }}" required>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bold small text-muted text-uppercase">Phone Number</label>
                        <div class="input-group shadow-sm rounded-3 overflow-hidden">
                            <span class="input-group-text bg-white border-0"><i class="fas fa-phone text-muted"></i></span>
                            <input type="text" name="phone" class="form-control border-0 py-2 ps-1" value="{{ $user->phone }}" placeholder="017XXXXXXXX">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold small text-muted text-uppercase">Blood Group</label>
                        <div class="input-group shadow-sm rounded-3 overflow-hidden">
                            <span class="input-group-text bg-white border-0"><i class="fas fa-tint text-danger"></i></span>
                            <select name="blood_group" class="form-select border-0 py-2 ps-1">
                                @foreach(['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-'] as $group)
                                    <option value="{{ $group }}" {{ $user->blood_group == $group ? 'selected' : '' }}>{{ $group }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-white border-0 py-3">
                    <button type="button" class="btn btn-link text-muted fw-bold text-decoration-none px-4" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn px-4 py-2 fw-bold rounded-pill shadow" style="background-color: #4e73df !important; color: #fff !important;">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection