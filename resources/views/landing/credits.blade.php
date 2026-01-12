
@extends('landing')

@section('body')
    <div class="auth-background flex-grow-1 d-flex flex-column position-relative" style="height: auto; min-height: 100vh;">
        <div class="auth-overlay"></div>

        <div class="container py-5 mt-5 position-relative" style="z-index: 2;">

            <div class="text-center mb-5">
                <p class="sub-title text-white opacity-75">Meet the Creators</p>
                <h1 class="main-title" style="font-size: 3.5rem;">The Team</h1>
                <div class="d-inline-block px-4 py-2 mt-2 rounded-pill"
                    style="background: rgba(255,255,255,0.1); backdrop-filter: blur(5px); border: 1px solid rgba(255,255,255,0.2);">
                    <p class="m-0 text-white small fw-bold">
                        <i class="fa fa-graduation-cap me-2"></i>NIYD &bull; Web App Dev &bull; Batch-04
                    </p>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="glass-card p-4">
                        <h4 class="text-center fw-bold mb-4 text-uppercase border-bottom pb-3"
                            style="border-color: rgba(255,255,255,0.2) !important; color: #81e6d9; letter-spacing: 2px;">
                            Designers & Developers
                        </h4>

                        <div class="vstack gap-3">

                            <!-- Member 1 -->
                            <div class="d-flex align-items-center p-3 rounded hover-effect"
                                style="background: rgba(255,255,255,0.05); transition: background 0.3s;">
                                <div class="rounded-circle bg-white d-flex align-items-center justify-content-center flex-shrink-0"
                                    style="width: 50px; height: 50px; color: #0f2b2d;">
                                    <i class="fa fa-user fw-bold"></i>
                                </div>
                                <div class="ms-3">
                                    <h5 class="m-0 fw-bold text-white">Md Habibul Goni</h5>
                                    <small class="text-white-50">Frontend Designer & Developer</small>
                                </div>
                            </div>

                            <!-- Member 2 -->
                            <div class="d-flex align-items-center p-3 rounded hover-effect"
                                style="background: rgba(255,255,255,0.05); transition: background 0.3s;">
                                <div class="rounded-circle bg-white d-flex align-items-center justify-content-center flex-shrink-0"
                                    style="width: 50px; height: 50px; color: #0f2b2d;">
                                    <i class="fa fa-user fw-bold"></i>
                                </div>
                                <div class="ms-3">
                                    <h5 class="m-0 fw-bold text-white">Toufiqul hasan Shuvo</h5>
                                    <small class="text-white-50">Backend Developer</small>
                                </div>
                            </div>

                            <!-- Member 3 -->
                            <div class="d-flex align-items-center p-3 rounded hover-effect"
                                style="background: rgba(255,255,255,0.05); transition: background 0.3s;">
                                <div class="rounded-circle bg-white d-flex align-items-center justify-content-center flex-shrink-0"
                                    style="width: 50px; height: 50px; color: #0f2b2d;">
                                    <i class="fa fa-user fw-bold"></i>
                                </div>
                                <div class="ms-3">
                                    <h5 class="m-0 fw-bold text-white">Monir Mia</h5>
                                    <small class="text-white-50">Backend Developer</small>
                                </div>
                            </div>

                            <!-- Member 4 -->
                            <div class="d-flex align-items-center p-3 rounded hover-effect"
                                style="background: rgba(255,255,255,0.05); transition: background 0.3s;">
                                <div class="rounded-circle bg-white d-flex align-items-center justify-content-center flex-shrink-0"
                                    style="width: 50px; height: 50px; color: #0f2b2d;">
                                    <i class="fa fa-user fw-bold"></i>
                                </div>
                                <div class="ms-3">
                                    <h5 class="m-0 fw-bold text-white">Mohammad Ali</h5>
                                    <small class="text-white-50">Frontend Developer</small>
                                </div>
                            </div>

                            <!-- Member 5 -->
                            <div class="d-flex align-items-center p-3 rounded hover-effect"
                                style="background: rgba(255,255,255,0.05); transition: background 0.3s;">
                                <div class="rounded-circle bg-white d-flex align-items-center justify-content-center flex-shrink-0"
                                    style="width: 50px; height: 50px; color: #0f2b2d;">
                                    <i class="fa fa-user fw-bold"></i>
                                </div>
                                <div class="ms-3">
                                    <h5 class="m-0 fw-bold text-white">Tuhin Sikder</h5>
                                    <small class="text-white-50">Frontend Developer</small>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <style>
        .hover-effect:hover {
            background: rgba(255, 255, 255, 0.15) !important;
        }
    </style>
@endsection