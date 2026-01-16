@extends('user.master')

@section('body')
<div class="niyd-dashboard-content py-4">
    
    <div class="mb-4 px-2">
        <h4 class="fw-bold text-dark mb-1">Welcome back, {{ auth()->user()->name }}!</h4>
        <p class="text-muted small">Manage your tour registrations and account details from here.</p>
    </div>

    @php
        $deadline = \Carbon\Carbon::create(2026, 1, 20, 0, 0, 0);
        $isExpired = \Carbon\Carbon::now()->greaterThanOrEqualTo($deadline);
    @endphp

    @if($tourists->isEmpty())
        <div class="row px-2">
            <div class="col-xl-4 col-md-6">
                @if(!$isExpired)
                    <a href="{{ route('tourist.create') }}" class="text-decoration-none">
                        <div class="card border-0 shadow-sm rounded-4 text-white overflow-hidden card-hover position-relative" 
                             style="background: linear-gradient(135deg, #4e73df 0%, #224abe 100%); transition: all 0.3s;">
                            <div class="card-body p-4 text-center">
                                <div class="mb-3 opacity-50">
                                    <i class="fas fa-bus-alt fa-3x text-white"></i>
                                </div>
                                <h5 class="fw-bold mb-1 text-white">Register For Tour 2026</h5>
                                <p class="small mb-3 text-white-50">Join our annual tour! Click here to start your application.</p>
                                <span class="btn btn-light btn-sm fw-bold rounded-pill px-4 shadow-sm text-primary">
                                    Register Now <i class="fas fa-arrow-right ms-1"></i>
                                </span>
                            </div>
                        </div>
                    </a>
                @else
                    <div class="card border-0 shadow-sm rounded-4 bg-white p-4 text-center">
                        <div class="mb-3 text-danger opacity-50">
                            <i class="fas fa-calendar-times fa-3x"></i>
                        </div>
                        <h5 class="fw-bold text-dark">Registration Closed</h5>
                        <p class="text-muted small">The deadline (19th Jan Midnight) has passed. Stay tuned for the next trip!</p>
                        <span class="badge bg-danger-subtle text-danger p-2 rounded-pill small">Tour starts: 19th Night</span>
                    </div>
                @endif
            </div>
        </div>
    @else
        <div class="row g-4 mb-5 px-2">
            @foreach($tourists as $tourist)
            <div class="col-xl-4 col-lg-6">
                <div class="card border-0 shadow-sm rounded-4 bg-white" style="border-top: 4px solid #4e73df !important;">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-4">
                            <div class="rounded-3 p-3 me-3" style="background-color: #e0e7ff; color: #4e73df;">
                                <i class="fas {{ in_array($tourist->course_id, [4, 5]) ? 'fa-chalkboard-teacher' : 'fa-user-graduate' }} fa-2x"></i>
                            </div>
                            <div>
                                <h6 class="mb-0 fw-bold text-dark">{{ $tourist->name }}</h6>
                                <small class="text-muted">ID: {{ $tourist->student_id }}</small>
                            </div>
                            <div class="ms-auto">
                                @php
                                    $statusStyle = [
                                        'active' => 'background: #dcfce7; color: #15803d;',
                                        'pending' => 'background: #fef9c3; color: #854d0e;',
                                        'rejected' => 'background: #fee2e2; color: #b91c1c;'
                                    ];
                                    $currentStatus = strtolower($tourist->status);
                                    $style = $statusStyle[$currentStatus] ?? 'background: #f3f4f6; color: #374151;';
                                @endphp
                                <span class="badge rounded-pill px-3 py-2 fw-bold" style="{{ $style }} border: 1px solid rgba(0,0,0,0.05);">
                                    {{ ucfirst($tourist->status) }}
                                </span>
                            </div>
                        </div>
                        
                        <div class="row g-3 mb-4 rounded-3 p-2 mx-0" style="background-color: #f8fafc; border: 1px solid #f1f5f9;">
                            <div class="col-6 border-end">
                                <small class="text-muted d-block fw-bold text-uppercase" style="font-size: 0.65rem; letter-spacing: 0.5px;">Type</small>
                                <span class="text-dark fw-bold small">
                                    {{ $tourist->course_id == 4 ? 'Teacher' : ($tourist->course_id == 5 ? 'Staff' : 'Student') }}
                                </span>
                            </div>
                            <div class="col-6 ps-3">
                                <small class="text-muted d-block fw-bold text-uppercase" style="font-size: 0.65rem; letter-spacing: 0.5px;">
                                    {{ in_array($tourist->course_id, [4, 5]) ? 'Designation' : 'Batch' }}
                                </small>
                                <span class="text-dark fw-bold small">{{ $tourist->batch ?? 'N/A' }}</span>
                            </div>
                        </div>

                        <div class="d-grid">
                            <a href="{{ route('user.student.profile', $tourist->id) }}" class="btn btn-outline-primary fw-bold rounded-pill shadow-sm py-2">
                                <i class="fas fa-file-alt me-2"></i> View Application
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="card shadow-sm border-0 rounded-4 overflow-hidden mx-2">
            <div class="card-header py-3 bg-white border-bottom d-flex align-items-center justify-content-between">
                <h6 class="m-0 fw-bold" style="color: #4e73df;">
                    <i class="fas fa-history me-2"></i>Registration Status History
                </h6>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead style="background-color: #f8fafc;">
                            <tr>
                                <th class="ps-4 border-0 small fw-bold text-muted text-uppercase">ID & Name</th>
                                <th class="border-0 small fw-bold text-muted text-uppercase">Contact</th>
                                <th class="border-0 small fw-bold text-muted text-uppercase">Applied Date</th>
                                <th class="border-0 small fw-bold text-muted text-uppercase text-center">Status</th>
                                <th class="text-end pe-4 border-0 small fw-bold text-muted text-uppercase">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tourists as $tourist)
                                <tr>
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm rounded-circle me-3 d-flex align-items-center justify-content-center fw-bold" 
                                                 style="width: 38px; height: 38px; background: #eef2ff; color: #4e73df; font-size: 0.9rem;">
                                                {{ substr($tourist->name, 0, 1) }}
                                            </div>
                                            <div>
                                                <div class="fw-bold text-dark small mb-0">{{ $tourist->name }}</div>
                                                <small class="text-muted" style="font-size: 0.75rem;">ID: {{ $tourist->student_id }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="small fw-medium">{{ $tourist->phone_number }}</td>
                                    <td class="small text-muted">{{ $tourist->created_at->format('d M, Y') }}</td>
                                    <td class="text-center">
                                        @php
                                            $currentStatus = strtolower($tourist->status);
                                            $style = $statusStyle[$currentStatus] ?? '';
                                        @endphp
                                        <span class="badge rounded-pill px-3 py-1 fw-bold border" style="{{ $style }} font-size: 0.75rem;">
                                            {{ ucfirst($tourist->status) }}
                                        </span>
                                    </td>
                                    <td class="text-end pe-4">
                                        <a href="{{ route('user.student.profile', $tourist->id) }}" class="btn btn-sm btn-light border rounded-pill px-3 fw-bold text-primary">
                                            Manage
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
</div>

<style>
    .niyd-dashboard-content .card-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(78, 115, 223, 0.2) !important;
    }
    .niyd-dashboard-content .table thead th {
        letter-spacing: 0.5px;
        padding: 15px 10px;
    }
    .niyd-dashboard-content .table tbody td {
        padding: 15px 10px;
        border-color: #f1f5f9;
    }
</style>
@endsection