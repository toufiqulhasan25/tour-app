
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

    .user-avatar {
    width: 40px;
    height: 40px;
    background-color: #3f51b5; /* নীল রঙ */
    color: #ffffff;
    border-radius: 50%; /* গোল করার জন্য */
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    text-transform: uppercase;
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
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button"
                           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small fw-semibold me-2">
                                {{ auth()->user()->name }}
                            </span>
                            <div class="user-avatar">
                                {{ auth()->user()->initials }}
                            </div>
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


@yield('body')

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
