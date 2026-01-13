<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard | NIYD Tour</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        .niyd-dashboard-wrapper {
            --brand-primary: #4e73df;
            --brand-dark: #224abe;
            --bg-light-gray: #f8f9fc;
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-light-gray);
            color: #5a5c69;
            min-height: 100vh;
        }

        #niyd-sidebar {
            width: 250px;
            min-height: 100vh;
            background: linear-gradient(180deg, var(--brand-dark) 10%, var(--brand-primary) 100%);
            box-shadow: 4px 0 10px rgba(0,0,0,0.1);
            transition: all 0.3s;
            z-index: 100;
        }

        #niyd-sidebar .sidebar-brand {
            height: 4.375rem;
            text-decoration: none;
            font-weight: 800;
            color: #fff !important;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #niyd-sidebar .nav-item .nav-link {
            padding: 0.75rem 1.5rem;
            color: rgba(255,255,255,.8) !important;
            font-weight: 600;
            display: flex;
            align-items: center;
            margin: 0 10px;
            border-radius: 10px;
        }

        #niyd-sidebar .nav-item.active .nav-link, 
        #niyd-sidebar .nav-item .nav-link:hover {
            color: #fff !important;
            background: rgba(255,255,255,0.15);
        }

      
        #content-wrapper { width: 100%; display: flex; flex-direction: column; }
        
        .niyd-topbar { 
            height: 4.375rem; 
            background: #fff; 
            border-bottom: 1px solid #e3e6f0; 
        }

        .user-avatar-box {
            width: 40px; height: 40px;
            background: var(--brand-primary);
            color: #fff;
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            font-weight: bold;
        }

        .niyd-footer { 
            background: #fff; 
            border-top: 1px solid #e3e6f0; 
            padding: 1.5rem 0; 
        }

       
        @media (max-width: 768px) {
            #niyd-sidebar { 
                position: fixed;
                left: -250px;
            }
            #niyd-sidebar.toggled { 
                left: 0;
            }
        }
    </style>
</head>

<body>


<div class="niyd-dashboard-wrapper d-flex" id="wrapper">
    
    <nav id="niyd-sidebar" class="navbar-nav">
        <a class="sidebar-brand" href="{{route('dashboard.tourist')}}">
            <i class="fa-solid fa-bus-simple me-2"></i>
            <span>NIYD TOUR</span>
        </a>

        <hr class="sidebar-divider my-0 opacity-25">
        
        <div class="px-4 mt-4 mb-2 small fw-bold text-white-50 text-uppercase">Management</div>
        
        <ul class="nav flex-column">
            <li class="nav-item {{ request()->routeIs('dashboard.tourist') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('dashboard.tourist')}}">
                    <i class="fas fa-tachometer-alt me-2"></i><span>Dashboard</span>
                </a>
            </li>
            
            <li class="nav-item {{ request()->routeIs('user.profile') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('user.profile')}}">
                    <i class="fa-solid fa-address-card me-2"></i><span>Account Profile</span>
                </a>
            </li>
        </ul>
    </nav>

    <div id="content-wrapper">
        <nav class="navbar navbar-expand navbar-light niyd-topbar mb-4 static-top shadow-sm px-4">
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle me-3">
                <i class="fa fa-bars text-primary"></i>
            </button>

            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#" id="userDropdown" data-bs-toggle="dropdown">
                        <span class="d-none d-lg-inline text-gray-600 small fw-bold">{{ auth()->user()->name }}</span>
                        <div class="user-avatar-box text-uppercase">{{ substr(auth()->user()->name, 0, 1) }}</div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end shadow border-0 mt-3">
                        <a class="dropdown-item" href="{{ route('user.profile') }}"><i class="fas fa-user me-2 text-muted"></i>Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt me-2"></i>Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>

        <div class="container-fluid px-4">
            @yield('body') 
        </div>

        <footer class="niyd-footer mt-auto">
            <div class="container text-center">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                    <div class="small text-muted">&copy; {{ date('Y') }} NIYD.</div>
                    <div class="small fw-bold text-primary">Web App Dev Batch-04</div>
                </div>
            </div>
        </footer>
    </div>
</div>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.getElementById('sidebarToggleTop')?.addEventListener('click', function() {
        document.getElementById('niyd-sidebar').classList.toggle('toggled');
    });
</script>
</body>
</html>