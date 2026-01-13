@extends('user.master')

@section('body')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                {{-- Form Header --}}
                <div class="card-header bg-brand-primary text-white py-4 px-4 border-0">
                    <div class="d-flex align-items-center">
                        <div class="bg-white text-brand-primary rounded-3 p-2 me-3 shadow-sm">
                            <i class="fas fa-bus-alt fa-lg"></i>
                        </div>
                        <div>
                            <h4 class="mb-0 fw-bold">Tour Registration Form</h4>
                            <small class="opacity-75">Fill in the details below to join the NIYD Annual Tour 2026</small>
                        </div>
                    </div>
                </div>

                <div class="card-body p-4 p-md-5 bg-white">
                    {{-- Error/Success Message --}}
                    @if(session('message'))
                        <div class="alert alert-success alert-dismissible fade show rounded-3 border-0 shadow-sm" role="alert">
                            <i class="fas fa-check-circle me-2"></i> {{ session('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger rounded-3 border-0 shadow-sm">
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
                        <div class="d-flex align-items-center mb-4 mt-2">
                            <div class="bg-light p-2 rounded-circle me-2">
                                <i class="fas fa-info-circle text-brand-primary"></i>
                            </div>
                            <h6 class="text-brand-primary fw-bold text-uppercase mb-0 ls-1">Basic Information</h6>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-muted">FULL NAME <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-0"><i class="fas fa-user text-muted"></i></span>
                                    <input type="text" name="name" class="form-control bg-light border-0" value="{{ auth()->user()->name }}" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-muted">ID NUMBER (STUDENT/STAFF) <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-0"><i class="fas fa-id-card text-muted"></i></span>
                                    <input type="text" name="student_id" class="form-control bg-light border-0" placeholder="Ex: NIYD-26001" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-muted">PHONE NUMBER <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-0"><i class="fas fa-phone-alt text-muted"></i></span>
                                    <input type="tel" name="phone_number" class="form-control bg-light border-0" value="{{ auth()->user()->phone }}" placeholder="017XXXXXXXX" required>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label class="form-label small fw-bold text-muted">BLOOD GROUP</label>
                                <select name="blood_group" class="form-select bg-light border-0 shadow-none">
                                    <option value="" selected disabled>Select</option>
                                    @foreach(['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-'] as $group)
                                        <option value="{{ $group }}" {{ auth()->user()->blood_group == $group ? 'selected' : '' }}>{{ $group }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label class="form-label small fw-bold text-muted">APPLICATION STATUS</label>
                                <input type="text" class="form-control bg-success-subtle border-0 text-success fw-bold" value="Applying Now" disabled>
                                <input type="hidden" name="status" value="Pending">
                            </div>
                        </div>

                        <hr class="my-5 opacity-5">

                        {{-- 2. Guardian & Academic Section --}}
                        <div class="row g-5">
                            <div class="col-lg-6">
                                <div class="d-flex align-items-center mb-4">
                                    <div class="bg-light p-2 rounded-circle me-2">
                                        <i class="fas fa-users text-brand-primary"></i>
                                    </div>
                                    <h6 class="text-brand-primary fw-bold text-uppercase mb-0 ls-1">Guardian Information</h6>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-bold text-muted">FATHER'S NAME</label>
                                    <input type="text" name="father_name" class="form-control border-0 bg-light py-2" placeholder="Enter father's name">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-bold text-muted">MOTHER'S NAME</label>
                                    <input type="text" name="mother_name" class="form-control border-0 bg-light py-2" placeholder="Enter mother's name">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-bold text-muted">EMERGENCY CONTACT <span class="text-danger">*</span></label>
                                    <input type="text" name="emergency_contact" class="form-control border-0 bg-light py-2" placeholder="Guardian's phone number" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="d-flex align-items-center mb-4">
                                    <div class="bg-light p-2 rounded-circle me-2">
                                        <i class="fas fa-graduation-cap text-brand-primary"></i>
                                    </div>
                                    <h6 class="text-brand-primary fw-bold text-uppercase mb-0 ls-1">Academic / Work Details</h6>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-bold text-muted">DEPARTMENT / COURSE <span class="text-danger">*</span></label>
                                    <select name="course_id" class="form-select border-0 bg-light py-2" required>
                                        <option value="" selected disabled>Choose Course...</option>
                                        @foreach($courses as $course)
                                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-bold text-muted">BATCH / DESIGNATION</label>
                                    <input type="text" name="batch" class="form-control border-0 bg-light py-2" placeholder="Ex: Batch-04 / Senior Lecturer">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-bold text-muted">CURRENT USER</label>
                                    <input type="text" class="form-control border-0 bg-light-subtle py-2" value="{{auth()->user()->name}}" readonly>
                                </div>
                            </div>
                        </div>

                        <hr class="my-5 opacity-5">

                        {{-- 3. Address Section --}}
                        <div class="d-flex align-items-center mb-4">
                            <div class="bg-light p-2 rounded-circle me-2">
                                <i class="fas fa-map-marker-alt text-brand-primary"></i>
                            </div>
                            <h6 class="text-brand-primary fw-bold text-uppercase mb-0 ls-1">Contact Address</h6>
                        </div>
                        <div class="row g-3 mb-4">
                            <div class="col-md-4">
                                <label class="form-label small fw-bold text-muted">DISTRICT</label>
                                <input type="text" name="district" class="form-control border-0 bg-light py-2" placeholder="Ex: Dhaka">
                            </div>
                            <div class="col-md-8">
                                <label class="form-label small fw-bold text-muted">DETAILED ADDRESS</label>
                                <input type="text" name="permanent_address" class="form-control border-0 bg-light py-2" placeholder="House No, Road No, Area...">
                            </div>
                        </div>

                        {{-- Form Actions --}}
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-5 pt-4 border-top">
                            <button type="reset" class="btn btn-light px-4 rounded-pill fw-bold text-muted">
                                <i class="fas fa-redo me-2"></i>Reset
                            </button>
                            <button type="submit" class="btn btn-brand-primary px-5 fw-bold rounded-pill shadow-lg">
                                <i class="fas fa-check-circle me-2"></i>Confirm Registration
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection