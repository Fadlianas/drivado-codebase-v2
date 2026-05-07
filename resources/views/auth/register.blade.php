@extends('layouts.main')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center py-5">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm p-4 p-md-5">
                <div class="text-center mb-5">
                    <h2 class="fw-bold">Create Account</h2>
                    <p class="text-secondary">Join the premium car rental marketplace</p>
                </div>

                <form action="{{ url('/register') }}" method="POST">
                    @csrf
                    
                    <div class="row g-3 mb-4">
                        <div class="col-md-12">
                            <label class="form-label fw-bold small text-uppercase">Account Type</label>
                            <div class="d-flex gap-3">
                                <div class="flex-fill">
                                    <input type="radio" class="btn-check" name="role" id="role-user" value="user" checked>
                                    <label class="btn btn-outline-dark w-100 py-2 fw-bold" for="role-user">I am a Client</label>
                                </div>
                                <div class="flex-fill">
                                    <input type="radio" class="btn-check" name="role" id="role-agency" value="agency">
                                    <label class="btn btn-outline-dark w-100 py-2 fw-bold" for="role-agency">I am an Agency</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold small text-uppercase">Full Name</label>
                        <input type="text" name="name" class="form-control form-control-lg" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold small text-uppercase">Email Address</label>
                        <input type="email" name="email" class="form-control form-control-lg" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold small text-uppercase">Phone Number</label>
                        <input type="text" name="phone" class="form-control form-control-lg" required>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="form-label fw-bold small text-uppercase">Password</label>
                            <input type="password" name="password" class="form-control form-control-lg" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold small text-uppercase">Confirm</label>
                            <input type="password" name="password_confirmation" class="form-control form-control-lg" required>
                        </div>
                    </div>

                    <!-- Agency Specific Fields (Hidden by default) -->
                    <div id="agency-fields" style="display: none;">
                        <hr class="my-4">
                        <h6 class="fw-bold mb-3">Agency Information</h6>
                        <div class="mb-4">
                            <label class="form-label fw-bold small text-uppercase">Agency Name</label>
                            <input type="text" name="agency_name" class="form-control form-control-lg">
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-bold small text-uppercase">Legal ID (SIRET/ICE)</label>
                            <input type="text" name="legal_id" class="form-control form-control-lg">
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-bold small text-uppercase">City</label>
                            <input type="text" name="city" class="form-control form-control-lg">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-dark btn-lg w-100 fw-bold py-3 mb-4 mt-2">CREATE ACCOUNT</button>

                    <div class="text-center">
                        <p class="text-secondary small mb-0">Already have an account? <a href="{{ url('/login') }}" class="text-dark fw-bold text-decoration-none">Log in here</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const roleUser = document.getElementById('role-user');
        const roleAgency = document.getElementById('role-agency');
        const agencyFields = document.getElementById('agency-fields');

        roleUser.addEventListener('change', () => agencyFields.style.display = 'none');
        roleAgency.addEventListener('change', () => agencyFields.style.display = 'block');
    });
</script>
@endpush
@endsection
