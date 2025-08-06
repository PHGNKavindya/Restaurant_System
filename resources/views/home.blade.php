@extends('layouts.app')

@section('content')

<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>





<style>
    .review-box {
        position: fixed;
        bottom: 20px;
        right: 20px;
        width: 300px;
        max-height: 300px;
        overflow-y: auto;
        background: white;
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 15px;
        box-shadow: 0 0 10px rgba(0,0,0,0.15);
        z-index: 9999;
    }
    .review-box h5 {
        font-size: 16px;
        margin-bottom: 10px;
        font-weight: bold;
    }
    .review-entry {
        font-size: 14px;
        margin-bottom: 10px;
        border-bottom: 1px solid #eee;
        padding-bottom: 5px;
    }
    .review-entry strong {
        color: #333;
    }
</style>

<div class="review-box">
    <h5>Customer Reviews</h5>
    @forelse($reviews as $review)
        <div class="review-entry">
            <strong>{{ $review->name }}</strong>:<br>
            {{ Str::limit($review->message, 100) }}
        </div>
    @empty
        <p>No reviews yet.</p>
    @endforelse
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


@endsection
