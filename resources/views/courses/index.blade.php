@extends('admin.master')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex align-items-center justify-content-between mb-4 px-2">
        <div>
            <h3 class="fw-bold text-dark m-0">Course & Role Statistics</h3>
            <p class="text-muted small m-0">Overview of total registrations by course and role.</p>
        </div>
        <div class="bg-white p-2 rounded shadow-sm">
            <span class="badge bg-primary px-3 py-2 rounded-pill">Total Categories: {{ $courses->count() }}</span>
        </div>
    </div>

    <div class="card shadow-sm border-0 rounded-4 overflow-hidden">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4 py-3 text-uppercase small fw-bold" style="width: 80px;">ID</th>
                            <th class="py-3 text-uppercase small fw-bold">Course / Category Name</th>
                            <th class="py-3 text-uppercase small fw-bold">Code</th>
                            <th class="py-3 text-uppercase small fw-bold">Total Members</th>
                            <th class="py-3 text-uppercase small fw-bold text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($courses as $course)
                        <tr>
                            <td class="ps-4 fw-bold text-muted">#{{ $course->id }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="p-2 bg-primary-subtle rounded-3 me-3 text-primary">
                                        @if($course->id == 4)
                                            <i class="fas fa-chalkboard-teacher fa-lg"></i>
                                        @elseif($course->id == 5)
                                            <i class="fas fa-user-shield fa-lg"></i>
                                        @else
                                            <i class="fas fa-book-reader fa-lg"></i>
                                        @endif
                                    </div>
                                    <span class="fw-bold text-dark fs-6">{{ $course->name }}</span>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-light text-secondary border px-3 py-2">{{ $course->course_code }}</span>
                            </td>
                            <td>
                                @php
                                    $badgeClass = 'bg-info-subtle text-info';
                                    $label = 'Students';
                                    if($course->id == 4) { $badgeClass = 'bg-success-subtle text-success'; $label = 'Teachers'; }
                                    elseif($course->id == 5) { $badgeClass = 'bg-warning-subtle text-warning'; $label = 'Staffs'; }
                                @endphp
                                <div class="d-inline-flex align-items-center px-3 py-1 rounded-pill {{ $badgeClass }} fw-bold border">
                                    <i class="fas fa-users me-2"></i>
                                    {{ $course->tourists_count }} {{ $label }}
                                </div>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('courses.courseWise', $course->id) }}" class="btn btn-brand-primary btn-sm px-4 rounded-pill shadow-sm">
                                    <i class="fas fa-list-ul me-1"></i> View List
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
        @if($tourists->hasPages())
        <div class="card-footer bg-white border-top-0 py-4 px-4">
            <div class="d-flex justify-content-center">
                {{ $tourists->links('pagination::bootstrap-5') }}
            </div>
        </div>
        @endif
    </div>
</div>
@endsection