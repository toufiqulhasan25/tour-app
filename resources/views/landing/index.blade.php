@extends('landing')

@section('body')

@php
    $deadline = \Carbon\Carbon::create(2026, 1, 20, 0, 0, 0);
    $isExpired = \Carbon\Carbon::now()->greaterThanOrEqualTo($deadline);
@endphp

<div class="container flex-grow-1 d-flex flex-column justify-content-center text-center text-white" style="padding-top: 140px; min-height: 90vh;">
    
    <div class="mb-4">
        <span class="d-inline-block py-1 px-3 rounded-pill border border-light border-opacity-25" 
              style="background: rgba(255,255,255,0.1); backdrop-filter: blur(5px); font-size: 0.85rem; letter-spacing: 1px;">
            <i class="fas fa-flag-checkered me-2 text-info"></i> NIYD OFFICIAL EVENT
        </span>
    </div>

    <h1 class="display-3 fw-bold text-uppercase mb-3" style="font-family: 'Poppins', sans-serif; letter-spacing: 1px; text-shadow: 0 5px 15px rgba(0,0,0,0.3);">
        Annual Industrial <br> 
        <span style="color: #4fd1c5;">Educational Tour 2026</span>
    </h1>
    
    <p class="lead mb-4 mx-auto text-light opacity-75" style="max-width: 750px; font-weight: 300;">
        Bridging the gap between academic theory and real-world experience. 
        Join the delegation from Savar to the hills of Bandarban and the shores of Cox's Bazar.
    </p>

    @if(!$isExpired)
    <div class="d-flex justify-content-center gap-2 gap-md-3 mb-5 mt-2" id="tour-timer">
        <div class="timer-card">
            <span class="timer-num" id="days">00</span>
            <span class="timer-label">Days</span>
        </div>
        <div class="timer-card">
            <span class="timer-num" id="hours">00</span>
            <span class="timer-label">Hours</span>
        </div>
        <div class="timer-card">
            <span class="timer-num" id="minutes">00</span>
            <span class="timer-label">Mins</span>
        </div>
        <div class="timer-card highlight">
            <span class="timer-num" id="seconds">00</span>
            <span class="timer-label">Secs</span>
        </div>
    </div>
    @else
    <div class="mb-5 mt-2">
        <span class="badge bg-danger px-4 py-2 rounded-pill shadow-lg">Registration Closed</span>
    </div>
    @endif
    
    <div class="d-flex justify-content-center gap-3">
        @if(!$isExpired)
            <a href="{{ route('register') }}" class="btn px-4 py-2 rounded-pill text-white fw-bold shadow-lg hover-lift" 
               style="background-color: #10b981; border: none; font-size: 1rem;">
                <i class="fas fa-file-signature me-2"></i> Register Now
            </a>
        @endif
        <a href="{{ route('landing.itinerary') }}" class="btn px-4 py-2 rounded-pill btn-outline-light fw-bold shadow-lg hover-lift"
           style="font-size: 1rem;">
            View Itinerary
        </a>
    </div>

    <div class="mt-5 pt-5 opacity-50 animate-bounce">
        <small class="d-block text-uppercase letter-spacing-2 mb-2">Explore The Plan</small>
        <i class="fas fa-chevron-down fa-lg"></i>
    </div>
</div>

<section class="py-5 bg-black bg-opacity-50 backdrop-blur">
    <div class="container py-4">
        <div class="row text-center mb-5">
            <div class="col-lg-8 mx-auto">
                <h5 class="text-info fw-bold text-uppercase letter-spacing-2">Soul Refreshment</h5>
                <h2 class="fw-bold text-white">Escape The Four Walls</h2>
                <p class="text-white-50 mt-2">
                    Forget the assignments, deadlines, and the city traffic for a few days. It's time to breathe freely, disconnect from the noise, and just be ourselves amidst the mountains and waves.
                </p>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="p-4 rounded-4 h-100 text-center border border-light border-opacity-10 hover-lift text-white" style="background: rgba(255,255,255,0.03);">
                    <div class="mb-3 d-inline-flex align-items-center justify-content-center rounded-circle text-white" 
                         style="width: 60px; height: 60px; background: linear-gradient(135deg, #10b981, #059669);">
                        <i class="fas fa-leaf fa-lg"></i>
                    </div>
                    <h4 class="h5 fw-bold">Touch of Nature</h4>
                    <p class="text-white-50 small mb-0">
                        Leaving the concrete jungle to get lost in the green hills and blue sea. A true "Hawa Bodol" (Change of Air) to heal the mind.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="p-4 rounded-4 h-100 text-center border border-light border-opacity-10 hover-lift text-white" style="background: rgba(255,255,255,0.03);">
                    <div class="mb-3 d-inline-flex align-items-center justify-content-center rounded-circle text-white" 
                         style="width: 60px; height: 60px; background: linear-gradient(135deg, #f59e0b, #d97706);">
                        <i class="fas fa-mug-hot fa-lg"></i>
                    </div>
                    <h4 class="h5 fw-bold">Unfiltered 'Adda'</h4>
                    <p class="text-white-50 small mb-0">
                        No juniors, no seniors, no pressure. Just campfire songs, late-night tea, and endless stories that turn into memories.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="p-4 rounded-4 h-100 text-center border border-light border-opacity-10 hover-lift text-white" style="background: rgba(255,255,255,0.03);">
                    <div class="mb-3 d-inline-flex align-items-center justify-content-center rounded-circle text-white" 
                         style="width: 60px; height: 60px; background: linear-gradient(135deg, #3b82f6, #2563eb);">
                        <i class="fas fa-sun fa-lg"></i>
                    </div>
                    <h4 class="h5 fw-bold">Free Your Spirit</h4>
                    <p class="text-white-50 small mb-0">
                        Sometimes the best way to move forward is to pause. We return with fresh energy, lighter hearts, and a stronger bond.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5" style="background: rgba(15, 43, 45, 0.8);">
    <div class="container py-4">
        <div class="row align-items-center mb-5">
            <div class="col-md-6 text-white">
                <h5 class="text-info fw-bold text-uppercase letter-spacing-2">Who Is Joining?</h5>
                <h2 class="fw-bold display-6">A Union of Three Disciplines</h2>
            </div>
            <div class="col-md-6 text-md-end text-white-50">
                <p class="mb-0">Bringing together the brightest minds from NIYD's top diploma programs for a collaborative journey.</p>
            </div>
        </div>

        <div class="row g-3">
            <div class="col-md-4">
                <div class="d-flex align-items-center p-3 rounded-3 border border-light border-opacity-10 hover-lift h-100 text-white" style="background: rgba(255,255,255,0.05);">
                    <i class="fas fa-code fa-2x text-info me-3"></i>
                    <div>
                        <h6 class="fw-bold mb-0">Diploma in Web Application & Web Development</h6>
                        <small class="text-white-50">Diploma Course</small>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-flex align-items-center p-3 rounded-3 border border-light border-opacity-10 hover-lift h-100 text-white" style="background: rgba(255,255,255,0.05);">
                    <i class="fas fa-plane-departure fa-2x text-warning me-3"></i>
                    <div>
                        <h6 class="fw-bold mb-0">Diploma in Tourism & Hospitality Management</h6>
                        <small class="text-white-50">Diploma Course</small>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-flex align-items-center p-3 rounded-3 border border-light border-opacity-10 hover-lift h-100 text-white" style="background: rgba(255,255,255,0.05);">
                    <i class="fas fa-microchip fa-2x text-danger me-3"></i>
                    <div>
                        <h6 class="fw-bold mb-0">Diploma in Information & Communication Technology</h6>
                        <small class="text-white-50">Diploma Course</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5" style="background: rgba(0, 0, 0, 0.6); backdrop-filter: blur(10px);">
    <div class="container py-5 text-white">
        <div class="text-center mb-5">
            <span class="d-inline-block py-1 px-3 rounded-pill border border-info border-opacity-50 text-info mb-3" style="font-size: 0.8rem; letter-spacing: 1px;">
                THE ROADMAP
            </span>
            <h2 class="fw-bold display-5">Destinations & Highlights</h2>
        </div>

        <div class="row g-5 align-items-center">
            
            <div class="col-md-6">
                <div class="pe-md-4">
                    <h3 class="fw-bold text-white mb-3" style="font-size: 2rem;">Mirinja Valley, Lama</h3>
                    <p class="text-white-50 mb-4" style="font-size: 1.1rem; line-height: 1.6;">
                        Our first stop takes us to the serene heights of Bandarban. Here, students will experience nature retreat management and participate in group trekking activities.
                    </p>
                    <ul class="list-unstyled text-white-50">
                        <li class="mb-3 d-flex align-items-center"><i class="fas fa-check-circle text-info me-3 fa-lg"></i>Cloud-touching Scenery</li>
                        <li class="mb-3 d-flex align-items-center"><i class="fas fa-check-circle text-info me-3 fa-lg"></i>Night Stay in Eco-Cottages</li>
                        <li class="mb-3 d-flex align-items-center"><i class="fas fa-check-circle text-info me-3 fa-lg"></i>Group Photography Session</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="rounded-4 overflow-hidden shadow-lg position-relative border border-light border-opacity-10">
                    <div style="background: #2d3748; min-height: 350px;">
                        <img src="{{ asset('images/mirinja-2.png') }}" 
                             class="w-100 object-fit-cover" 
                             style="height: 400px; width: 100%; display: block;" 
                             alt="Mirinja Valley"
                             onerror="this.style.display='none'"> 
                    </div>
                    <div class="position-absolute bottom-0 start-0 px-4 py-2 rounded-top-end fw-bold text-white" 
                         style="background: linear-gradient(135deg, #0d9488, #115e59);">
                        Stop 01
                    </div>
                </div>
            </div>

            <div class="col-12"></div>

            <div class="col-md-6 order-md-2">
                <div class="ps-md-4">
                    <h3 class="fw-bold text-white mb-3" style="font-size: 2rem;">Cox's Bazar Sea Beach</h3>
                    <p class="text-white-50 mb-4" style="font-size: 1.1rem; line-height: 1.6;">
                        The journey concludes at the world's longest natural sea beach. A hub for tourism and hospitality learning, followed by our Grand Gala Night.
                    </p>
                    <ul class="list-unstyled text-white-50">
                        <li class="mb-3 d-flex align-items-center"><i class="fas fa-check-circle text-info me-3 fa-lg"></i>Hospitality Management Insight</li>
                        <li class="mb-3 d-flex align-items-center"><i class="fas fa-check-circle text-info me-3 fa-lg"></i>Beach Sports & Relaxation</li>
                        <li class="mb-3 d-flex align-items-center"><i class="fas fa-check-circle text-info me-3 fa-lg"></i>Exclusive Gala Dinner</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-md-6 order-md-1">
                <div class="rounded-4 overflow-hidden shadow-lg position-relative border border-light border-opacity-10">
                    <div style="background: #2d3748; min-height: 350px;">
                        <img src="{{ asset('images/cox.png') }}" 
                             class="w-100 object-fit-cover" 
                             style="height: 400px; width: 100%; display: block;" 
                             alt="Cox's Bazar"
                             onerror="this.style.display='none'">
                    </div>
                    <div class="position-absolute bottom-0 end-0 px-4 py-2 rounded-top-start fw-bold text-white" 
                         style="background: linear-gradient(135deg, #0d9488, #115e59);">
                        Stop 02
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="py-5" style="background: rgba(13, 148, 136, 0.1); border-top: 1px solid rgba(255,255,255,0.1);">
    <div class="container py-5 text-center text-white">
        @if(!$isExpired)
            <h2 class="fw-bold mb-3 display-6 text-white">Registration Closing Soon</h2>
            <p class="text-white-50 mb-4 mx-auto" style="max-width: 600px;">
                Don't miss this opportunity to connect with peers and industry environments. 
                Priority seating available for early registrants.
            </p>
            <a href="{{ route('register') }}" class="btn btn-primary px-5 py-3 rounded-pill fw-bold shadow-lg hover-lift">
                Confirm Your Participation
            </a>
        @else
            <h2 class="fw-bold mb-3 display-6 text-white">Registration Closed</h2>
            <p class="text-white-50 mb-4 mx-auto" style="max-width: 600px;">
                The registration deadline has passed. Thank you for your interest!
            </p>
            <button class="btn btn-secondary px-5 py-3 rounded-pill fw-bold shadow-lg" disabled>
                Closed
            </button>
        @endif
    </div>
</section>

<style>
    /* Countdown Styling */
    .timer-card {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 15px;
        padding: 15px;
        min-width: 85px;
        transition: transform 0.3s ease;
    }
    .timer-card:hover { transform: scale(1.05); background: rgba(255, 255, 255, 0.08); }
    .timer-card.highlight { background: rgba(79, 209, 197, 0.1); border-color: rgba(79, 209, 197, 0.3); }
    .timer-num { display: block; font-size: 1.8rem; font-weight: 800; color: #4fd1c5; line-height: 1; margin-bottom: 5px; }
    .timer-label { font-size: 0.7rem; text-transform: uppercase; letter-spacing: 1px; color: rgba(255, 255, 255, 0.6); font-weight: 600; }

    /* Helper classes */
    .hover-lift { transition: transform 0.3s ease; }
    .hover-lift:hover { transform: translateY(-5px); }
    .backdrop-blur { backdrop-filter: blur(10px); }
    .letter-spacing-2 { letter-spacing: 2px; }
    .object-fit-cover { object-fit: cover; }
    .animate-bounce { animation: bounce 2s infinite; }
    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% {transform: translateY(0);}
        40% {transform: translateY(-10px);}
        60% {transform: translateY(-5px);}
    }
    @media (max-width: 576px) {
        .timer-card { min-width: 70px; padding: 10px; }
        .timer-num { font-size: 1.4rem; }
    }
</style>

<script>
    @if(!$isExpired)
    const countdownDate = new Date("Jan 20, 2026 00:00:00").getTime();

    const timer = setInterval(function() {
        const now = new Date().getTime();
        const distance = countdownDate - now;

        const d = Math.floor(distance / (1000 * 60 * 60 * 24));
        const h = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const m = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const s = Math.floor((distance % (1000 * 60)) / 1000);

        if (document.getElementById("days")) {
            document.getElementById("days").innerHTML = d < 10 ? "0"+d : d;
            document.getElementById("hours").innerHTML = h < 10 ? "0"+h : h;
            document.getElementById("minutes").innerHTML = m < 10 ? "0"+m : m;
            document.getElementById("seconds").innerHTML = s < 10 ? "0"+s : s;
        }

        if (distance < 0) {
            clearInterval(timer);
            location.reload(); 
        }
    }, 1000);
    @endif
</script>

@endsection