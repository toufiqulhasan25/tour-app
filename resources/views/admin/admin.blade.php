@extends('admin.master')
@section('content')

<div class="container-fluid px-2 px-md-4 py-4">
    <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between gap-3 mb-4">
        <h1 class="h3 mb-0 text-gray-800 fw-bold">Student Management</h1>
        <a href="{{ route('admin.report.download') }}" class="btn btn-sm btn-brand-primary shadow-sm fw-bold px-3 py-2">
            <i class="fas fa-download fa-sm text-white-50 me-2"></i>Generate Report
        </a>
    </div>

    <div class="row g-3 mb-4">
        @php
            $stats = [
                ['label' => 'Total Applied', 'value' => $totalStudents, 'color' => 'primary', 'icon' => 'users'],
                ['label' => 'Active', 'value' => $activeStudents, 'color' => 'success', 'icon' => 'user-check'],
                ['label' => 'Pending', 'value' => $pendingStudents, 'color' => 'warning', 'icon' => 'hourglass-half'],
                ['label' => 'Rejected', 'value' => $rejectedStudents, 'color' => 'danger', 'icon' => 'user-times']
            ];
        @endphp

        @foreach($stats as $stat)
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 border-start border-{{ $stat['color'] }} border-4 shadow-sm h-100 py-2 card-hover">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="text-xs font-weight-bold text-{{ $stat['color'] }} text-uppercase mb-1 fw-bold">{{ $stat['label'] }}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($stat['value']) }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-{{ $stat['icon'] }} fa-2x text-gray-200"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="card shadow border-0 rounded-3 overflow-hidden">
        <div class="card-header py-3 bg-white border-bottom">
            <div class="row g-3 align-items-center">
                <div class="col-12 col-md-4">
                    <h6 class="m-0 font-weight-bold text-brand-primary text-center text-md-start">All Data Table</h6>
                </div>
                <div class="col-12 col-md-8">
                    <div class="d-flex flex-column flex-sm-row justify-content-md-end gap-2">
                        <form action="{{ route('home') }}" method="GET" class="flex-grow-1 flex-sm-grow-0" style="max-width: 300px;">
                            <div class="input-group input-group-sm">
                                <input type="text" name="search" value="{{ request('search') }}" 
                                       class="form-control bg-light border-0 px-3" 
                                       placeholder="Search name, ID, Phone...">
                                <button class="btn btn-brand-primary" type="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </form>

                        <div class="dropdown">
                            <button class="btn btn-sm btn-light border w-100 shadow-none dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                <i class="fas fa-filter fa-sm me-1 text-gray-600"></i> Filters
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow border-0">
                                <li><h6 class="dropdown-header">Filter By Status:</h6></li>
                                <li><a class="dropdown-item" href="{{ route('home') }}">Show All</a></li>
                                <li><a class="dropdown-item" href="{{ route('home', ['status' => 'active']) }}">Active Only</a></li>
                                <li><a class="dropdown-item" href="{{ route('home', ['status' => 'pending']) }}">Pending Only</a></li>
                                <li><a class="dropdown-item" href="{{ route('home', ['status' => 'rejected']) }}">Rejected Only</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0" style="min-width: 800px;">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4 py-3 border-0">Profile</th>
                            <th class="py-3 border-0">Contact Info</th>
                            <th class="py-3 border-0">Course & Batch</th>
                            <th class="py-3 border-0">Status</th>
                            <th class="text-end pe-4 py-3 border-0">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($tourists as $tourist)
                        <tr>
                            <td class="ps-4">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm me-3 bg-brand-primary d-flex align-items-center justify-content-center rounded-circle shadow-sm" 
                                         style="width: 35px; height: 35px; flex-shrink: 0; color: #1e0c0c !important; font-weight: bold; font-size: 14px;">
                                        {{ strtoupper(substr($tourist->name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <h6 class="mb-0 text-dark fw-bold">{{ $tourist->name }}</h6>
                                        <small class="text-muted text-uppercase fw-semibold" style="font-size: 0.7rem;">{{ $tourist->student_id }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="fw-semibold text-dark">{{ $tourist->phone_number }}</div>
                                <div class="small text-muted"><i class="fas fa-map-marker-alt me-1"></i>{{ $tourist->district }}</div>
                            </td>
                            <td>
                                <span class="badge bg-light text-primary border border-primary-subtle px-2">{{ $tourist->course->name ?? 'No Course' }}</span>
                                <div class="small text-muted mt-1">Batch: {{ $tourist->batch ?? 'N/A' }}</div>
                            </td>
                            <td>
                                @php
                                    $statusColor = match($tourist->status) {
                                        'active' => 'success',
                                        'pending' => 'warning',
                                        'rejected' => 'danger',
                                        default => 'secondary'
                                    };
                                @endphp
                                <span class="badge bg-{{ $statusColor }}-subtle text-{{ $statusColor }} px-3 py-2 rounded-pill fw-bold text-uppercase" style="font-size: 0.65rem;">
                                    <i class="fas @if($tourist->status == 'active') fa-check-circle @else fa-circle @endif me-1"></i> {{ $tourist->status }}
                                </span>
                            </td>
                            <td class="text-end pe-4">
                                <div class="d-flex justify-content-end gap-2">
                                    {{-- View Button --}}
                                    <a href="{{ route('tourist.showProfile', $tourist->id) }}" 
                                       class="btn btn-sm btn-light border shadow-sm rounded-circle d-flex align-items-center justify-content-center" 
                                       style="width: 32px; height: 32px;" 
                                       title="View Details">
                                        <i class="fas fa-eye text-primary"></i>
                                    </a>
                            
                                    {{-- Delete Button --}}
                                    <form action="{{ route('student.delete', $tourist->id) }}" method="POST" 
                                          onsubmit="return confirm('Are you sure you want to delete this registration?');" 
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-sm btn-light border shadow-sm rounded-circle d-flex align-items-center justify-content-center" 
                                                style="width: 32px; height: 32px;" 
                                                title="Delete Registration">
                                            <i class="fas fa-trash-alt text-danger"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-5">
                                <img src="https://illustrations.popsy.co/gray/no-data.svg" style="width: 150px;" alt="No Data">
                                <p class="text-muted mt-3">No students found matching your criteria.</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer bg-white py-3 border-top">
            <div class="row align-items-center">
                <div class="col-12 col-sm-6 text-center text-sm-start mb-3 mb-sm-0">
                    <p class="small text-muted mb-0">
                        Showing {{ $tourists->firstItem() ?? 0 }} to {{ $tourists->lastItem() ?? 0 }} of {{ $tourists->total() }} students
                    </p>
                </div>
                <div class="col-12 col-sm-6 d-flex justify-content-center justify-content-sm-end">
                    {{ $tourists->withQueryString()->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection