@extends('admin.master') {{-- আপনার মেইন অ্যাডমিন লেআউটের নাম এখানে দিন --}}

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Upload New Memory</h1>
        <a href="{{ route('landing.gallery') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-images fa-sm text-white-50"></i> View Gallery
        </a>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow mb-4 border-0">
                <div class="card-header py-3 bg-white">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-cloud-upload-alt me-2"></i> Select Image to Upload
                    </h6>
                </div>
                <div class="card-body p-5">
                    
                    {{-- সাকসেস মেসেজ --}}
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="text-center mb-4">
                            <div id="image-preview-container" class="mx-auto" style="width: 200px; height: 200px; border: 2px dashed #ddd; border-radius: 10px; display: flex; align-items: center; justify-content: center; overflow: hidden; background: #f8f9fc;">
                                <i class="fas fa-image fa-3x text-light" id="placeholder-icon"></i>
                                <img id="preview-img" src="#" alt="Preview" style="display: none; width: 100%; height: 100%; object-fit: cover;">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="image" class="form-label fw-bold">Choose Image</label>
                            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewFile()">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Supported formats: JPG, PNG, JPEG. Max size: 2MB.</div>
                        </div>

                        <div class="mb-4">
                            <label for="title" class="form-label fw-bold">Title / Caption (Optional)</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="e.g. Sylhet Tour 2026">
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg shadow-sm">
                                <i class="fas fa-upload me-2"></i> Upload to Memories
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function previewFile() {
        const preview = document.getElementById('preview-img');
        const file = document.querySelector('input[type=file]').files[0];
        const icon = document.getElementById('placeholder-icon');
        const reader = new FileReader();

        reader.addEventListener("load", function () {
            preview.src = reader.result;
            preview.style.display = "block";
            icon.style.display = "none";
        }, false);

        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection