@extends('layouts.main')

@section('content')
<div class="min-vh-100 d-flex align-items-center bg-light">
    <div class="container py-5">
        <div class="row justify-content-center text-center">
            <div class="col-lg-6">
                <div class="card border-0 shadow-lg p-5 rounded-5 bg-white">
                    <div class="mb-5 animate__animated animate__pulse animate__infinite">
                        <div class="rounded-circle bg-dark text-white d-inline-flex align-items-center justify-content-center" style="width: 100px; height: 100px;">
                            <i class="bi bi-clock-history fs-1"></i>
                        </div>
                    </div>
                    
                    <h2 class="fw-800 mb-3">Application Under Review</h2>
                    <p class="text-secondary lead mb-5">Your agency account is currently being reviewed by our administration team. This process typically takes less than 24 hours.</p>
                    
                    <div class="p-4 bg-soft-gray rounded-4 mb-5 text-start">
                        <h6 class="fw-bold mb-3 small text-uppercase letter-spacing-1">What's next?</h6>
                        <ul class="list-unstyled small text-secondary mb-0">
                            <li class="mb-2"><i class="bi bi-check2-circle text-success me-2"></i> We verify your legal documentation.</li>
                            <li class="mb-2"><i class="bi bi-check2-circle text-success me-2"></i> We confirm your business location in Oujda.</li>
                            <li><i class="bi bi-check2-circle text-success me-2"></i> You'll receive full access to your dashboard.</li>
                        </ul>
                    </div>

                    <div class="d-grid gap-3">
                        <a href="{{ url('/') }}" class="btn btn-dark py-3 fw-bold rounded-pill">GO BACK HOME</a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-link text-secondary text-decoration-none small fw-bold">Sign out & Check later</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<style>
    .fw-800 { font-weight: 800; }
    .letter-spacing-1 { letter-spacing: 1px; }
    .bg-soft-gray { background-color: var(--soft-gray); }
</style>
@endpush
@endsection
