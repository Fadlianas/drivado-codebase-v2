@extends('layouts.main')

@section('content')
<!-- Header with extra padding to avoid navbar overlap -->
<div class="search-header" style="background: var(--primary-black); color: white; padding-top: 120px; padding-bottom: 60px;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="fw-800 display-5 mb-2">Explore Our Fleet</h1>
                <p class="opacity-75 lead mb-0">Discover the perfect vehicle for your next journey in Oujda.</p>
            </div>
            <div class="col-md-4 text-md-end mt-4 mt-md-0">
                <div class="btn-group p-1 bg-white bg-opacity-10 rounded-pill">
                    <button class="btn btn-premium rounded-pill px-4 active" id="btn-grid-view">
                        <i class="bi bi-grid-fill me-2"></i> GRID
                    </button>
                    <button class="btn btn-outline-light border-0 rounded-pill px-4" id="btn-map-view">
                        <i class="bi bi-map-fill me-2"></i> MAP
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Inline Map View (Hidden by default) -->
<div id="map-container" class="border-bottom d-none" style="height: 400px; background: #eee;">
    <div id="map" style="height: 100%;"></div>
</div>

<div class="container py-5">
    <div class="row g-4">
        <!-- Sidebar Filters -->
        <div class="col-lg-3">
            <div class="filter-sidebar card border-0 shadow-sm p-4 sticky-top" style="top: 100px; z-index: 10; border-radius: 20px;">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="fw-bold mb-0">Filters</h5>
                    <a href="{{ url('/search') }}" class="text-secondary small text-decoration-none">Reset</a>
                </div>
                
                <form action="{{ url('/search') }}" method="GET">
                    <div class="mb-4">
                        <label class="form-label fw-bold small text-uppercase mb-3">Location</label>
                        <input type="text" name="location" class="form-control border-0 bg-light rounded-3" value="{{ request('location') }}" placeholder="City or Agency">
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold small text-uppercase mb-3">Category</label>
                        <select name="category" class="form-select border-0 bg-light rounded-3" onchange="this.form.submit()">
                            <option value="">All Categories</option>
                            <option value="suv" {{ request('category') == 'suv' ? 'selected' : '' }}>SUV</option>
                            <option value="sedan" {{ request('category') == 'sedan' ? 'selected' : '' }}>Sedan</option>
                            <option value="city" {{ request('category') == 'city' ? 'selected' : '' }}>City Car</option>
                            <option value="luxury" {{ request('category') == 'luxury' ? 'selected' : '' }}>Luxury</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold small text-uppercase mb-3">Daily Budget</label>
                        <div class="d-flex gap-2 align-items-center">
                            <input type="number" name="min_price" class="form-control border-0 bg-light rounded-3" placeholder="Min" value="{{ request('min_price') }}">
                            <span class="text-secondary">-</span>
                            <input type="number" name="max_price" class="form-control border-0 bg-light rounded-3" placeholder="Max" value="{{ request('max_price') }}">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-dark w-100 fw-bold py-3">APPLY FILTERS</button>
                </form>

                <!-- Small Info Card -->
                <div class="mt-4 p-3 bg-soft-gray rounded-4 border">
                    <p class="small text-secondary mb-0"><i class="bi bi-info-circle me-2"></i> All prices include platform protection and basic insurance.</p>
                </div>
            </div>
        </div>

        <!-- Search Results -->
        <div class="col-lg-9">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold mb-0">{{ $vehicles->total() }} Vehicles Available</h4>
                <div class="dropdown">
                    <button class="btn btn-white border-0 shadow-sm rounded-pill px-4 dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        Sort by: Newest
                    </button>
                    <ul class="dropdown-menu border-0 shadow-lg">
                        <li><a class="dropdown-item" href="#">Price: Low to High</a></li>
                        <li><a class="dropdown-item" href="#">Price: High to Low</a></li>
                        <li><a class="dropdown-item" href="#">Newest First</a></li>
                    </ul>
                </div>
            </div>

            <div class="row g-4" id="grid-view">
                @forelse($vehicles as $vehicle)
                    <div class="col-md-6 col-xl-4">
                        <div class="vehicle-card shadow-sm">
                            <div class="card-img-wrapper">
                                <img src="https://images.unsplash.com/photo-1549317661-bd32c8ce0db2?auto=format&fit=crop&q=80&w=800" alt="...">
                                <div class="price-tag">
                                    {{ number_format($vehicle->price_per_day, 0) }} MAD <span class="small opacity-75 fw-normal">/ day</span>
                                </div>
                            </div>
                            <div class="p-4">
                                <span class="badge bg-light text-dark text-uppercase mb-2" style="font-size: 0.65rem; font-weight: 700;">{{ $vehicle->category }}</span>
                                <h6 class="fw-bold mb-1">{{ $vehicle->make }} {{ $vehicle->model }}</h6>
                                <p class="text-secondary small mb-3"><i class="bi bi-shop me-1"></i> {{ $vehicle->agency->agency_name }}</p>
                                
                                <div class="d-flex gap-2">
                                    <a href="{{ url('/vehicle/'.$vehicle->id) }}" class="btn btn-dark w-100 fw-bold py-2">DETAILS</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <img src="https://illustrations.popsy.co/white/car-service.svg" alt="No results" style="height: 200px;" class="mb-4">
                        <h4 class="fw-bold">No results found</h4>
                        <p class="text-secondary mb-4">Try adjusting your filters to see more vehicles.</p>
                        <a href="{{ url('/search') }}" class="btn btn-dark fw-bold px-4">CLEAR ALL FILTERS</a>
                    </div>
                @endforelse
            </div>

            <div class="mt-5 d-flex justify-content-center">
                {{ $vehicles->links() }}
            </div>
        </div>
    </div>
</div>

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<style>
    .fw-800 { font-weight: 800; }
    .bg-soft-gray { background-color: var(--soft-gray); }
    /* Fix potential overlap on very small screens */
    @media (max-width: 991px) {
        .filter-sidebar { position: static !important; margin-bottom: 2rem; }
    }
</style>
@endpush

@push('scripts')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const btnGrid = document.getElementById('btn-grid-view');
        const btnMap = document.getElementById('btn-map-view');
        const mapContainer = document.getElementById('map-container');
        const gridView = document.getElementById('grid-view');
        
        let map;

        btnMap.addEventListener('click', function() {
            btnMap.classList.add('btn-premium', 'active');
            btnMap.classList.remove('btn-outline-light');
            btnGrid.classList.remove('btn-premium', 'active');
            btnGrid.classList.add('btn-outline-light');
            
            mapContainer.classList.remove('d-none');
            
            if (!map) {
                map = L.map('map').setView([34.6867, -1.9114], 13);
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

                @foreach($vehicles as $vehicle)
                    @if($vehicle->agency->latitude && $vehicle->agency->longitude)
                        L.marker([{{ $vehicle->agency->latitude }}, {{ $vehicle->agency->longitude }}])
                            .addTo(map)
                            .bindPopup(`
                                <div class="text-center p-2">
                                    <h6 class="fw-bold mb-1">{{ $vehicle->make }} {{ $vehicle->model }}</h6>
                                    <p class="small text-secondary mb-2">{{ $vehicle->agency->agency_name }}</p>
                                    <a href="{{ url('/vehicle/'.$vehicle->id) }}" class="btn btn-dark btn-sm fw-bold px-3">BOOK NOW</a>
                                </div>
                            `);
                    @endif
                @endforeach
            } else {
                setTimeout(() => map.invalidateSize(), 100);
            }
        });

        btnGrid.addEventListener('click', function() {
            btnGrid.classList.add('btn-premium', 'active');
            btnGrid.classList.remove('btn-outline-light');
            btnMap.classList.remove('btn-premium', 'active');
            btnMap.classList.add('btn-outline-light');
            
            mapContainer.classList.add('d-none');
        });
    });
</script>
@endpush
@endsection
