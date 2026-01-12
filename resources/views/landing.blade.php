<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adventure - New Adventure</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap"
          rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('auth/auth.css') }}">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .main-content-wrapper {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        /* --- Hero Section Styles --- */
        .hero-section {
            position: relative;
            height: 100vh;
            /* Full viewport height */
            width: 100%;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        /* Background Image Handling */
        .hero-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url("{{ asset('images/mountain-bg.jpg') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            z-index: -2;
        }

        /* Dark Overlay to make text readable */
        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 50, 80, 0.4);
            /* Blue-ish dark tint matching the design */
            z-index: -1;
        }

        /* --- Navbar Styles --- */
        .navbar {
            background: transparent !important;
            padding-top: 20px;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: white !important;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .navbar-brand i {
            font-size: 1.2rem;
        }

        .nav-link {
            color: white !important;
            font-weight: 600;
            font-size: 0.9rem;
            text-transform: uppercase;
            margin-left: 15px;
            letter-spacing: 0.5px;
        }

        .nav-link:hover {
            color: #ddd !important;
        }

        /* --- Main Content / Hero Text Styles --- */
        .hero-content {
            flex-grow: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            padding: 0 20px;
        }

        .sub-title {
            font-size: 1rem;
            font-weight: 600;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .main-title {
            font-size: 4.5rem;
            font-weight: 800;
            text-transform: uppercase;
            margin-bottom: 15px;
            text-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
        }

        .description {
            font-size: 1rem;
            max-width: 700px;
            margin: 0 auto 40px auto;
            font-weight: 300;
            opacity: 0.9;
        }

        .btn-discover {
            background-color: white;
            color: #333;
            font-weight: 700;
            padding: 12px 35px;
            border-radius: 50px;
            text-transform: uppercase;
            font-size: 0.9rem;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-discover:hover {
            background-color: #f0f0f0;
            transform: translateY(-2px);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .main-title {
                font-size: 2.5rem;
            }

            .navbar {
                background: rgba(0, 0, 0, 0.8) !important;
                /* Dark background on mobile menu */
            }
        }

        .adventure-footer {
            background-color: #0f2b2d;
            /* Deep Forest Teal - matches the trees */
            color: #e0f2f1;
            /* Soft mist color for text */
            border-top: 1px solid #234e52;
            padding: 1.5rem 0;
            margin-top: auto;
        }

        .adventure-footer .brand-highlight {
            color: #4fd1c5;
            /* Bright Teal for "NIYD" */
            font-weight: 700;
            letter-spacing: 1px;
        }

        .adventure-footer .credit-pill {
            background: rgba(255, 255, 255, 0.1);
            color: #81e6d9;
            /* Lighter Teal */
            border: 1px solid rgba(129, 230, 217, 0.3);
            padding: 4px 12px;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 500;
            margin-left: 8px;
            transition: all 0.3s ease;
        }

        .adventure-footer .credit-pill:hover {
            background: rgba(129, 230, 217, 0.2);
            color: #fff;
        }
    </style>
</head>

<body>

<!-- Navigation (Global) -->
<div class="position-absolute w-100" style="z-index: 999;">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="me-2" style="height: 40px;"> NIYD
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Service</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Gallery</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">FAQ</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<!-- Main Content -->
<main class="main-content-wrapper">
    <div class="hero-section">
        <div class="hero-bg"></div>
        <div class="hero-overlay"></div>

        <div class="hero-content">
            <div class="container">
                <p class="sub-title">Discover the Colorful World</p>
                <h1 class="main-title">New Adventure</h1>
                <p class="description">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temp
                    or incididunt ut labore et dolore magna aliqua. Ut enim ad minim.
                </p>
                <a href="{{ route('register') }}" class="btn btn-discover">Register Now</a>
            </div>
        </div>
    </div>
</main>

<footer class="adventure-footer">
    <div class="container">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">

            <div class="mb-2 mb-md-0 small text-center text-md-start">
                &copy; {{ date('Y') }} <span class="brand-highlight">NIYD</span>. All rights reserved.
            </div>

            <div class="small d-flex align-items-center justify-content-center">
                <span class="opacity-75">Made by</span>
                <span class="credit-pill">
                        Web App Dev Batch-04
                    </span>
            </div>

        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
