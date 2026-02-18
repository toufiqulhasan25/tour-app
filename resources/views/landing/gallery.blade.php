@extends('landing')

@section('body')
    <div class="auth-background flex-grow-1 d-flex flex-column position-relative" style="height: auto; min-height: 100vh;">
        <div class="auth-overlay"></div>

        <div class="container py-5 mt-5 position-relative" style="z-index: 2;">
            <div class="text-center mb-5">
                <h1 class="main-title" style="font-size: 3.5rem;">Our Memories</h1>
            </div>

            <div class="row g-4" id="image-container">
                @include('landing.gallery_data')
            </div>

            <div class="text-center mt-5">
                <button class="btn btn-adventure px-5" id="load-more" data-url="{{ route('landing.gallery') }}" data-page="1">
                    Load More <i class="fa fa-arrow-down ms-2"></i>
                </button>
                <div id="loading-spinner" style="display: none;" class="text-white mt-3">Loading...</div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#load-more').click(function() {
                let btn = $(this);
                let page = btn.data('page') + 1;
                let url = btn.data('url');

                $.ajax({
                    url: url + "?page=" + page,
                    type: "get",
                    beforeSend: function() {
                        $('#loading-spinner').show();
                        btn.hide();
                    }
                })
                .done(function(data) {
                    if (data.html == "") {
                        btn.hide();
                        $('#loading-spinner').html("No more memories to show.");
                        return;
                    }
                    
                    $('#loading-spinner').hide();
                    $('#image-container').append(data.html); // নতুন ছবিগুলো নিচে যোগ হবে
                    btn.data('page', page); // পেজ নাম্বার আপডেট
                    
                    if(data.nextPage) {
                        btn.show();
                    } else {
                        btn.hide();
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    alert('Server error, please try again.');
                });
            });
        });
    </script>
@endsection