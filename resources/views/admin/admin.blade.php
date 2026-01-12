@extends('admin.master')
@section('content')
                <div class="card shadow mb-4 border-0 rounded-3 overflow-hidden">
                    <div class="card-header py-3 bg-white d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-brand-primary">All Students Data Table</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle btn btn-sm btn-light" href="#" role="button" id="dropdownMenuLink"
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i> Filters
                            </a>
                            <div class="dropdown-menu dropdown-menu-end shadow animated--fade-in"
                                 aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Filter By Status:</div>
                                <a class="dropdown-item" href="#">Show Active Only</a>
                                <a class="dropdown-item" href="#">Show Pending Only</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Export CSV</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped-custom align-middle mb-0" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th class="ps-4">Student Profile</th>
                                    <th>Contact Info</th>
                                    <th>Course & Batch</th>
                                    <th>Status</th>
                                    <th class="text-end pe-4">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tourists as $tourist)
                                <tr>
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center py-2">
                                            <div>
                                                <h6 class="mb-0 text-dark fw-bold">{{$tourist->name}}</h6>
                                                <small class="text-muted text-uppercase fw-semibold ls-1">{{$tourist->student_id}}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="fw-semibold text-dark">{{$tourist->phone_number}}</div>
                                        <small class="text-muted">{{$tourist->district}}</small>
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-primary border border-primary-subtle fw-bold">{{ $tourist->course->name ?? 'No Course' }}</span>
                                        <div class="small text-muted mt-1">{{$tourist->batch ?? 'N/A'}}</div>
                                    </td>
                                    <td>
                                                <span class="badge bg-success-subtle text-success px-3 py-2 rounded-pill fw-bold text-uppercase" style="font-size: 0.7rem; letter-spacing: 0.5px;">
                                                    <i class="fas fa-check-circle me-1"></i> {{$tourist->status}}
                                                </span>
                                    </td>
                                    <td class="text-end pe-4">
                                        <div class="btn-group btn-group-sm shadow-sm rounded-3" role="group">
                                            <a href="{{ route('tourist.showProfile', $tourist->id) }}" 
                                               class="btn btn-white text-primary border-light-subtle" 
                                               data-bs-toggle="tooltip" 
                                               title="View Details">
                                                <i class="fas fa-eye"></i>
                                            </a>

                                            <a href="#" 
                                               class="btn btn-white text-info border-light-subtle" 
                                               data-bs-toggle="tooltip" 
                                               title="Edit Student">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <form action="#" method="POST" onsubmit="return confirm('Are you sure?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-white text-danger border-light-subtle" data-bs-toggle="tooltip" title="Delete">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>


                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer bg-white py-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="small text-muted">
                                Showing {{ $tourists->firstItem() }} to {{ $tourists->lastItem() }} of {{ $tourists->total() }} entries
                            </div>
                            <nav aria-label="Page navigation">
                                {{ $tourists->links('pagination::bootstrap-5') }}
                            </nav>
                        </div>
                    </div>
                </div>
@endsection