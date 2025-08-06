<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Food;
use App\Models\Review;
use App\Models\Reservation;

class HomeController extends Controller
{

public function redirectUser()
{
    // \Log::info('User status: ' . auth()->user()->status); // <-- log check

    if (auth()->user()->status == 2) {
        return redirect()->route('admin.dashboard');
    }

    // return redirect()->route('menu');
    return redirect()->route('/');

}




    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
{
    $reviews = Review::latest()->take(5)->get(); // fetch latest 5 reviews
    return view('home', compact('reviews')); // pass to view
}
//     public function adminDashboard()
// {
//     return view('layouts.dashboard');
// }


public function adminDashboard()
{
    $reservationCount = Reservation::count();
    $pendingOrders = Order::where('status', 'placed')->count();
    $preparedOrders = Order::where('status', 'prepared')->count();
    $foodCount = Food::count();

    return view('layouts.dashboard', compact(
        'reservationCount', 'pendingOrders', 'preparedOrders', 'foodCount'
    ));
}

public function adminFood()
{
    return view('admin.food');
}

public function adminReservations()
{
    $reservations = \App\Models\Reservation::with('table')->orderBy('date', 'desc')->get();
    return view('layouts.reservation', compact('reservations'));
}


public function adminOrders()
{
    $orders = Order::with(['user','table', 'items'])->orderBy('created_at', 'desc')->get();
    return view('layouts.orders', compact('orders'));
}

public function welcome()
{
    $latestFoods = Food::orderBy('created_at', 'desc')->take(4)->get();
    return view('welcome', compact('latestFoods'));
}


}


