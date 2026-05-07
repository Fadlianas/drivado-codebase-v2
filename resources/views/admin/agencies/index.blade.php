@extends('layouts.main')

@section('content')
<div class="container py-5">
    <div class="row">
        <!-- Sidebar (Reused) -->
        <div class="col-lg-3">
            <div class="card border-0 shadow-sm p-4 mb-4">
                <ul class="nav flex-column gap-2">
                    <li class="nav-item">
                        <a class="nav-link text-secondary" href="{{ route('admin.dashboard') }}">
                            <i class="bi bi-speedometer2 me-2"></i> Overview
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fw-bold text-dark" href="{{ route('admin.agencies') }}">
                            <i class="bi bi-shop me-2"></i> Agencies
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-lg-9">
            <h3 class="fw-bold mb-4">Manage Agencies</h3>

            @if(session('success'))
                <div class="alert alert-success border-0 mb-4">{{ session('success') }}</div>
            @endif

            <div class="card border-0 shadow-sm overflow-hidden">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Agency / Owner</th>
                                <th>City</th>
                                <th>Legal ID</th>
                                <th>Status</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($agencies as $agency)
                                <tr>
                                    <td>
                                        <div class="fw-bold">{{ $agency->agency_name }}</div>
                                        <div class="text-secondary small">{{ $agency->user->name }} &middot; {{ $agency->user->email }}</div>
                                    </td>
                                    <td>{{ $agency->city }}</td>
                                    <td><code>{{ $agency->legal_id }}</code></td>
                                    <td>
                                        <span class="badge bg-{{ $agency->status == 'approved' ? 'success' : ($agency->status == 'pending' ? 'warning' : 'danger') }} px-3">
                                            {{ ucfirst($agency->status) }}
                                        </span>
                                    </td>
                                    <td class="text-end">
                                        @if($agency->status == 'pending')
                                            <div class="d-flex justify-content-end gap-2">
                                                <form action="{{ route('admin.agencies.approve', $agency->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-sm btn-success fw-bold">APPROVE</button>
                                                </form>
                                                <form action="{{ route('admin.agencies.reject', $agency->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger fw-bold">REJECT</button>
                                                </form>
                                            </div>
                                        @else
                                            <span class="text-secondary small">Processed</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-5 text-secondary">No agencies found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="mt-4">
                {{ $agencies->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
