@extends('admin.master')
@section('content')
<div class="container py-5">
    <div class="card shadow border-0">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Course/Roll Wise Statistics</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Course Name</th>
                            <th>Course Code</th>
                            <th>Total Students</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($courses as $course)
                        
                        <tr>
                            <td>{{ $course->id }}</td>
                            <td><strong>{{ $course->name }}</strong></td>
                            <td><span class="badge bg-secondary">{{ $course->course_code }}</span></td>
                            <td>
                                <span class="badge bg-info text-dark">
                                    <i class="fas fa-users me-1"></i> {{ $course->tourists_count }} 
                                    @if ($course->id == 4)
                                    Teachers
                                    @elseif ($course->id ==5)
                                    Staffs
                                    @else
                                    Students
                                    @endif
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('courses.courseWise', $course->id) }}" class="btn btn-sm btn-outline-primary">View</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
                                    <div class="card-footer bg-white py-3">
                        <div class="card-footer bg-white py-3">
    {{ $tourists->links('pagination::bootstrap-5') }}
</div>
                    </div>
@endsection