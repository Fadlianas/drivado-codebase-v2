@extends('layouts.main')

@section('content')
<!-- Hero Section -->
<section class="how-it-works-hero position-relative overflow-hidden" style="background: var(--primary-black); padding: 12rem 0 8rem;">
    <!-- Large Background Shield -->
    <div class="position-absolute top-50 start-50 translate-middle d-none d-lg-block" style="margin-left: -480px; opacity: 0.05; z-index: 0;">
        <i class="bi bi-shield-check" style="font-size: 15rem; color: white;"></i>
    </div>

    <div class="container position-relative z-1 text-center text-white">
        <div class="mb-4">
            <span class="badge rounded-pill bg-white text-dark fw-bold px-3 py-2 animate__animated animate__fadeInDown">TRANSPARENT & SECURE</span>
        </div>
        <h1 class="hero-title mb-4 animate__animated animate__fadeInUp" style="font-size: 4rem;">Renting Made <br><span class="text-secondary">Remarkable.</span></h1>
        <p class="lead mb-0 opacity-75 animate__animated animate__fadeInUp animate__delay-1s mx-auto" style="max-width: 600px;">Everything you need to know about the Drivaro experience, from discovery to the open road.</p>
    </div>
</section>

<!-- Process for Renters -->
<section class="py-5 bg-white">
    <div class="container py-5">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <span class="text-uppercase fw-bold text-secondary small letter-spacing-2">The Journey</span>
                <h2 class="section-title mb-4">How to Rent a Vehicle</h2>
                <p class="text-secondary mb-5">Our platform connects you with the best local agencies in Oujda. Here is how you can get behind the wheel of your next favorite car.</p>
                
                <div class="d-flex gap-4 mb-5 animate__animated animate__fadeInLeft">
                    <div class="flex-shrink-0">
                        <div class="rounded-circle bg-dark text-white d-flex align-items-center justify-content-center fw-bold" style="width: 50px; height: 50px; font-size: 1.25rem;">1</div>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-2">Search & Compare</h5>
                        <p class="text-secondary mb-0">Browse our curated fleet of luxury and daily vehicles. Use advanced filters to find the perfect match for your needs and budget.</p>
                    </div>
                </div>

                <div class="d-flex gap-4 mb-5 animate__animated animate__fadeInLeft">
                    <div class="flex-shrink-0">
                        <div class="rounded-circle bg-dark text-white d-flex align-items-center justify-content-center fw-bold" style="width: 50px; height: 50px; font-size: 1.25rem;">2</div>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-2">Secure Your Booking</h5>
                        <p class="text-secondary mb-0">Select your dates and book instantly. Our platform handles the coordination with the agency, ensuring your vehicle is ready when you are.</p>
                    </div>
                </div>

                <div class="d-flex gap-4 animate__animated animate__fadeInLeft">
                    <div class="flex-shrink-0">
                        <div class="rounded-circle bg-dark text-white d-flex align-items-center justify-content-center fw-bold" style="width: 50px; height: 50px; font-size: 1.25rem;">3</div>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-2">Pickup & Drive</h5>
                        <p class="text-secondary mb-0">Receive the agency's contact information and precise location immediately. Meet the representative, verify the car, and enjoy your drive.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="position-relative">
                    <img src="https://images.unsplash.com/photo-1549317661-bd32c8ce0db2?auto=format&fit=crop&q=80&w=1000" class="img-fluid rounded-5 shadow-lg" alt="Renting experience">
                    <div class="position-absolute bottom-0 start-0 m-4 p-4 bg-white rounded-4 shadow-lg d-none d-md-block animate__animated animate__fadeInUp">
                        <div class="d-flex align-items-center gap-3">
                            <div class="bg-success text-white rounded-circle p-2"><i class="bi bi-shield-lock-fill fs-4"></i></div>
                            <div>
                                <h6 class="fw-bold mb-0">100% Secure</h6>
                                <p class="small text-secondary mb-0">Verified Payments & Agencies</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- For Agencies Section -->
<section class="py-5 bg-soft-gray">
    <div class="container py-5">
        <div class="row align-items-center g-5 flex-row-reverse">
            <div class="col-lg-6">
                <span class="text-uppercase fw-bold text-secondary small letter-spacing-2">Partner with Drivaro</span>
                <h2 class="section-title mb-4">Grow Your Rental Agency</h2>
                <p class="text-secondary mb-5">Drivaro is more than a marketplace; it's a growth engine for your local business. Reach thousands of customers and manage your fleet with professional tools.</p>
                
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="card border-0 p-4 rounded-4 shadow-sm h-100">
                            <i class="bi bi-graph-up-arrow text-primary fs-2 mb-3"></i>
                            <h6 class="fw-bold mb-2">Increased Visibility</h6>
                            <p class="small text-secondary mb-0">Stop worrying about marketing. We put your fleet in front of qualified customers every day.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card border-0 p-4 rounded-4 shadow-sm h-100">
                            <i class="bi bi-laptop text-primary fs-2 mb-3"></i>
                            <h6 class="fw-bold mb-2">Fleet Management</h6>
                            <p class="small text-secondary mb-0">A dedicated dashboard to manage your availability, pricing, and reservations in real-time.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card border-0 p-4 rounded-4 shadow-sm h-100">
                            <i class="bi bi-cash-stack text-primary fs-2 mb-3"></i>
                            <h6 class="fw-bold mb-2">Automated Payments</h6>
                            <p class="small text-secondary mb-0">Get paid directly and securely. No more chasing invoices or dealing with payment risks.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card border-0 p-4 rounded-4 shadow-sm h-100">
                            <i class="bi bi-star text-primary fs-2 mb-3"></i>
                            <h6 class="fw-bold mb-2">Verified Reputation</h6>
                            <p class="small text-secondary mb-0">Build trust through our verified review system and gain the 'Drivaro Trusted' badge.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <div class="bg-dark text-white p-5 rounded-5 shadow-lg position-relative overflow-hidden">
                    <h3 class="fw-bold mb-4">Start Selling Today</h3>
                    <p class="opacity-75 mb-5">It takes less than 10 minutes to register your agency and list your first vehicle.</p>
                    <a href="{{ route('register') }}" class="btn btn-premium px-5 py-3 fw-bold">JOIN AS AN AGENCY</a>
                    
                    <i class="bi bi-shop position-absolute bottom-0 end-0 opacity-10" style="font-size: 15rem; transform: rotate(-20deg);"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-5 bg-white">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="section-title">Common Questions</h2>
            <p class="text-secondary mx-auto" style="max-width: 500px;">Everything you need to know about the platform's policies.</p>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="accordion accordion-flush" id="faqAccordion">
                    <div class="accordion-item border-bottom py-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold fs-5 bg-white shadow-none text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                What documents do I need to rent?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-secondary">
                                You will typically need a valid driver's license (at least 2 years old), a national ID or passport, and a credit card for the security deposit. Requirements may vary slightly between agencies.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item border-bottom py-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold fs-5 bg-white shadow-none text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                Is insurance included in the price?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-secondary">
                                All listed prices include basic third-party liability insurance. Many agencies offer optional premium coverage (CDW, Theft Protection) during the pickup process.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item border-bottom py-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold fs-5 bg-white shadow-none text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                How does the platform fee work?
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-secondary">
                                Drivaro charges a transparent 10% commission on the booking subtotal. This fee covers platform protection, secure payment processing, and 24/7 customer support.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<style>
    .letter-spacing-2 { letter-spacing: 2px; }
    .bg-soft-gray { background-color: var(--soft-gray); }
    .accordion-button:after {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23212529'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
    }

</style>
@endpush
@endsection
