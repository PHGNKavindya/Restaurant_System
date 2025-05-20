<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
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
        return view('home');
    }

    public function adminDashboard()
{
    return view('layouts.dashboard');
}

public function adminFood()
{
    return view('admin.food');
}

public function adminReservations()
{
    return view('admin.reservations');
}

public function adminOrders()
{
    return view('admin.orders');
}


}


