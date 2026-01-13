@extends('admin.master')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h3 class="fw-bold text-dark m-0">
                @if ($id == 4) 
                    <i class="fas fa-chalkboard-teacher text-primary me-2"></i> Teacher Directory
                @else
                    <i class="fas fa-users text-primary me-2"></i> Course Wise Statistics
                @endif
            </h3>
            <p class="text-muted small mb-0">Manage and view all registered members in this category.</p>
        </div>
        <a href="{{ url()->previous() }}" class="btn btn-outline-secondary btn-sm rounded-pill px-3">
            <i class="fas fa-arrow-left me-1"></i> Back
        </a>
    </div>

    <div class="card shadow-sm border-0 rounded-4 overflow-hidden">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4 py-3 text-uppercase small fw-bold">Member</th>
                            <th class="py-3 text-uppercase small fw-bold">District</th>
                            <th class="py-3 text-uppercase small fw-bold">Contact</th>
                            <th class="py-3 text-uppercase small fw-bold text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($students as $student)
                        <tr>
                            <td class="ps-4">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm me-3 d-flex align-items-center justify-content-center rounded-circle shadow-sm" 
                                         style="width: 40px; height: 40px; background-color: var(--brand-primary); color: #ffffff !important; font-weight: bold; flex-shrink: 0;">
                                        {{ strtoupper(substr($student->name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <div class="fw-bold text-dark">{{ $student->name }}</div>
                                        <div class="text-muted small">ID: #{{ $student->id + 2024000 }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-light text-dark border px-3 py-2 rounded-pill">
                                    <i class="fas fa-map-marker-alt text-danger me-1"></i> {{ $student->district }}
                                </span>
                            </td>
                            <td>
                                <div class="fw-semibold">{{ $student->phone_number }}</div>
                                <div class="small text-muted">Active Mobile</div>
                            </td>
                            <td class="text-center px-4">
                                <a href="{{ route('user.student.profile', $student->id) }}" 
                                   class="btn btn-brand-primary btn-sm rounded-pill px-3 shadow-sm">
                                    <i class="fas fa-eye me-1"></i> View Profile
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-5">
                                <div class="py-4">
                                    <i class="fas fa-folder-open fa-3x text-light mb-3"></i>
                                    <h5 class="text-muted">No Data Found</h5>
                                    <p class="small text-muted">
                                        @if ($id == 4)
                                            No Teachers are registered in this section yet.
                                        @else
                                            No Students are registered in this course yet.
                                        @endif
                                    </p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
       
        <div class="card-footer bg-white border-top-0 py-3 px-4">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    <span class="small text-muted fw-semibold">
                        Showing <span class="text-dark">{{ $students->firstItem() ?? 0 }}</span> 
                        to <span class="text-dark">{{ $students->lastItem() ?? 0 }}</span> 
                        of <span class="text-dark">{{ $students->total() }}</span> members
                    </span>
                </div>
                <div class="col-md-6 d-flex justify-content-center justify-content-md-end">
                    {{ $students->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection