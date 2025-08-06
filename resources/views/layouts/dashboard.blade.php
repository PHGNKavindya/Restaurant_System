@extends('layouts.admin')

@section('content')

<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    
<div class="text-center mb-4">
    <h2>Dashboard</h2>
    <p>Welcome to the Admin Dashboard.</p>
</div>


 <div class="row text-center">
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm border-0 bg-dark text-white">
                <div class="card-body">
                    <h5>Reservations</h5>
                    <h3>{{ $reservationCount }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm border-0 bg-dark text-white">
                <div class="card-body">
                    <h5>Pending Orders</h5>
                    <h3>{{ $pendingOrders }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm border-0 bg-dark text-white">
                <div class="card-body">
                    <h5>Prepared Orders</h5>
                    <h3>{{ $preparedOrders }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm border-0 bg-secondary text-white">
                <div class="card-body">
                    <h5>Total Foods</h5>
                    <h3>{{ $foodCount }}</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Cover Photo Section
    <div class="text-center">
        <img src="{{ asset('images/admin-cover.jpg') }}" alt="Admin Cover" class="img-fluid rounded shadow" style="max-height: 400px;">
    </div>

</div> -->




<section class="dash">    
    <div class="container">       
    </div>
</section>
















@endsection
