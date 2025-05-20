<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\Order;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
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
        // ✅ Paste the full store logic here
        // $request->validate([
        //     'cart_data' => 'required|json',
        //     'customer_id' => 'required|exists:customers,id',
        //     'table_id' => 'nullable|exists:tables,id',
        // ]);

        $cartData = json_decode($request->cart_data, true);
// dd($cartData);
        DB::beginTransaction();

        try {
            $order = Order::create([
                'customer_id' => Auth::id(),
                'table_id' => $request->table_id,
            ]);

            // $item['food_id']
            foreach ($cartData as $item) {
                $food = Food::where('name', $item['name'])->first();
                DB::table('order_food')->insert([
                    'order_id' => $order->id,
                    'food_id' => $food->id,
                    'quantity' => $item['qty'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            DB::commit();
            return redirect()->back()->with('success', 'Order placed successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
            // return redirect()->back()->with('error', 'Failed to place order.');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
