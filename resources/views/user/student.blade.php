@extends('user.master') 

@section('body')
<div class="niyd-profile-container py-4">
    <div class="row justify-content-center">
        <div class="col-md-11 col-lg-10">
            
            {{-- Header & Breadcrumb --}}
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-1">
                            <li class="breadcrumb-item small"><a href="#" class="text-decoration-none text-muted">Management</a></li>
                            <li class="breadcrumb-item small active">Application Details</li>
                        </ol>
                    </nav>
                    <h2 class="text-dark fw-bold m-0" style="letter-spacing: -0.5px;">User Profile</h2>
                </div>
                <div class="d-flex gap-2">
                    <button onclick="window.print()" class="btn btn-outline-dark btn-sm fw-bold px-3 rounded-3 shadow-sm d-none d-md-inline-block">
                        <i class="fas fa-print me-1"></i> Print
                    </button>
                    <a href="{{ route('student.download.pdf', $student->id) }}" class="btn btn-danger btn-sm fw-bold px-3 rounded-3 shadow-sm">
                        <i class="fas fa-file-pdf me-1"></i> PDF
                    </a>
                    <a href="{{ url()->previous() }}" class="btn btn-light btn-sm border fw-bold px-3 rounded-3 shadow-sm">
                        <i class="fas fa-arrow-left me-1"></i> Back
                    </a>
                </div>
            </div>

            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                {{-- Banner/Header --}}
                <div class="card-header border-0 py-4 px-4 px-md-5 bg-white border-bottom">
                    <div class="d-flex flex-column flex-md-row align-items-center justify-content-between gap-4">
                        <div class="d-flex flex-column flex-md-row align-items-center gap-4">
                            {{-- Avatar --}}
                            <div class="user-avatar shadow-sm d-flex align-items-center justify-content-center text-white"
                                 style="width: 85px; height: 85px; font-size: 2rem; font-weight: 800; background: linear-gradient(45deg, #4e73df, #224abe); border-radius: 20px;">
                                {{ strtoupper(substr($student->name, 0, 1)) }}
                            </div>
                            
                            <div class="text-center text-md-start">
                                <h3 class="fw-bold text-dark mb-1">{{ $student->name }}</h3>
                                <div class="d-flex flex-wrap justify-content-center justify-content-md-start gap-2 mt-2">
                                    @php
                                        $idPrefix = $student->user_type == 'teacher' ? 'TR-' : ($student->user_type == 'staff' ? 'SF-' : 'ST-');
                                    @endphp
                                    <span class="badge bg-light text-dark border px-3 py-2 rounded-pill">ID: {{ $idPrefix }}{{ $student->id + 2026000 }}</span>
                                    <span class="badge px-3 py-2 rounded-pill" style="background-color: #e0e7ff; color: #4338ca; border: 1px solid #c7d2fe;">
                                        Type: {{ ucfirst($student->user_type ?? 'Student') }}
                                    </span>
                                    @if($student->batch)
                                        <span class="badge px-3 py-2 rounded-pill" style="background-color: #f0fdf4; color: #15803d; border: 1px solid #bbf7d0;">
                                            Batch: {{ $student->batch }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        {{-- Status Badge --}}
                        <div class="text-center">
                            @php
                                $statusClasses = [
                                    'active' => 'background-color: #dcfce7; color: #15803d; border-color: #bbf7d0;',
                                    'pending' => 'background-color: #fef9c3; color: #854d0e; border-color: #fef08a;',
                                    'rejected' => 'background-color: #fee2e2; color: #b91c1c; border-color: #fecaca;'
                                ];
                                $currentStatus = strtolower($student->status ?? 'pending');
                                $statusStyle = $statusClasses[$currentStatus] ?? 'background-color: #f3f4f6; color: #374151;';
                            @endphp
                            <span class="badge px-4 py-2 fw-bold text-uppercase border rounded-pill shadow-sm" style="{{ $statusStyle }}">
                                <i class="fas {{ $currentStatus == 'active' ? 'fa-check-circle' : ($currentStatus == 'pending' ? 'fa-clock' : 'fa-times-circle') }} me-1"></i> 
                                {{ $student->status ?? 'Pending' }}
                            </span>
                        </div>
                    </div>
                </div>

                {{-- Card Content --}}
                <div class="card-body p-4 p-md-5 bg-white">
                    
                    {{-- 1. Info Section --}}
                    <div class="row g-5">
                        <div class="col-lg-7">
                            <div class="d-flex align-items-center mb-4">
                                <div style="width: 4px; height: 20px; background: #4e73df; border-radius: 10px;" class="me-2"></div>
                                <h6 class="text-uppercase fw-bold m-0" style="color: #4e73df; letter-spacing: 1px;">Personal Details</h6>
                            </div>
                            
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="small text-muted fw-bold text-uppercase">Email Address</label>
                                    <p class="text-dark fw-semibold border-bottom pb-2">{{ $student->email ?? 'Not Provided' }}</p>
                                </div>
                                <div class="col-md-6">
                                    <label class="small text-muted fw-bold text-uppercase">Phone Number</label>
                                    <p class="text-dark fw-semibold border-bottom pb-2"><i class="fas fa-phone-alt me-2 text-muted small"></i> {{ $student->phone_number }}</p>
                                </div>
                                <div class="col-12">
                                    <label class="small text-muted fw-bold text-uppercase">Permanent Address</label>
                                    <p class="text-dark fw-semibold border-bottom pb-2">{{ $student->permanent_address ?? 'N/A' }}, {{ $student->district }}</p>
                                </div>
                                <div class="col-md-6">
                                    <label class="small text-muted fw-bold text-uppercase">Blood Group</label>
                                    <div><span class="badge bg-danger px-3 py-2 shadow-sm"><i class="fas fa-tint me-1"></i> {{ $student->blood_group ?? 'N/A' }}</span></div>
                                </div>
                                <div class="col-md-6">
                                    <label class="small text-muted fw-bold text-uppercase">Emergency Contact</label>
                                    <p class="text-danger fw-bold"><i class="fas fa-phone-square-alt me-1"></i> {{ $student->emergency_contact }}</p>
                                </div>
                            </div>
                        </div>

                        {{-- 2. Guardian / Professional Section --}}
                        <div class="col-lg-5">
                            <div class="p-4 rounded-4 h-100" style="background-color: #f8fafc; border: 1px solid #e2e8f0;">
                                <div class="d-flex align-items-center mb-4">
                                    <div style="width: 4px; height: 20px; background: #224abe; border-radius: 10px;" class="me-2"></div>
                                    <h6 class="text-uppercase fw-bold m-0" style="color: #224abe; letter-spacing: 1px;">
                                        {{ $student->user_type == 'student' ? 'Guardian Info' : 'Professional Info' }}
                                    </h6>
                                </div>

                                @if($student->user_type == 'student')
                                    <div class="mb-4">
                                        <label class="small text-muted fw-bold text-uppercase">Father's Name</label>
                                        <p class="text-dark fw-semibold mb-3">{{ $student->father_name }}</p>
                                        <label class="small text-muted fw-bold text-uppercase">Mother's Name</label>
                                        <p class="text-dark fw-semibold">{{ $student->mother_name }}</p>
                                    </div>
                                @else
                                    <div class="mb-4">
                                        <label class="small text-muted fw-bold text-uppercase">Department</label>
                                        <p class="text-dark fw-bold mb-3"><i class="fas fa-briefcase me-2 text-muted"></i> {{ $student->department ?? 'General' }}</p>
                                    </div>
                                @endif

                                <div class="pt-3 border-top">
                                    <label class="small text-muted fw-bold text-uppercase">Course/Enrolled In</label>
                                    <p class="text-primary fw-bold fs-5 mb-0">
                                        <i class="fas fa-graduation-cap me-2"></i> {{ $student->course->name ?? 'Not Assigned' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Admin Remarks --}}
                    @if($student->remarks)
                    <div class="mt-5 p-4 rounded-3 border-start border-4 shadow-sm" style="background-color: #fffbeb; border-color: #f59e0b !important;">
                        <h6 class="fw-bold text-dark mb-2 small text-uppercase"><i class="fas fa-comment-dots me-2 text-warning"></i>Admin Remarks:</h6>
                        <p class="text-dark m-0 fst-italic">"{{ $student->remarks }}"</p>
                    </div>
                    @endif
                </div>
                
                <div class="card-footer bg-light py-3 px-5 text-center border-0">
                    <small class="text-muted fw-medium">Official NIYD Tour Document • Registration Date: {{ $student->created_at->format('d M, Y') }}</small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection