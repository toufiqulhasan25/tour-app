
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premium Admin Dashboard | Student List</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
<style>
    /* =========================================
PREMIUM ADMIN DASHBOARD STYLES
========================================= */

    /* 1. FONT & BASIC SETUP */
    :root {
        /* Custom Brand Colors - More Professional than standard Blue */
        --brand-primary: #4e73df;
        --brand-dark: #224abe;
        --brand-accent: #858796;
        --bg-light-gray: #f8f9fc;
        --card-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
        --card-hover-shadow: 0 0.5rem 2rem 0 rgba(58, 59, 69, 0.2);
    }

    body {
        font-family: 'Inter', 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
        background-color: var(--bg-light-gray);
        color: #5a5c69;
        overflow-x: hidden;
    }

    /* Utility Classes */
    .bg-brand-primary { background-color: var(--brand-primary) !important; }
    .text-brand-primary { color: var(--brand-primary) !important; }
    .bg-brand-dark { background-color: var(--brand-dark) !important; }
    .ls-1 { letter-spacing: 1px; }
    .shadow-sm-top { box-shadow: 0 -0.125rem 0.25rem rgba(0,0,0,.075)!important; }

    /* =========================================
       2. SIDEBAR STYLING
    ========================================= */
    #wrapper {
        display: flex;
        width: 100%;
        align-items: stretch;
    }

    #accordionSidebar {
        width: 250px;
        min-height: 100vh;
        transition: all 0.3s;
        background-image: linear-gradient(180deg, var(--brand-dark) 10%, var(--brand-primary) 100%);
        box-shadow: 4px 0 10px rgba(0,0,0,0.1);
        z-index: 100;
    }

    .sidebar-brand {
        height: 4.375rem;
        text-decoration: none;
        font-size: 1.2rem;
        font-weight: 800;
        color: #fff !important;
        letter-spacing: 0.05rem;
    }

    .sidebar-brand-icon i { font-size: 2rem; }

    .sidebar hr.sidebar-divider {
        margin: 0 1rem 1rem;
        border-top: 1px solid rgba(255,255,255,.15);
    }

    .sidebar-heading {
        text-align: left;
        padding: 0 1rem;
        font-weight: 800;
        font-size: .75rem;
        color: rgba(255,255,255,.5);
        text-transform: uppercase;
        letter-spacing: .05rem;
    }

    .sidebar .nav-item .nav-link {
        padding: 0.75rem 1rem;
        color: rgba(255,255,255,.8);
        font-weight: 600;
        font-size: 0.9rem;
    }

    .sidebar .nav-item .nav-link:hover,
    .sidebar .nav-item.active .nav-link {
        color: #fff;
        background: rgba(255,255,255,0.1);
        border-radius: 0.35rem;
        margin: 0 0.5rem;
        width: auto;
    }

    .sidebar .nav-item .nav-link i {
        margin-right: 0.5rem;
        font-size: 1rem;
    }

    /* =========================================
       3. CONTENT AREA & TOPBAR
    ========================================= */
    #content-wrapper {
        width: 100%;
        overflow-x: hidden;
    }

    #content { flex: 1 0 auto; }

    .topbar {
        height: 4.375rem;
        z-index: 50;
    }

    .navbar-search .input-group { width: 25rem; }
    .navbar-search input { font-size: 0.85rem; }
    .topbar .dropdown-toggle::after { display: none; } /* Hide default dropdown arrow */

    .badge-counter {
        position: absolute;
        transform: scale(.7);
        transform-origin: top right;
        top: .25rem;
        right: .25rem;
    }

    /* =========================================
       4. CARDS & DASHBOARD WIDGETS
    ========================================= */
    .card {
        border: none;
        border-radius: 1rem; /* More rounded corners */
        box-shadow: var(--card-shadow);
        transition: all 0.3s ease-in-out;
    }

    /* Hover effect for summary cards */
    .card-hover:hover {
        transform: translateY(-5px);
        box-shadow: var(--card-hover-shadow);
    }

    .border-left-primary { border-left: 0.35rem solid var(--brand-primary) !important; }
    .border-left-success { border-left: 0.35rem solid #1cc88a !important; }
    .border-left-warning { border-left: 0.35rem solid #f6c23e !important; }

    .text-gray-300 { color: #dddfeb!important; }
    .text-gray-800 { color: #5a5c69!important; }

    /* =========================================
       5. PROFESSIONAL TABLE STYLING
    ========================================= */
    .table-responsive { overflow-x: auto; }

    /* Table Header Styling */
    .table thead th {
        background-color: #f8f9fc;
        color: var(--brand-accent);
        font-weight: 700;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        border-bottom: 2px solid #e3e6f0;
        padding-top: 1rem;
        padding-bottom: 1rem;
    }

    /* Table Body Styling */
    .table tbody td {
        vertical-align: middle;
        color: #555;
        font-size: 0.9rem;
        border-bottom: 1px solid #f0f2f5;
        padding-top: 1rem;
        padding-bottom: 1rem;
        transition: all 0.2s;
    }

    /* Subtle striped effect */
    .table-striped-custom tbody tr:nth-of-type(odd) {
        background-color: rgba(0,0,0,.015);
    }

    .table-hover tbody tr:hover {
        background-color: rgba(78, 115, 223, 0.05); /* Very subtle primary color hover */
    }

    /* Avatar image in table */
    .avatar-sm img {
        width: 45px;
        height: 45px;
        object-fit: cover;
        border: 2px solid #fff;
    }

    /* Custom Action Buttons */
    .btn-white {
        background-color: #fff;
        border-color: #e3e6f0;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
    }
    .btn-white:hover {
        background-color: #f8f9fc;
        border-color: #d1d3e2;
    }

    /* Pagination Styling */
    .page-link:focus { box-shadow: none; }
    .page-item.active .page-link { z-index: 3; color: #fff; background-color: var(--brand-primary); border-color: var(--brand-primary); }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        #accordionSidebar {
            width: 90px; /* Collapsed sidebar on mobile */
        }
        #accordionSidebar .sidebar-brand-text,
        #accordionSidebar .sidebar-heading,
        #accordionSidebar .nav-link span {
            display: none;
        }
        #accordionSidebar .nav-link {
            text-align: center;
            padding: 1rem 0.5rem;
        }
        #accordionSidebar .nav-link i {
            margin-right: 0;
            font-size: 1.2rem;
        }
        .topbar .navbar-search { display: none; }
    }
</style>

<div id="wrapper">

    <ul class="navbar-nav bg-brand-dark sidebar accordion" id="accordionSidebar">

        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-graduation-cap fs-3"></i>
            </div>
            <div class="sidebar-brand-text mx-3">EduAdmin Pro</div>
        </a>

        <hr class="sidebar-divider my-0">

        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <hr class="sidebar-divider">

        <div class="sidebar-heading">
            Management
        </div>
        <li class="nav-item active">
            <a class="nav-link" href="{{route('tourist.create')}}">
                <i class="fas fa-fw fa-users"></i>
                <span>Registration for Tour</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="{{route('tourist.list')}}">
                <i class="fas fa-fw fa-users"></i>
                <span>Tour List</span></a>
        </li>


        <hr class="sidebar-divider d-none d-md-block">

        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"><i class="fas fa-chevron-left text-white-50"></i></button>
        </div>

    </ul>
    <div id="content-wrapper" class="d-flex flex-column">

        <div id="content">

            <nav class="navbar navbar-expand navbar-light bg-whiteAll Students Data Table
 topbar mb-4 static-top shadow-sm px-4">

                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                               aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-brand-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <ul class="navbar-nav ml-auto ms-auto align-items-center">

                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" role="button">
                            <i class="fas fa-bell fa-fw text-gray-600"></i>
                            <span class="badge bg-danger badge-counter rounded-circle">3+</span>
                        </a>
                    </li>

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small fw-semibold me-2">{{Auth::user()->name}}</span>
                            <img class="img-profile rounded-circle"
                                 src="https://ui-avatars.com/api/?name=Admin+User&background=4e73df&color=ffffff" width="40">
                        </a>
                        <div class="dropdown-menu dropdown-menu-end shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400 me-2"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400 me-2"></i>
                                Settings
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>

                </ul>

            </nav>
            <div class="container-fluid px-4">
                        
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

                                <input type="hidden" name="status" value="active">
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
                                    <option value="1">Web Development</option>
                                    <option value="2">Tourism</option>
                                    <option value="3">ICT</option>
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
                    </div>
                    
                </div>

            </div>
        </div>
        <footer class="sticky-footer bg-white py-3 mt-auto shadow-sm-top">
            <div class="container my-auto">
                <div class="copyright text-center my-auto text-muted small fw-semibold">
                    <span>Copyright &copy; Your Academy System 2024</span>
                </div>
            </div>
        </footer>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>

</body>
</html>



