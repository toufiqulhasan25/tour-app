@extends('admin.master')

@section('content')
<div class="container-fluid px-4 py-4">

    <div class="message-container">
        @if(session('success'))
            <div class="alert alert-success border-0 shadow-sm rounded-3 d-flex align-items-center mb-4 alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-3 fs-4 text-success"></i>
                <div>
                    <strong class="d-block">Success!</strong>
                    <span class="small">{{ session('success') }}</span>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger border-0 shadow-sm rounded-3 d-flex align-items-center mb-4 alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-triangle me-3 fs-4 text-danger"></i>
                <div>
                    <strong class="d-block">Update Failed!</strong>
                    <ul class="mb-0 small ps-0" style="list-style: none;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
        <div>
            <h2 class="text-dark fw-bold m-0 ls-1">Student Profile</h2>
            <p class="text-muted small m-0">View and manage information for <strong>{{ $student->name }}</strong></p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ url()->previous() }}" class="btn btn-white btn-sm fw-bold shadow-sm border text-secondary px-3">
                <i class="fas fa-arrow-left me-1"></i> Back
            </a>
            <a href="{{ route('tourist.pdf', $student->id) }}" class="btn btn-danger btn-sm fw-bold shadow-sm text-white px-3">
                <i class="fas fa-file-pdf me-1"></i> Download PDF
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-4">
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-body text-center p-5">
                    <div class="bg-primary-subtle text-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3 shadow-sm" style="width: 100px; height: 100px;">
                        <i class="fas fa-user-graduate fa-3x"></i>
                    </div>
                    <h4 class="fw-bold text-dark mb-1">{{ $student->name }}</h4>
                    <span class="badge bg-light text-primary border px-3 py-2 rounded-pill mb-3">ID: ST-{{ $student->id + 2024000 }}</span>
                    
                    <div class="mt-3 py-3 border-top border-bottom">
                        <div class="row">
                            <div class="col-6 border-end">
                                <small class="text-muted d-block">Course</small>
                                <span class="fw-bold text-dark">{{ $student->course->name ?? 'N/A' }}</span>
                            </div>
                            <div class="col-6">
                                <small class="text-muted d-block">Batch</small>
                                <span class="fw-bold text-dark">{{ $student->batch }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-8">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">
                <div class="card-body p-4 p-md-5 bg-white">
                    
                    <div class="mb-5">
                        <h6 class="text-uppercase text-primary fw-bold small ls-1 mb-4 border-bottom pb-2">
                            <i class="fas fa-info-circle me-2"></i>Basic Information
                        </h6>
                        <div class="row g-4">
                            <div class="col-sm-6">
                                <label class="small text-muted fw-bold text-uppercase">Phone Number</label>
                                <div class="fs-6 text-dark fw-semibold mt-1">{{ $student->phone_number }}</div>
                            </div>
                            <div class="col-sm-6">
                                <label class="small text-muted fw-bold text-uppercase">Blood Group</label>
                                <div class="mt-1">
                                    <span class="badge bg-danger px-3">{{ $student->blood_group ?? 'N/A' }}</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="small text-muted fw-bold text-uppercase">District</label>
                                <div class="fs-6 text-dark fw-semibold mt-1">{{ $student->district }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-5">
                        <h6 class="text-uppercase text-primary fw-bold small ls-1 mb-4 border-bottom pb-2">
                            <i class="fas fa-users me-2"></i>Guardian Information
                        </h6>
                        <div class="row g-4">
                            <div class="col-sm-6">
                                <label class="small text-muted fw-bold text-uppercase">Father's Name</label>
                                <div class="fs-6 text-dark fw-semibold mt-1">{{ $student->father_name }}</div>
                            </div>
                            <div class="col-sm-6">
                                <label class="small text-muted fw-bold text-uppercase">Mother's Name</label>
                                <div class="fs-6 text-dark fw-semibold mt-1">{{ $student->mother_name }}</div>
                            </div>
                            <div class="col-12">
                                <label class="small text-muted fw-bold text-uppercase">Emergency Contact</label>
                                <div class="fs-6 text-dark fw-semibold mt-1 bg-light p-2 rounded border-start border-3 border-danger">
                                    <i class="fas fa-phone-alt me-2 text-danger small"></i>{{ $student->emergency_contact }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('student.update', $student->id) }}" method="POST" class="bg-light rounded-4 p-4 border shadow-sm">
                        @csrf
                        @method('PUT') 

                        <h6 class="fw-bold text-dark mb-4"><i class="fas fa-user-shield me-2 text-primary"></i>Administrative Control</h6>

                        <div class="mb-4">
                            <label class="small text-muted fw-bold text-uppercase mb-2">Internal Remarks</label>
                            <textarea name="remarks" class="form-control border-0 shadow-sm" rows="3"
                                placeholder="Add administrative notes here..." style="resize: none; border-radius: 10px;">{{ $student->remarks }}</textarea>
                        </div>

                        <div class="row align-items-end g-3">
                            <div class="col-md-6">
                                <label class="small text-muted fw-bold text-uppercase d-block mb-2">Account Status</label>
                                <select class="form-select fw-bold border-0 shadow-sm py-2" name="status" id="statusSelect">
                                    <option value="active" {{ $student->status == 'active' ? 'selected' : '' }}>🟢 Active</option>
                                    <option value="pending" {{ $student->status == 'pending' ? 'selected' : '' }}>🟡 Pending</option>
                                    <option value="rejected" {{ $student->status == 'rejected' ? 'selected' : '' }}>🔴 Rejected</option>
                                </select>
                            </div>
                            <div class="col-md-6 text-md-end">
                                <button type="submit" class="btn btn-brand-primary fw-bold px-4 py-2 shadow-sm rounded-pill w-100 w-md-auto">
                                    <i class="fas fa-save me-2"></i> Update Profile
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        
        setTimeout(function() {
            let alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                let bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000); 
    });
</script>
@endsection