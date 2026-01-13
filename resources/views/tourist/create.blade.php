@extends('admin.master')

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow border-0 rounded-4 overflow-hidden">
                <div class="card-header bg-brand-primary py-3 px-4">
                    <h5 class="mb-0 text-white fw-bold">
                        <i class="fas fa-user-plus me-2"></i> Registration Form
                    </h5>
                </div>

                <div class="card-body p-4 p-md-5 bg-white">
                    <form action="{{ route('tourist.store') }}" method="POST">
                        @csrf
                        
                        @if(session('message'))
                        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
                            <i class="fas fa-check-circle me-2"></i> {{ session('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        <div class="d-flex align-items-center mb-4">
                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 32px; height: 32px;">
                                <i class="fas fa-info fa-sm"></i>
                            </div>
                            <h6 class="text-primary fw-bold text-uppercase mb-0 ls-1">Basic Information</h6>
                        </div>

                        <div class="row g-4 mb-5">
                            <div class="col-md-6">
                                <label class="form-label fw-bold text-dark">Full Name <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0"><i class="fas fa-user text-muted"></i></span>
                                    <input type="text" name="name" class="form-control border-start-0 ps-0 shadow-none bg-light" placeholder="Enter full name" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold text-dark">ID Number / Student ID <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0"><i class="fas fa-id-card text-muted"></i></span>
                                    <input type="text" name="student_id" class="form-control border-start-0 ps-0 shadow-none bg-light" placeholder="Ex: ST-2024001 or Staff-01" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-bold text-dark">Phone Number <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0"><i class="fas fa-phone-alt text-muted"></i></span>
                                    <input type="text" name="phone_number" class="form-control border-start-0 ps-0 shadow-none bg-light" placeholder="017XXXXXXXX" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-bold text-dark">Blood Group</label>
                                <select name="blood_group" class="form-select bg-light shadow-none">
                                    <option value="" selected disabled>Select Group</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-bold text-dark">Status</label>
                                <div class="bg-light p-2 rounded border px-3 text-muted fw-semibold">
                                    <i class="fas fa-clock me-2"></i> Applied
                                    <input type="hidden" name="status" value="Applied">
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mb-4">
                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 32px; height: 32px;">
                                <i class="fas fa-graduation-cap fa-sm"></i>
                            </div>
                            <h6 class="text-primary fw-bold text-uppercase mb-0 ls-1">Category & Role</h6>
                        </div>

                        <div class="row g-4 mb-5">
                            <div class="col-md-6">
                                <label class="form-label fw-bold text-dark">Select Course/Category <span class="text-danger">*</span></label>
                                <select name="course_id" class="form-select bg-light shadow-none" required>
                                    <option value="" selected disabled>Choose category...</option>
                                    @foreach($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                                    @endforeach
                                </select>
                                <small class="text-muted">Select 'Teacher' or 'Staff' for non-student registration.</small>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold text-dark">Batch / Designation</label>
                                <input type="text" name="batch" class="form-control bg-light shadow-none" placeholder="Ex: Batch-04 or Lecturer">
                            </div>
                        </div>

                        <div class="d-flex align-items-center mb-4">
                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 32px; height: 32px;">
                                <i class="fas fa-map-marker-alt fa-sm"></i>
                            </div>
                            <h6 class="text-primary fw-bold text-uppercase mb-0 ls-1">Location Details</h6>
                        </div>

                        <div class="row g-4">
                            <div class="col-md-4">
                                <label class="form-label fw-bold text-dark">District</label>
                                <input type="text" name="district" class="form-control bg-light shadow-none" placeholder="Enter District">
                            </div>

                            <div class="col-md-8">
                                <label class="form-label fw-bold text-dark">Address Details</label>
                                <textarea name="permanent_address" class="form-control bg-light shadow-none" rows="2" placeholder="Village, Post Office, Thana..."></textarea>
                            </div>
                        </div>

                        <hr class="my-5 opacity-10">

                        <div class="d-flex justify-content-between align-items-center">
                            <button type="reset" class="btn btn-link text-muted text-decoration-none">
                                <i class="fas fa-undo me-1"></i> Reset Form
                            </button>
                            <button type="submit" class="btn btn-brand-primary px-5 py-2 rounded-pill shadow fw-bold">
                                <i class="fas fa-save me-2"></i> Complete Registration
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection