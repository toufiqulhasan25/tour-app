@extends('user.master')

@section('body')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow border-0 rounded-4 overflow-hidden">
                {{-- Form Header --}}
                <div class="card-header bg-primary text-white py-4 px-4 border-0">
                    <div class="d-flex align-items-center">
                        <div class="bg-white text-primary rounded-3 p-2 me-3">
                            <i class="fas fa-bus-alt fa-lg"></i>
                        </div>
                        <div>
                            <h4 class="mb-0 fw-bold">Tour Registration Form</h4>
                            <small class="opacity-75">NIYD Annual Tour 2026 - registration portal</small>
                        </div>
                    </div>
                </div>

                <div class="card-body p-4 p-md-5 bg-white">
                    {{-- Alert Messages --}}
                    @if(session('message'))
                        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
                            <i class="fas fa-check-circle me-2"></i> {{ session('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger border-0 shadow-sm mb-4">
                            <ul class="mb-0 small">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{route('tourist.store')}}" method="POST">
                        @csrf
                        
                        {{-- 1. Basic Information --}}
                        <div class="d-flex align-items-center mb-4">
                            <h6 class="text-primary fw-bold text-uppercase mb-0 border-start border-primary border-4 ps-2">Basic Information</h6>
                        </div>

                        <div class="row g-4 mb-5">
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-muted text-uppercase">Full Name</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-0"><i class="fas fa-user"></i></span>
                                    <input type="text" name="name" class="form-control bg-light border-0 py-2" value="{{ auth()->user()->name }}" readonly>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-muted text-uppercase">ID / Student ID <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-0"><i class="fas fa-id-card"></i></span>
                                    <input type="text" name="student_id" class="form-control bg-light border-0 py-2" placeholder="Ex: NIYD-26001" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-muted text-uppercase">Phone Number <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-0"><i class="fas fa-phone-alt"></i></span>
                                    <input type="tel" name="phone_number" class="form-control bg-light border-0 py-2" value="{{ auth()->user()->phone }}" placeholder="017XXXXXXXX" required>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label class="form-label small fw-bold text-muted text-uppercase">Blood Group</label>
                                <select name="blood_group" class="form-select bg-light border-0 py-2 shadow-none">
                                    <option value="" selected disabled>Select</option>
                                    @foreach(['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-'] as $group)
                                        <option value="{{ $group }}" {{ auth()->user()->blood_group == $group ? 'selected' : '' }}>{{ $group }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label class="form-label small fw-bold text-muted text-uppercase">Status</label>
                                <input type="text" class="form-control bg-info-subtle border-0 text-info fw-bold py-2" value="Pending Approval" disabled>
                                <input type="hidden" name="status" value="active">
                            </div>
                        </div>

                        {{-- 2. Professional/Academic --}}
                        <div class="row g-5">
                            <div class="col-lg-6">
                                <h6 class="text-primary fw-bold text-uppercase mb-4">Guardian Details</h6>
                                <div class="mb-3">
                                    <label class="form-label small fw-bold text-muted">FATHER'S NAME</label>
                                    <input type="text" name="father_name" class="form-control border-0 bg-light py-2" placeholder="Enter name" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-bold text-muted">MOTHER'S NAME</label>
                                    <input type="text" name="mother_name" class="form-control border-0 bg-light py-2" placeholder="Enter name" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-bold text-muted">EMERGENCY CONTACT <span class="text-danger">*</span></label>
                                    <input type="text" name="emergency_contact" class="form-control border-0 bg-light py-2" placeholder="Guardian's number" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <h6 class="text-primary fw-bold text-uppercase mb-4">Academic/Job Info</h6>
                                <div class="mb-3">
                                    <label class="form-label small fw-bold text-muted">SELECT CATEGORY <span class="text-danger">*</span></label>
                                    <select name="course_id" class="form-select border-0 bg-light py-2" required>
                                        <option value="" selected disabled>Choose Course...</option>
                                        @foreach($courses as $course)
                                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                                        @endforeach
                                    </select>
                                    <small class="text-muted" style="font-size: 11px;">Select 'Teacher' or 'Staff' if not a student.</small>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-bold text-muted">BATCH / DESIGNATION</label>
                                    <input type="text" name="batch" class="form-control border-0 bg-light py-2" placeholder="Ex: Batch-04 or Lecturer" required>
                                </div>
                                <div class="p-3 bg-light rounded shadow-sm border-start border-primary border-4">
                                    <small class="d-block text-muted fw-bold">CURRENT LOGGED IN AS:</small>
                                    <span class="text-dark fw-bold">{{auth()->user()->name}}</span>
                                </div>
                            </div>
                        </div>

                        <hr class="my-5 opacity-10">

                        {{-- 3. Address --}}
                        <h6 class="text-primary fw-bold text-uppercase mb-4">Location Details</h6>
                        <div class="row g-3 mb-5">
                            <div class="col-md-4">
                                <label class="form-label small fw-bold text-muted">DISTRICT</label>
                                <input type="text" name="district" class="form-control border-0 bg-light py-2" placeholder="District name" required>
                            </div>
                            <div class="col-md-8">
                                <label class="form-label small fw-bold text-muted">FULL ADDRESS</label>
                                <input type="text" name="permanent_address" class="form-control border-0 bg-light py-2" placeholder="Village, Post Office, Upazila..." required>
                            </div>
                        </div>

                        {{-- Buttons --}}
                        <div class="d-flex flex-column flex-md-row justify-content-end gap-3 pt-4 border-top">
                            <button type="reset" class="btn btn-light px-4 py-2 fw-bold text-muted">
                                <i class="fas fa-undo me-2"></i>Reset Form
                            </button>
                            <button type="submit" class="btn btn-primary px-5 py-2 fw-bold shadow">
                                <i class="fas fa-check-circle me-2"></i>Complete Registration
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection