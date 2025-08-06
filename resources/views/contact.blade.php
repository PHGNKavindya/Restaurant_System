@extends('layouts.app')

@section('content')

<!-- Fonts and Styles -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lilita+One&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<!-- Contact Section -->
<section class="contact py-5">
    <div class="container">
        <h1 class="text-center mb-5">Contact Us</h1>
        <div class="row justify-content-center mt-4">
            <!-- Address, Phone, Email -->
            <div class="col-md-6 text-center">
                <h4>Our Location</h4>
                <p>No. 23, Highlevel Road, Maharagama</p>
                <h4>Phone</h4>
                <p>0112 848825</p>
                <h4>Email</h4>
                <p>tastehaven@gmail.com</p>
            </div>
        </div>
    </div>
</section>

<!-- Video Section -->
<!-- <section class="video-section py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="mb-4">Restaurant Tour</h2>
                <video width="100%" height="auto" controls>
                    <source src="{{ asset('videos/restaurant-tour.mp4') }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
    </div>
</section> -->


<!-- <div class="container py-5">
    <div class="row">
        <div class="col-lg-8 m-auto">
            <h2 class="text-center mb-4">Customer Reviews</h2>
            @forelse($reviews as $review)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $review->name }}</h5>
                        <p class="card-text">{{ $review->message }}</p>
                        <small class="text-muted">{{ $review->created_at->format('F j, Y') }}</small>
                    </div>
                </div>
            @empty
                <p class="text-center">No reviews yet.</p>
            @endforelse
        </div>
    </div>
</div> -->


<div class="container py-5">
    <div class="row">
        <div class="col-lg-8 m-auto">
            <h2 class="text-center mb-4">Customer Reviews</h2>

            <!-- Scrollable Box -->
            <div style="max-height: 400px; overflow-y: auto; padding-right: 10px; border: 1px solid #ccc; border-radius: 10px;">
                @forelse($reviews as $review)
                    <div class="card mb-2 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title mb-1">{{ $review->name }}</h5>
                            <p class="card-text">{{ $review->message }}</p>
                            <small class="text-muted">{{ $review->created_at->format('F j, Y') }}</small>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-muted">No reviews yet.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@endsection
