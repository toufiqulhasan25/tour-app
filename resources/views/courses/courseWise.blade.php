@extends('admin.master')
@section('content')
<div class="container py-5">
    <div class="card shadow border-0">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">
                @if ($id == 4) 
                    Teacher Info
                @else
                    Course Wise Student Statistics
                @endif
            </h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>District</th>
                            <th>Number</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($students as $student)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->district }}</td>
                            <td>{{ $student->phone_number }}</td>
                            <td>
                                <a href="{{ route('student.profile', $student->id) }}" class="btn btn-sm btn-outline-primary">View</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">
                                No 
                                @if ($id == 4)
                                    Teacher registered in this table yet.
                                @else
                                    Course Wise Student Statistics registered in this course yet.
                                @endif
                             </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
       
        <div class="card-footer bg-white py-3">
            <div class="d-flex align-items-center justify-content-between">
                <div class="small text-muted">
                    Showing {{ $students->firstItem() ?? 0 }} to {{ $students->lastItem() ?? 0 }} of {{ $students->total() }} entries
                </div>
                
                <nav aria-label="Page navigation">
                    {{ $students->links('pagination::bootstrap-5') }}
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection