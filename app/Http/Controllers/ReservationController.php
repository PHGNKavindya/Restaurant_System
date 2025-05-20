<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Table;

class ReservationController extends Controller
{

    public function index()
{
    $tables = Table::all();
    return view('reservation', compact('tables'));
}

public function create()
{
    $tables = Table::all(); 
    return view('reservations.create', compact('tables'));
}


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'date' => 'required|date',
            'time' => 'required',
        ]);

        Reservation::create([
            'name' => $request->name,
            'email' => $request->email,
            'date' => $request->date,
            'time' => $request->time,
            'customer_id' => Auth::id(),
        ]);

        return back()->with('success', 'Reservation successful!');
    }

    public function cancel(Request $request)
    {
        $request->validate([
            'cancelEmail' => 'required|email',
            'reservationId' => 'required|exists:reservations,id',
        ]);

        $reservation = Reservation::where('id', $request->reservationId)
                                  ->where('email', $request->cancelEmail)
                                  ->first();

        if ($reservation) {
            $reservation->delete();
            return back()->with('success', 'Reservation canceled.');
        }

        return back()->with('error', 'Reservation not found.');
    }
}
