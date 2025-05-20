<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <h1 style="text-align: center;">Admin Panel</h1>
    </header>

    <nav style="text-align: center;">
        <a href="{{ route('admin.dashboard') }}">Dashboard</a> |
        <a href="{{ route('admin.food') }}">Manage Food</a> |
        <a href="{{ route('admin.reservations') }}">Manage Reservations</a> |
        <a href="{{ route('admin.orders') }}">Manage Orders</a>
    </nav>

    <main style="padding: 20px;">
        @yield('content')
    </main>
</body>
</html>
