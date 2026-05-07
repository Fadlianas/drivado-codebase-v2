@extends('layouts.main')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center py-5">
        <div class="col-md-7 text-center">
            <div class="mb-4">
                <i class="bi bi-check-circle-fill text-success" style="font-size: 5rem;"></i>
            </div>
            <h2 class="fw-bold mb-3">Booking Confirmed!</h2>
            <p class="lead text-secondary mb-5">Your reservation #{{ $booking->id }} has been successfully placed. We've sent a confirmation email to your address.</p>

            <div class="card border-0 shadow-sm p-4 p-md-5 text-start mb-4">
                <h5 class="fw-bold mb-4 border-bottom pb-2">What's Next?</h5>
                
                <div class="row g-4">
                    <div class="col-md-6">
                        <p class="text-secondary small fw-bold text-uppercase mb-1">Pickup Information</p>
                        <p class="mb-0 fw-bold">{{ $booking->agency->agency_name }}</p>
                        <p class="mb-0 text-secondary small">{{ $booking->agency->address }}</p>
                        <p class="mb-0 text-secondary small">{{ $booking->agency->city }}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="text-secondary small fw-bold text-uppercase mb-1">Contact Agency</p>
                        <p class="mb-0 fw-bold"><i class="bi bi-telephone me-2"></i>{{ $booking->agency->phone }}</p>
                        <p class="text-secondary small">Call the agency to coordinate your arrival.</p>
                    </div>
                </div>

                <hr class="my-4">

                <div class="d-flex align-items-center">
                    <img src="https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?auto=format&fit=crop&q=80&w=100" class="rounded me-3" alt="">
                    <div>
                        <h6 class="fw-bold mb-0">{{ $booking->vehicle->make }} {{ $booking->vehicle->model }}</h6>
                        <p class="text-secondary small mb-0">{{ $booking->start_date->format('M d, Y') }} - {{ $booking->end_date->format('M d, Y') }}</p>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center gap-3">
                <a href="{{ url('/') }}" class="btn btn-outline-dark fw-bold px-4">BACK TO HOME</a>
                <a href="#" class="btn btn-dark fw-bold px-4">MANAGE BOOKINGS</a>
            </div>
        </div>
    </div>
</div>
@endsection
