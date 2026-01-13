@extends('user.master') 

@section('body')
<div class="container col-md-9 py-5">
    
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="text-dark fw-bold m-0 ls-1">My Profile</h2>
            <p class="text-muted small m-0">Personal and Academic Information</p>
        </div>
        <div>
            <a href="{{ route('student.download.pdf', $student->id) }}" class="btn btn-danger btn-sm fw-bold me-2">
                <i class="fas fa-file-pdf me-1"></i> Download PDF
            </a>
            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary btn-sm fw-bold">
                <i class="fas fa-arrow-left me-1"></i> Back
            </a>
        </div>
    </div>

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="card-header bg-white py-4 px-5 border-bottom">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                        style="width: 50px; height: 50px;">
                        <i class="fas fa-user-graduate fa-lg"></i>
                    </div>
                    <div>
                        <h4 class="m-0 fw-bold text-dark">{{ $student->name }}</h4>
                        <span class="badge bg-light text-secondary border mt-1">ID: ST-{{ $student->id + 2024000 }}</span>
                    </div>
                </div>
                <div>
                    @if($student->status == 'active')
                        <span class="badge bg-success-subtle text-success px-3 py-2 fw-bold text-uppercase"><i class="fas fa-check-circle me-1"></i> Active</span>
                    @elseif($student->status == 'pending')
                        <span class="badge bg-warning-subtle text-warning px-3 py-2 fw-bold text-uppercase"><i class="fas fa-clock me-1"></i> Pending</span>
                    @else
                        <span class="badge bg-danger-subtle text-danger px-3 py-2 fw-bold text-uppercase"><i class="fas fa-times-circle me-1"></i> Rejected</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="card-body p-5 bg-white">
            <div class="mb-5">
                <h6 class="text-uppercase text-primary fw-bold small ls-1 mb-4 border-bottom pb-2">Basic Information & Address</h6>
                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="small text-muted fw-bold text-uppercase">Full Name</label>
                        <div class="fs-6 text-dark fw-semibold mt-1">{{ $student->name }}</div>
                    </div>
                    <div class="col-md-6">
                        <label class="small text-muted fw-bold text-uppercase">Phone Number</label>
                        <div class="fs-6 text-dark fw-semibold mt-1">{{ $student->phone_number }}</div>
                    </div>
                    <div class="col-md-6">
                        <label class="small text-muted fw-bold text-uppercase">Village</label>
                        <div class="fs-6 text-dark fw-semibold mt-1">{{ $student->permanent_address ?? 'N/A' }}</div>
                    </div>
                    <div class="col-md-4">
                        <label class="small text-muted fw-bold text-uppercase">District</label>
                        <div class="fs-6 text-dark fw-semibold mt-1">{{ $student->district }}</div>
                    </div>
                    <div class="col-md-1">
                        <label class="small text-muted fw-bold text-uppercase">Blood Group</label>
                        <div class="fs-6 text-dark fw-semibold mt-1">
                            <span class="badge bg-danger-subtle text-danger px-3">{{ $student->blood_group ?? 'N/A' }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-5">
                <h6 class="text-uppercase text-primary fw-bold small ls-1 mb-4 border-bottom pb-2">Guardian Information</h6>
                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="small text-muted fw-bold text-uppercase">Father's Name</label>
                        <div class="fs-6 text-dark fw-semibold mt-1">{{ $student->father_name }}</div>
                    </div>
                    <div class="col-md-6">
                        <label class="small text-muted fw-bold text-uppercase">Mother's Name</label>
                        <div class="fs-6 text-dark fw-semibold mt-1">{{ $student->mother_name }}</div>
                    </div>
                    <div class="col-12">
                        <label class="small text-muted fw-bold text-uppercase">Emergency Contact</label>
                        <div class="fs-6 text-dark fw-semibold mt-1">{{ $student->emergency_contact }}</div>
                    </div>
                </div>
            </div>

            <div class="mb-0">
                <h6 class="text-uppercase text-primary fw-bold small ls-1 mb-4 border-bottom pb-2">Academic Details</h6>
                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="small text-muted fw-bold text-uppercase">Enrolled Course</label>
                        <div class="fs-6 text-primary fw-bold mt-1">{{ $student->course->name ?? 'Not Assigned' }}</div>
                    </div>
                    <div class="col-md-6">
                        <label class="small text-muted fw-bold text-uppercase">Batch</label>
                        <div class="fs-6 text-dark fw-semibold mt-1">{{ $student->batch ?? 'Assigning Soon' }}</div>
                    </div>
                </div>
            </div>
            
            @if($student->remarks)
            <div class="mt-5 p-4 bg-light rounded-3 border">
                <h6 class="fw-bold text-dark mb-2"><i class="fas fa-info-circle me-2 text-primary"></i>Note from Admin:</h6>
                <p class="text-muted m-0 italic">"{{ $student->remarks }}"</p>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection