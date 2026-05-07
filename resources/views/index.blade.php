@extends('layouts.main')

@section('content')
<!-- Hero Section -->
<section class="hero-wrapper position-relative overflow-hidden" style="background: var(--primary-black); min-height: 95vh; display: flex; align-items: center;">
    <!-- Abstract Background Elements -->
    <div class="position-absolute top-0 end-0 p-5 opacity-10 d-none d-lg-block">
        <i class="bi bi-speedometer2" style="font-size: 30rem; transform: rotate(-15deg);"></i>
    </div>
    
    <div class="container position-relative z-1">
        <div class="row align-items-center">
            <div class="col-lg-7 text-white hero-content">
                <span class="badge rounded-pill bg-white text-dark fw-bold px-3 py-2 mb-4 animate__animated animate__fadeInDown">NEW: 2024 LUXURY FLEET NOW AVAILABLE</span>
                <h1 class="hero-title mb-4 animate__animated animate__fadeInLeft">Elevate Your <br><span class="text-secondary">Driving Experience.</span></h1>
                <p class="lead mb-5 opacity-75 animate__animated animate__fadeInLeft animate__delay-1s" style="max-width: 500px;">Experience the freedom of the road with Oujda's most exclusive car rental marketplace. Premium vehicles, verified agencies, and zero hidden fees.</p>
                
                <div class="d-flex gap-3 animate__animated animate__fadeInLeft animate__delay-1s">
                    <a href="{{ url('/search') }}" class="btn btn-premium px-5 py-3 fw-bold">EXPLORE FLEET</a>
                    <a href="#how-it-works" class="btn btn-outline-light px-5 py-3 fw-bold">HOW IT WORKS</a>
                </div>
            </div>
            <div class="col-lg-5 d-none d-lg-block">
                <!-- Premium Car Image Placeholder with subtle floating animation -->
                <img src="https://images.unsplash.com/photo-1503376780353-7e6692767b70?auto=format&fit=crop&q=80&w=1000" class="img-fluid rounded-4 shadow-lg animate__animated animate__fadeInRight" alt="Premium Car">
            </div>
        </div>
    </div>
</section>

<!-- Advanced Search Widget (Floating) -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="search-widget p-4 p-lg-5 animate__animated animate__fadeInUp">
                <form action="{{ url('/search') }}" method="GET" class="row g-4">
                    <div class="col-lg-4">
                        <label class="form-label fw-bold text-dark mb-3"><i class="bi bi-geo-alt-fill me-2"></i>WHERE TO?</label>
                        <input type="text" name="location" class="form-control form-control-lg" placeholder="City or Agency name" value="Oujda">
                    </div>
                    <div class="col-lg-3">
                        <label class="form-label fw-bold text-dark mb-3"><i class="bi bi-calendar-event-fill me-2"></i>PICKUP</label>
                        <input type="date" name="start_date" class="form-control form-control-lg">
                    </div>
                    <div class="col-lg-3">
                        <label class="form-label fw-bold text-dark mb-3"><i class="bi bi-calendar-check-fill me-2"></i>RETURN</label>
                        <input type="date" name="end_date" class="form-control form-control-lg">
                    </div>
                    <div class="col-lg-2 d-flex align-items-end">
                        <button type="submit" class="btn btn-dark w-100 py-3 fw-bold">SEARCH</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Featured Vehicles Section -->
<section class="py-5 mt-5">
    <div class="container py-5">
        <div class="row align-items-end mb-5">
            <div class="col-md-7">
                <span class="text-uppercase fw-bold text-secondary small letter-spacing-2">Curated Collection</span>
                <h2 class="section-title">Available in Oujda</h2>
                <p class="section-subtitle">Explore our most popular vehicles available for immediate booking at competitive rates.</p>
            </div>
            <div class="col-md-5 text-md-end">
                <a href="{{ url('/search') }}" class="text-dark fw-bold text-decoration-none">VIEW FULL FLEET <i class="bi bi-arrow-right ms-2"></i></a>
            </div>
        </div>

        <div class="row g-4">
            @foreach($vehicles as $vehicle)
                <div class="col-md-6 col-lg-4">
                    <div class="vehicle-card">
                        <div class="card-img-wrapper">
                            <img src="https://images.unsplash.com/photo-1552519507-da3b142c6e3d?auto=format&fit=crop&q=80&w=800" alt="{{ $vehicle->make }} {{ $vehicle->model }}">
                            <div class="price-tag">
                                {{ number_format($vehicle->price_per_day, 0) }} MAD <span class="small opacity-75 fw-normal">/ day</span>
                            </div>
                        </div>
                        <div class="p-4">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <div>
                                    <span class="badge bg-light text-dark text-uppercase mb-2" style="font-size: 0.65rem; font-weight: 700; letter-spacing: 1px;">{{ $vehicle->category }}</span>
                                    <h5 class="fw-bold mb-1">{{ $vehicle->make }} {{ $vehicle->model }}</h5>
                                    <p class="text-secondary small mb-0"><i class="bi bi-shop me-1"></i> {{ $vehicle->agency->agency_name }}</p>
                                </div>
                                <div class="text-warning">
                                    <i class="bi bi-star-fill"></i> <span class="text-dark fw-bold">4.9</span>
                                </div>
                            </div>

                            <div class="vehicle-specs">
                                <div class="spec-item"><i class="bi bi-fuel-pump"></i> Diesel</div>
                                <div class="spec-item"><i class="bi bi-gear"></i> {{ $vehicle->options[2] ?? 'Auto' }}</div>
                                <div class="spec-item"><i class="bi bi-people"></i> 5 Seats</div>
                            </div>

                            <div class="d-flex gap-2">
                                <a href="{{ url('/vehicle/'.$vehicle->id) }}" class="btn btn-dark w-100 fw-bold stretched-link">BOOK NOW</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- How It Works Section -->
<section id="how-it-works" class="py-5 bg-white border-top border-bottom">
    <div class="container py-5 text-center">
        <span class="text-uppercase fw-bold text-secondary small letter-spacing-2">Seamless Process</span>
        <h2 class="section-title mb-5">Getting Started is Easy</h2>
        
        <div class="row g-5 mt-4">
            <div class="col-md-4">
                <div class="rounded-circle bg-soft-gray d-inline-flex align-items-center justify-content-center mb-4" style="width: 100px; height: 100px;">
                    <i class="bi bi-search fs-1"></i>
                </div>
                <h5 class="fw-bold mb-3">1. Select Your Drive</h5>
                <p class="text-secondary px-lg-4">Choose from a wide range of vehicles, from city cars to luxury SUVs across Oujda.</p>
            </div>
            <div class="col-md-4">
                <div class="rounded-circle bg-soft-gray d-inline-flex align-items-center justify-content-center mb-4" style="width: 100px; height: 100px;">
                    <i class="bi bi-calendar-check fs-1"></i>
                </div>
                <h5 class="fw-bold mb-3">2. Book & Confirm</h5>
                <p class="text-secondary px-lg-4">Select your dates, review the transparent pricing, and secure your booking instantly.</p>
            </div>
            <div class="col-md-4">
                <div class="rounded-circle bg-soft-gray d-inline-flex align-items-center justify-content-center mb-4" style="width: 100px; height: 100px;">
                    <i class="bi bi-key fs-1"></i>
                </div>
                <h5 class="fw-bold mb-3">3. Pickup & Explore</h5>
                <p class="text-secondary px-lg-4">Get coordinates and contact info immediately. Meet the agency and hit the road.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5 position-relative overflow-hidden" style="background: var(--primary-black);">
    <div class="container py-5 text-center position-relative z-1 text-white">
        <h2 class="section-title mb-4">Are you a Car Rental Agency?</h2>
        <p class="lead mb-5 opacity-75" style="max-width: 700px; margin: 0 auto;">Join the region's fastest-growing car rental marketplace and start reaching thousands of customers today.</p>
        <a href="{{ route('register') }}" class="btn btn-premium px-5 py-3 fw-bold">LIST YOUR FLEET ON DRIVARO</a>
    </div>
</section>

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<style>
    .letter-spacing-2 { letter-spacing: 2px; }
    .bg-soft-gray { background-color: var(--soft-gray); }
</style>
@endpush
@endsection
