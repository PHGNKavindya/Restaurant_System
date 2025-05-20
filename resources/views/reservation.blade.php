
@extends('layouts.app')

@section('content')


   <!-- Reservation Form -->
<form action="{{ route('reservation.store') }}" method="POST">
    @csrf
    <section class="reservation-form py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto text-center">
                    <h2>Reserve a Table</h2>
                    <div class="mb-3">
                        <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                    </div>
                    <div class="mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Your Email" required>
                    </div>
                    <div class="mb-3">
                        <input type="date" name="date" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <input type="time" name="time" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="table_id">Choose a Table</label>
                        <select name="table_id" class="form-control" required>
                            @foreach ($tables as $table)
                                <option value="{{ $table->id }}">
                                    Table #{{ $table->id }} ({{ $table->capacity }} seats)
                                </option>
                            @endforeach
                        </select>
                    </div>

                    



                    <button type="submit" class="btn btn-danger w-100">Reserve Table</button>
                </div>
            </div>
        </div>
    </section>
</form>




<form action="{{ route('reservation.cancel') }}" method="POST">
    @csrf
    <!-- Cancel Reservation -->
    <section class="cancel-form py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto text-center">
                    <h2>Cancel Reservation</h2>
                    <div class="mb-3">
                        <input type="email" name="cancelEmail" class="form-control" placeholder="Your Email" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="reservationId" class="form-control" placeholder="Reservation ID" required>
                    </div>
                    <button type="submit" class="btn btn-danger w-100">Cancel Reservation</button>
                </div>
            </div>
        </div>
    </section>
</form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    @endsection