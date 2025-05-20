<?php

namespace App\Http\Controllers;

use App\Models\OrderFood;
use Illuminate\Http\Request;

class OrderFoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           // Validate input
    $request->validate([
        'customer_id' => 'required|exists:customers,id',
        'table_id' => 'nullable|exists:tables,id',
    ]);

    // Create order
    $order = Order::create([
        'customer_id' => $request->customer_id,
        'table_id' => $request->table_id,
    ]);

    return redirect()->back()->with('success', 'Order saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderFood  $orderFood
     * @return \Illuminate\Http\Response
     */
    public function show(OrderFood $orderFood)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderFood  $orderFood
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderFood $orderFood)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrderFood  $orderFood
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderFood $orderFood)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderFood  $orderFood
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderFood $orderFood)
    {
        //
    }
}
