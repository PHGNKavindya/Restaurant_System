<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Table;

class ReservationController extends Controller
{

    public function index()
// {
//     $tables = Table::all();
//     return view('reservation', compact('tables'));
// }

{
    $tables = Table::all();

    // Get current user's reservations
    $userReservations = Reservation::where('customer_id', Auth::id())->get();

    return view('reservation', compact('tables', 'userReservations'));
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
            'table_id' => 'required|exists:tables,id',
        ]);

        Reservation::create([
            'name' => $request->name,
            'email' => $request->email,
            'date' => $request->date,
            'time' => $request->time,
            'customer_id' => Auth::id(),
            'table_id' => $request->table_id,
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

    public function adminDelete($id)
{
    $reservation = Reservation::findOrFail($id);
    $reservation->delete();

    return redirect()->route('admin.reservations')->with('success', 'Reservation deleted.');
}

}
