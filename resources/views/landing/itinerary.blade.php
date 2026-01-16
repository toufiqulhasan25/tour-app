@extends('landing')

@section('body')
    <div class="auth-background flex-grow-1 d-flex flex-column position-relative" style="height: auto; min-height: 100vh;">
        <div class="auth-overlay"></div>

        <div class="container flex-grow-1 d-flex flex-column justify-content-center pb-5 position-relative"
            style="z-index: 2; padding-top: 120px;">

            <div class="text-center mb-5">
                <p class="sub-title text-white opacity-75">Join the Adventure</p>
                <h1 class="main-title text-dark" style="font-size: 3.5rem;">Tour Itinerary</h1>
                <div class="d-inline-block px-4 py-2 mt-2 rounded-pill"
                    style="background: rgba(255,255,255,0.1); backdrop-filter: blur(5px); border: 1px solid rgba(255,255,255,0.2);">
                    <p class="m-0 text-white small fw-bold">
                        <i class="fa fa-map-marker-alt me-2"></i>Mirinja Valley &bull; Cox's Bazar &bull; Savar
                    </p>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="timeline">

                        <div class="timeline-item">
                            <div class="timeline-icon">
                                <i class="fa fa-bus"></i>
                            </div>
                            <div class="timeline-content">
                                <span class="timeline-date">19 Jan &bull; 09:00 PM</span>
                                <h5 class="timeline-title">The Journey Begins</h5>
                                <p class="timeline-description">Departure for Mirinja Valley.</p>
                            </div>
                        </div>

                        <div class="timeline-item">
                            <div class="timeline-icon">
                                <i class="fa fa-mountain"></i>
                            </div>
                            <div class="timeline-content">
                                <span class="timeline-date">20 Jan &bull; Full Day & Night</span>
                                <h5 class="timeline-title">Mirinja Valley Stay</h5>
                                <p class="timeline-description">Exploring the valley and overnight stay.</p>
                            </div>
                        </div>

                        <div class="timeline-item">
                            <div class="timeline-icon">
                                <i class="fa fa-car-side"></i>
                            </div>
                            <div class="timeline-content">
                                <span class="timeline-date">21 Jan &bull; Morning</span>
                                <h5 class="timeline-title">Head to Cox's Bazar</h5>
                                <p class="timeline-description">Departure after breakfast.</p>
                            </div>
                        </div>

                        <div class="timeline-item">
                            <div class="timeline-icon">
                                <i class="fa fa-umbrella-beach"></i>
                            </div>
                            <div class="timeline-content">
                                <span class="timeline-date">21-22 Jan &bull; 2 Days Stay</span>
                                <h5 class="timeline-title">Beach Vibes & Gala Night</h5>
                                <p class="timeline-description">Sightseeing, private evening festivals & grand dinner.</p>
                            </div>
                        </div>

                        <div class="timeline-item">
                            <div class="timeline-icon">
                                <i class="fa fa-home"></i>
                            </div>
                            <div class="timeline-content">
                                <span class="timeline-date">23 Jan &bull; Morning</span>
                                <h5 class="timeline-title">Return Home</h5>
                                <p class="timeline-description">Journey back to Savar.</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <style>
        .timeline {
            position: relative;
            padding: 20px 0;
        }

        /* The vertical line */
        .timeline::before {
            content: '';
            position: absolute;
            top: 0;
            left: 30px; /* Adjust based on icon size */
            height: 100%;
            width: 2px;
            background: rgba(255, 255, 255, 0.2);
        }

        .timeline-item {
            position: relative;
            margin-bottom: 40px;
            display: flex;
            align-items: flex-start;
        }

        /* The icon circle */
        .timeline-icon {
            position: relative;
            z-index: 1;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: #0f2b2d; /* Dark background for icon */
            border: 2px solid #81e6d9; /* Teal border */
            display: flex;
            align-items: center;
            justify-content: center;
            color: #81e6d9; /* Teal icon color */
            font-size: 1.5rem;
            margin-right: 25px;
            flex-shrink: 0;
        }

        .timeline-content {
            background: rgba(255, 255, 255, 0.05); /* Subtle background for text */
            backdrop-filter: blur(5px);
            padding: 20px 25px;
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            flex-grow: 1;
        }

        .timeline-date {
            display: block;
            color: #81e6d9; /* Teal color for date */
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 5px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .timeline-title {
            margin: 0;
            font-weight: 700;
            color: #ffffff;
            font-size: 1.25rem;
        }

        .timeline-description {
            margin: 10px 0 0;
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.95rem;
        }
        
        /* Remove the line for the last item to make it look cleaner */
        .timeline-item:last-child {
            margin-bottom: 0;
        }
        
    </style>
@endsection