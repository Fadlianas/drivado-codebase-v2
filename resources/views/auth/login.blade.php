@extends('layouts.main')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center py-5">
        <div class="col-md-5">
            <div class="card border-0 shadow-sm p-4 p-md-5">
                <div class="text-center mb-5">
                    <h2 class="fw-bold">Welcome Back</h2>
                    <p class="text-secondary">Login to your Drivado account</p>
                </div>

                @if(session('error'))
                    <div class="alert alert-danger border-0 small">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ url('/login') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="form-label fw-bold small text-uppercase">Email Address</label>
                        <input type="email" name="email" class="form-control form-control-lg" required autofocus>
                    </div>

                    <div class="mb-4">
                        <div class="d-flex justify-content-between">
                            <label class="form-label fw-bold small text-uppercase">Password</label>
                            <a href="#" class="small text-decoration-none text-dark">Forgot?</a>
                        </div>
                        <input type="password" name="password" class="form-control form-control-lg" required>
                    </div>

                    <div class="mb-4 form-check">
                        <input type="checkbox" class="form-check-input" id="remember">
                        <label class="form-check-label small" for="remember">Remember me on this device</label>
                    </div>

                    <button type="submit" class="btn btn-dark btn-lg w-100 fw-bold py-3 mb-4">LOG IN</button>

                    <div class="text-center">
                        <p class="text-secondary small mb-0">Don't have an account? <a href="{{ url('/register') }}" class="text-dark fw-bold text-decoration-none">Sign up for free</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
