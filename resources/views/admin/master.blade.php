<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premium Admin Dashboard | NIYD</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --brand-primary: #4e73df;
            --brand-dark: #224abe;
            --brand-accent: #858796;
            --bg-light-gray: #f8f9fc;
            --card-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-light-gray);
            color: #5a5c69;
            overflow-x: hidden;
        }

        /* Wrapper & Sidebar Layout */
        #wrapper {
            display: flex;
            width: 100%;
        }

        #accordionSidebar {
            width: 250px;
            min-height: 100vh;
            background-image: linear-gradient(180deg, var(--brand-dark) 10%, var(--brand-primary) 100%);
            transition: all 0.3s ease;
            z-index: 1000;
        }

        /* Sidebar collapsed state on Mobile */
        @media (max-width: 768px) {
            #accordionSidebar {
                width: 0;
                position: fixed;
                overflow: hidden;
            }
            #accordionSidebar.toggled {
                width: 250px;
            }
            #content-wrapper {
                margin-left: 0;
            }
        }

        .sidebar-brand {
            height: 4.375rem;
            text-decoration: none;
            font-weight: 800;
            color: #fff !important;
        }

        .nav-link {
            padding: 0.85rem 1rem;
            color: rgba(255, 255, 255, .8) !important;
            font-weight: 600;
            display: flex;
            align-items: center;
        }

        .nav-link:hover, .nav-item.active .nav-link {
            color: #fff !important;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 5px;
            margin: 0 10px;
        }

        .nav-link i { margin-right: 10px; width: 20px; }

        /* Topbar & Content */
        #content-wrapper {
            width: 100%;
            display: flex;
            flex-column: column;
        }

        .topbar {
            height: 4.375rem;
            background: #fff;
        }

        .user-avatar {
            width: 35px;
            height: 35px;
            background-color: var(--brand-primary);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 0.8rem;
        }

        /* Footer */
        .sticky-footer {
            padding: 2rem 0;
            flex-shrink: 0;
        }

        .credit-pill {
            background: #eaecf4;
            padding: 4px 12px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.75rem;
            margin-left: 8px;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-thumb { background: #d1d3e2; border-radius: 10px; }
    </style>
</head>

<body>

<div id="wrapper">
    <ul class="navbar-nav sidebar accordion" id="accordionSidebar">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fa-solid fa-bus-simple"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Tour Admin</div>
        </a>

        <hr class="sidebar-divider my-0">

        <div class="sidebar-heading mt-3 px-3">Management</div>

        <li class="nav-item {{ request()->routeIs('admin.profile') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.profile') }}">
                <i class="fa-solid fa-address-card"></i>
                <span>Profile</span>
            </a>
        </li>

        <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="fas fa-fw fa-users"></i>
                <span>Students List</span>
            </a>
        </li>

        <li class="nav-item {{ request()->routeIs('courses.index') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('courses.index') }}">
                <i class="fas fa-fw fa-book-open"></i>
                <span>Courses</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('courses.courseWise', 4) }}">
                <i class="fas fa-fw fa-chalkboard-teacher"></i>
                <span>Teachers</span>
            </a>
        </li>

        <hr class="sidebar-divider d-none d-md-block">
    </ul>

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow-sm px-3 px-md-4">
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle me-3 border-0 bg-light">
                    <i class="fa fa-bars text-primary"></i>
                </button>

                

                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                            <span class="me-2 d-none d-lg-inline text-dark small fw-bold">
                                {{ auth()->user()->name }}
                            </span>
                            <div class="user-avatar shadow-sm">
                                {{ substr(auth()->user()->name, 0, 1) }}
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end shadow border-0 animated--fade-in">
                            <a class="dropdown-item py-2" href="{{ route('admin.profile') }}">
                                <i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i> Profile
                            </a>
                            
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item py-2 text-danger fw-bold" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw me-2"></i> Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                        </div>
                    </li>
                </ul>
            </nav>

            <div class="container-fluid">
                @yield('content')
            </div>
        </div>

        <footer class="sticky-footer bg-white mt-auto border-top shadow-sm-top">
            <div class="container my-auto">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                    <div class="small text-muted mb-2 mb-md-0">
                        &copy; {{ date('Y') }} <strong>NIYD</strong>. All rights reserved.
                    </div>
                    <div class="small d-flex align-items-center">
                        <span class="text-muted">Made by</span>
                        <span class="credit-pill shadow-sm">Web App Dev Batch-04</span>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Sidebar Toggle for Mobile
    document.getElementById('sidebarToggleTop').addEventListener('click', function() {
        document.getElementById('accordionSidebar').classList.toggle('toggled');
    });

    // Tooltips initialization
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>

</body>
</html>