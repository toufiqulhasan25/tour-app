
@extends('landing')

@section('body')
    <div class="auth-background flex-grow-1 d-flex flex-column position-relative" style="height: auto; min-height: 100vh;">
        <div class="auth-overlay"></div>

        <div class="container py-5 mt-5 position-relative" style="z-index: 2;">
            <div class="text-center mb-5">
                <h1 class="main-title" style="font-size: 3.5rem;">Our Memories</h1>
                <p class="description text-white opacity-75">
                    Moments captured in time. Relive the adventure.
                </p>
            </div>

            <div class="row g-4">
                {{-- Example Placeholders since real images aren't available yet --}}
                @for ($i = 1; $i <= 6; $i++)
                    <div class="col-md-4 col-sm-6">
                        <div class="glass-card p-0 overflow-hidden h-100 border-0 shadow-lg text-center">
                            {{-- Placeholder stylized block --}}
                            <div
                                style="height: 250px; background: rgba(255,255,255,0.1); display: flex; align-items: center; justify-content: center; position: relative;">
                                <i class="fa fa-image fa-3x" style="color: rgba(255,255,255,0.3);"></i>
                                <span class="position-absolute bottom-0 start-0 w-100 p-3"
                                    style="background: linear-gradient(to top, rgba(0,0,0,0.6), transparent); color: white; text-align: left;">
                                    <small class="fw-bold text-uppercase" style="letter-spacing: 1px;">Tour Highlight
                                        #{{ $i }}</small>
                                </span>
                            </div>
                            <div class="p-3 text-start">
                                <p class="small text-white-50 m-0">
                                    Captured during the great escape.
                                </p>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>

            <div class="text-center mt-5">
                <button class="btn btn-adventure px-5">Load More <i class="fa fa-arrow-down ms-2"></i></button>
            </div>
        </div>
    </div>
@endsection