@extends('admin.master')

@section('content')
<div class="container col-md-9 py-5">

    {{-- সেশন মেসেজ ডিসপ্লে সেকশন --}}
    <div class="message-container">
        @if(session('success'))
            <div class="alert alert-success border-0 shadow-sm rounded-3 d-flex align-items-center mb-4" role="alert">
                <i class="fas fa-check-circle me-3 fs-4"></i>
                <div>
                    <strong class="d-block">Success!</strong>
                    <span class="small">{{ session('success') }}</span>
                </div>
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger border-0 shadow-sm rounded-3 d-flex align-items-center mb-4" role="alert">
                <i class="fas fa-exclamation-triangle me-3 fs-4"></i>
                <div>
                    <strong class="d-block">Update Failed!</strong>
                    <ul class="mb-0 small ps-0" style="list-style: none;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="text-dark fw-bold m-0 ls-1">Student Profile</h2>
            <p class="text-muted small m-0">View and manage information for {{ $student->name }}</p>
        </div>
        <div>
            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary me-2 btn-sm fw-bold shadow-sm">
                <i class="fas fa-arrow-left me-1"></i> Back
            </a>
            <a href="{{ route('tourist.pdf', $student->id) }}" class="btn btn-danger btn-sm fw-bold shadow-sm text-white">
                <i class="fas fa-file-pdf me-1"></i> Download PDF
            </a>
        </div>
    </div>

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="card-header bg-white py-4 px-5 border-bottom">
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
        </div>

        <div class="card-body p-5 bg-white">
            
            <div class="mb-5">
                <h6 class="text-uppercase text-primary fw-bold small ls-1 mb-4 border-bottom pb-2">Basic Information</h6>
                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="small text-muted fw-bold text-uppercase">Full Name</label>
                        <div class="fs-6 text-dark fw-semibold mt-1">{{ $student->name }}</div>
                    </div>
                    <div class="col-md-6">
                        <label class="small text-muted fw-bold text-uppercase">Phone</label>
                        <div class="fs-6 text-dark fw-semibold mt-1">{{ $student->phone_number }}</div>
                    </div>
                    <div class="col-md-6">
                        <label class="small text-muted fw-bold text-uppercase">Blood Group</label>
                        <div class="fs-6 text-dark fw-semibold mt-1">
                            <span class="badge bg-danger-subtle text-danger px-3">{{ $student->blood_group ?? 'N/A' }}</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="small text-muted fw-bold text-uppercase">District</label>
                        <div class="fs-6 text-dark fw-semibold mt-1">{{ $student->district }}</div>
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

            <div class="mb-5">
                <h6 class="text-uppercase text-primary fw-bold small ls-1 mb-4 border-bottom pb-2">Academic Details</h6>
                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="small text-muted fw-bold text-uppercase">Enrolled Course</label>
                        <div class="fs-6 text-primary fw-bold mt-1">{{ $student->course->name ?? 'Not Assigned' }}</div>
                    </div>
                    <div class="col-md-6">
                        <label class="small text-muted fw-bold text-uppercase">Batch</label>
                        <div class="fs-6 text-dark fw-semibold mt-1">{{ $student->batch }}</div>
                    </div>
                </div>
            </div>

            <form action="{{ route('student.update', $student->id) }}" method="POST" class="bg-light rounded-3 p-4 border shadow-sm">
                @csrf
                @method('PUT') 

                <h6 class="fw-bold text-dark mb-3"><i class="fas fa-cog me-2 text-primary"></i>Administrative Control</h6>

                <div class="mb-4">
                    <label class="small text-muted fw-bold text-uppercase mb-2">Internal Remarks</label>
                    <textarea name="remarks" class="form-control border-0 shadow-sm" rows="3"
                        placeholder="Add administrative notes..." style="resize: none;">{{ $student->remarks }}</textarea>
                </div>

                <div class="row align-items-center">
                    <div class="col-md-8">
                        <div class="d-flex align-items-center">
                            <div class="me-3">
                                <label class="small text-muted fw-bold text-uppercase d-block mb-1">Account Status</label>
                                <select class="form-select form-select-sm fw-bold border-0 shadow-sm" name="status" style="width: 160px; height: 40px;">
                                    <option value="active" {{ $student->status == 'active' ? 'selected' : '' }}>🟢 Active</option>
                                    <option value="pending" {{ $student->status == 'pending' ? 'selected' : '' }}>🟡 Pending</option>
                                    <option value="rejected" {{ $student->status == 'rejected' ? 'selected' : '' }}>🔴 Rejected</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-end">
                        <button type="submit" class="btn btn-primary fw-bold px-4 shadow">
                            <i class="fas fa-save me-1"></i> Update Profile
                        </button>
                    </div>
                </div>
            </form>
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