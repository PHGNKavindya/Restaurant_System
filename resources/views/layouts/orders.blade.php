@extends('layouts.admin')


@section('content')
<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

<div class="container">
    <h2 class="mb-4">Manage Orders</h2>

    @if($orders->isEmpty())
        <p>No orders found.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer</th>
                    <th>Table</th>
                    <th>Items</th>
                    <th>Placed At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name ?? 'Guest' }}</td>
                    <td>{{ $order->table->number ?? 'N/A' }}</td>
                    <td>
                        <ul>
                            @foreach ($order->items as $item)
                                <li>{{ $item->name }} (x{{ $item->pivot->quantity }})</li>
                            @endforeach
                        </ul>
                    </td>
                    <!-- <td>{{ $order->created_at->format('Y-m-d H:i') }}</td> -->
                     <td>{{ $order->created_at->format('Y-m-d') }}</td>

                    <td>
        <form action="{{ route('admin.orders.prepare', $order->id) }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="btn btn-warning btn-sm">Prepared</button>
        </form>

        <form action="{{ route('admin.orders.paid', $order->id) }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="btn btn-success btn-sm">Paid</button>
        </form>

        <form action="{{ route('admin.orders.close', $order->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">Close</button>
        </form>
    </td>
                
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
