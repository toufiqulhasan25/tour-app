
@extends('landing')

@section('body')

    <div class="hero-section">
        <div class="hero-bg"></div>
        <div class="hero-overlay"></div>

        <div class="hero-content">
            <div class="container">
                <p class="sub-title">ESCAPE THE INFINITE LOOP</p>
                <h1 class="main-title">New Adventure</h1>
                <p class="description">
                    Trade your keyboards for backpacks. It’s time for to disconnect, debug our minds, and experience a world
                    with higher resolution than 4K.
                </p>
                <a href="{{ route('register') }}" class="btn btn-discover">START THE JOURNEY →</a>
            </div>
        </div>
    </div>

@endsection