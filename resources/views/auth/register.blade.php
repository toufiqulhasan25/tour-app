@extends('landing')

@section('body')
<div class="auth-background flex-grow-1 d-flex flex-column position-relative">
        <div class="auth-overlay"></div>

        <div class="container d-flex justify-content-center py-5 mt-5">
            <div class="glass-card mt-4" style="max-width: 850px; width: 100%; font-family: 'Poppins', sans-serif;">

                <div class="text-center mb-5">
                    <h2 class="fw-bold text-white display-6">Student Registration</h2>
                    <p class="text-white-50">Join our batch and start your journey</p>
                </div>

                <form method="POST" action="{{ route('register') }}"> @csrf

                    <h5 class="fw-bold mb-4 text-uppercase"
                        style="color: #81e6d9; letter-spacing: 2px; font-size: 0.85rem; border-bottom: 1px solid rgba(129, 230, 217, 0.2); padding-bottom: 10px;">
                        <i class="fa fa-user me-2"></i>Basic Information
                    </h5>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-light fw-medium small ps-1">Full Name</label>
                            <input type="text" class="form-control glass-input" name="name" placeholder="Enter full name"
                                required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label text-light fw-medium small ps-1">Phone Number</label>
                            <input type="text" class="form-control glass-input" name="phone" placeholder="017xxxxxxxx"
                                required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-light fw-medium small ps-1">Email Address</label>
                            <input type="email" class="form-control glass-input" name="email"
                                placeholder="email@example.com" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label text-light fw-medium small ps-1">Blood Group</label>
                            <select class="form-control glass-input form-select" name="blood_group">
                                <option value="" selected disabled required>Select Group</option>
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
                    </div>

                    <hr class="border-light opacity-25 my-3">

                    <h5 class="fw-bold mb-4 text-uppercase"
                        style="color: #81e6d9; letter-spacing: 2px; font-size: 0.85rem; border-bottom: 1px solid rgba(129, 230, 217, 0.2); padding-bottom: 10px;">
                        <i class="fa fa-book me-2"></i>Course Details
                    </h5>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-light fw-medium small ps-1">Select Role/Course</label>
                            <select class="form-control glass-input form-select" name="course_id" required>
                                <option value="" selected disabled>-- Choose Role/Course --</option>
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <hr class="border-light opacity-25 my-3">

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-light fw-medium small ps-1">Password</label>
                            <input type="password" 
                                   class="form-control glass-input" 
                                   name="password"
                                   id="password"
                                   placeholder="Create Password" 
                                   required>
                            <div id="password-error" class="small mt-1" style="color: #ff6b6b; display: none;">
                                <i class="fas fa-exclamation-circle me-1"></i> Password must be at least 8 characters.
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label text-light fw-medium small ps-1">Confirm Password</label>
                            <input type="password" class="form-control glass-input" name="password_confirmation"
                                placeholder="Repeat Password" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-adventure w-100 py-3 fw-bold shadow-sm">
                        Register Now
                    </button>

                    <div class="text-center mt-4">
                        <span class="small opacity-75 text-white">Already have an account?</span>
                        <a href="{{ route('login') }}" class="auth-link ms-1">Login here</a>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script>
    document.getElementById('password').addEventListener('input', function() {
        const errorDiv = document.getElementById('password-error');
        
        if (this.value.length > 0 && this.value.length < 8) {
            errorDiv.style.display = 'block';
            this.style.borderColor = '#ff6b6b';
        } else {
            errorDiv.style.display = 'none';
            this.style.borderColor = '';   
        }
    });
    </script>
@endsection
