<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Food;
use App\Models\Order;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods = Food::with('category')->get();
        $categories = Category::all();

    return view('layouts.food', compact('foods','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.food.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);
    
        $imgPath = null;
        if ($request->hasFile('image')) {
            $imgPath = $request->file('image')->store('foods', 'public');
        }
    
        Food::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'img_path' => $imgPath,
            'categorory_id' => $request->category_id,
        ]);
    
        return redirect()->back()->with('success', 'Food added!');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit(Food $food)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Food $food)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
            
        if ($food->img_path && \Storage::disk('public')->exists($food->img_path)) {
            \Storage::disk('public')->delete($food->img_path); // Delete image
        }

        $food->delete(); // Delete food record
        return redirect()->back()->with('success', 'Food item deleted!');
    
    }


    public function showMenu()


// {
//     $foods = Food::all(); 
//     $categories = Category::with('foods')->get();
//     $tables = \App\Models\Table::all(); // ✅ get tables here
//     $activeOrder = null;

//     if (Auth::check()) {
//         $activeOrder = Order::where('customer_id', Auth::id())
//             ->orderBy('created_at', 'desc')
//             ->first();
//     }

//     return view('menu', compact('foods', 'categories', 'activeOrder', 'tables')); // ✅ pass it to view
// }


//     {
//     $foods = Food::all(); 
//     $categories = Category::with('foods')->get();

    
//     $activeOrder = null;

//     if (Auth::check()) {
//         $activeOrder = Order::where('customer_id', Auth::id())
//             ->orderBy('created_at', 'desc')
//             ->first();
//     }

//     return view('menu', compact('foods', 'categories', 'activeOrder'));
// }


{
    $foods = Food::all(); 
    $categories = Category::with('foods')->get();
    $tables = Table::all(); // ✅ Add this line

    $activeOrder = null;

    if (Auth::check()) {
        $activeOrder = Order::where('customer_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->first();
    }

    return view('menu', compact('foods', 'categories', 'activeOrder', 'tables')); // ✅ Include tables
}

}
