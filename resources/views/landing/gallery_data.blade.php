@foreach ($images as $image)
    <div class="col-md-4 col-sm-6 mb-4">
        <div class="glass-card p-0 overflow-hidden h-100 border-0 shadow-lg text-center">
            <div style="height: 250px; overflow: hidden; position: relative;">
                <img src="{{ asset('images/gallery/' . $image->image) }}" class="img-fluid w-100 h-100"
                    style="object-fit: cover;" alt="Memory">
                <span class="position-absolute bottom-0 start-0 w-100 p-3"
                    style="background: linear-gradient(to top, rgba(0,0,0,0.6), transparent); color: white; text-align: left;">
                    <small class="fw-bold text-uppercase">Tour Highlight</small>
                </span>
            </div>
        </div>
    </div>
@endforeach