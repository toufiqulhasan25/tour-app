@extends('user.master')
@section('body')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-header bg-primary text-white py-3">
                    <h4 class="mb-0"><i class="fas fa-user-plus me-2"></i>Student Registration Form</h4>
                </div>

                <div class="card-body p-4">
                    <form action="{{route('tourist.store')}}" method="POST">
                        <p class="text-center text-success">{{session('message')}}</p>
                        @csrf
                        <h6 class="text-primary fw-bold text-uppercase mb-3">
                            <i class="fas fa-info-circle me-1"></i> Basic Information
                        </h6>
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Full Name <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="fas fa-user"></i></span>
                                    <input type="text" name="name" class="form-control" placeholder="Enter full name" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Student ID <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="fas fa-id-card"></i></span>
                                    <input type="text" name="student_id" class="form-control" placeholder="Ex: ST-2024001" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Phone Number <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="fas fa-phone-alt"></i></span>
                                    <input type="text" name="phone_number" class="form-control" placeholder="017xxxxxxxx" required>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label class="form-label fw-semibold">Blood Group</label>
                                <select name="blood_group" class="form-select">
                                    <option value="" selected disabled>Select</option>
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

                            <div class="col-md-3">
                                <label class="form-label fw-semibold">Status</label>

                                <select class="form-select" disabled>
                                    <option selected>Applied</option>
                                </select>

                                <input type="hidden" name="status" value="Applied">
                            </div>


                        </div>

                        <h6 class="text-primary fw-bold text-uppercase mb-3 mt-4">
                            <i class="fas fa-users me-1"></i> Guardian Information
                        </h6>
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Father's Name</label>
                                <input type="text" name="father_name" class="form-control" placeholder="Enter father's name">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Mother's Name</label>
                                <input type="text" name="mother_name" class="form-control" placeholder="Enter mother's name">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Emergency Contact</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="fas fa-phone"></i></span>
                                    <input type="text" name="emergency_contact" class="form-control" placeholder="Guardian's phone">
                                </div>
                            </div>
                        </div>

                        <h6 class="text-primary fw-bold text-uppercase mb-3 mt-4">
                            <i class="fas fa-graduation-cap me-1"></i> Course Details
                        </h6>
                        <div class="row g-3 mb-4">
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Select Course <span class="text-danger">*</span></label>
                                <select name="course_id" class="form-select" required>
                                    <option value="" selected disabled>Choose Course...</option>
                                    @foreach($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Batch Name</label>
                                <input type="text" name="batch" class="form-control" placeholder="Ex: Batch-12">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-semibold">User</label>
                                <input type="text" name="user_id" class="form-control" value="{{$user->name}}" disabled>
                            </div>
                        </div>

                        <h6 class="text-primary fw-bold text-uppercase mb-3 mt-4">
                            <i class="fas fa-map-marker-alt me-1"></i> Address
                        </h6>
                        <div class="row g-3 mb-4">
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">District</label>
                                <input type="text" name="district" class="form-control">

                            </div>

                            <div class="col-md-8">
                                <label class="form-label fw-semibold">Permanent Address</label>
                                <textarea name="permanent_address" class="form-control" rows="2" placeholder="Village, Post Office, Thana..."></textarea>
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-5">
                            <button type="reset" class="btn btn-light border px-4">
                                <i class="fas fa-undo me-1"></i> Reset
                            </button>
                            <button type="submit" class="btn btn-primary px-5 fw-bold shadow">
                                <i class="fas fa-save me-1"></i> Save Data
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection