<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Industrial Tour 2026 - NIYD</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('auth/auth.css') }}">

    <style>
        /* --- GLOBAL STYLES --- */
        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #1a1a1a; 
            overflow-x: hidden;
            color: #fff;
        }

        /* --- BACKGROUND SLIDESHOW --- */
        .hero-bg-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -2;
        }

        .hero-slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            opacity: 0; 
            animation: fadeEffect 20s infinite; 
        }

        .hero-slide:nth-child(1) {
            background-image: url("{{ asset('images/mountain-bg.jpg') }}");
            animation-delay: 0s;
        }

        .hero-slide:nth-child(2) {
            background-image: url("{{ asset('images/sea-bg.png') }}");
            animation-delay: 10s; 
        }

        @keyframes fadeEffect {
            0% { opacity: 0; }
            10% { opacity: 1; }   
            45% { opacity: 1; }   
            55% { opacity: 0; }   
            100% { opacity: 0; }
        }

        /* --- OVERLAY --- */
        .hero-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.35);
            background: linear-gradient(to bottom, rgba(0,0,0,0.2), rgba(0,0,0,0.6));
            z-index: -1;
        }

        /* --- NAVBAR --- */
        .navbar {
            background: rgba(0,0,0,0.1) !important;
            backdrop-filter: blur(5px);
            padding-top: 15px; /* Increased slightly for vertical centering space */
            padding-bottom: 15px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.4rem;
            color: white !important;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* Standard Links */
        .nav-link {
            color: rgba(255,255,255,0.9) !important;
            font-weight: 500;
            font-size: 0.85rem;
            text-transform: uppercase;
            margin-left: 20px;
            letter-spacing: 0.5px;
            transition: color 0.3s;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
        }

        .nav-link:hover, .nav-link.active {
            color: #4fd1c5 !important;
        }

        /* LOGIN BUTTON STYLE */
        .btn-login-nav {
            border: 1px solid rgba(255, 255, 255, 0.5);
            padding: 6px 20px !important; /* Proper padding for pill shape */
            border-radius: 50px;
            transition: all 0.3s ease;
            margin-left: 20px; /* Space from Gallery link */
        }

        .btn-login-nav:hover, .btn-login-nav.active {
            background-color: white !important;
            color: #0f2b2d !important; /* Dark text on white bg */
            border-color: white;
            text-shadow: none;
        }

        /* --- CONTENT WRAPPER --- */
        .main-content-wrapper {
            flex: 1;
            display: flex;
            flex-direction: column;
            position: relative;
            z-index: 1; 
        }

        /* --- FOOTER --- */
        .adventure-footer {
            background-color: rgba(15, 43, 45, 0.9);
            backdrop-filter: blur(10px);
            color: #a0aec0;
            border-top: 1px solid rgba(255,255,255,0.1);
            padding: 1rem 0;
            margin-top: auto;
            position: relative;
            z-index: 2;
        }

        @media (max-width: 768px) {
            .navbar { background: #0f2b2d !important; }
        }
    </style>
</head>
<body>

    <div class="hero-bg-container">
        <div class="hero-slide"></div>
        <div class="hero-slide"></div>
    </div>

    <div class="hero-overlay"></div>

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('landing.index') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 35px;"> 
                <span>NIYD</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('landing.index') ? 'active' : '' }}" 
                           href="{{ route('landing.index') }}">Home</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('landing.tour_plan') ? 'active' : '' }}" 
                           href="{{ route('landing.itinerary') }}">Itinerary</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('landing.gallery') ? 'active' : '' }}" 
                           href="{{ route('landing.gallery') }}">Gallery</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link btn-login-nav {{ Route::is('login') ? 'active' : '' }}" 
                           href="{{ route('login') }}">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="main-content-wrapper">
        @yield('body')
    </main>

    <footer class="adventure-footer">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start mb-2 mb-md-0">
                    <h6 class="text-white fw-bold mb-0" style="font-size: 0.9rem;">National Institute of Youth Development</h6>
                    <small style="font-size: 0.75rem;">Ministry of Youth & Sports, Govt. of Bangladesh</small>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <small class="opacity-75" style="font-size: 0.75rem;">Designed & Developed by</small>
                    <span class="badge bg-light text-dark rounded-pill ms-2 px-2 py-1" style="font-size: 0.75rem;">Web Application & Web Development Batch-04</span>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>