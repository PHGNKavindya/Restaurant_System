@extends('layouts.admin')

@section('content')
    <h2>Manage Food</h2>
    <p>Here you will manage food items.</p>


    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.food.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Name:</label>
        <input type="text" name="name" required><br>

        <label>Price:</label>
        <input type="number" step="0.01" name="price" required><br>

        <label>Description:</label>
        <textarea name="description"></textarea><br>

        <label>Image:</label>
        <input type="file" name="image"><br>

        <button type="submit">Add Food</button>
    </form>

    <hr>

    <h2>All Food Items</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Name</th><th>Price</th><th>Description</th><th>Image</th>
            </tr>
        </thead>
        <tbody>
            @foreach($foods as $food)
                <tr>
                    <td>{{ $food->name }}</td>
                    <td>{{ $food->price }}</td>
                    <td>{{ $food->description }}</td>
                    <td>
                        @if($food->img_path)
                            <img src="{{ asset('storage/' . $food->img_path) }}" width="100">
                        @else
                            No Image
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
