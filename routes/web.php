<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReviewController;
use App\Models\Table;
use App\Models\Food;
use App\Models\Review;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\LoginController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome'); 
// })->name('/');

Route::get('/', [HomeController::class, 'welcome'])->name('/');


Route::get('/menu', [FoodController::class, 'showMenu'])->name('menu');


Route::get('/reservation', function () {
    $tables = Table::all(); // assuming you have a Table model
    return view('reservation', compact('tables'));
})->name('reservation');

// Route::get('/contact', function () {
//     return view('contact');
// })->name('contact');


// Route::get('/contact', function () {
//     $reviews = Review::latest()->take(5)->get(); // shows 5 latest reviews
//     return view('contact', compact('reviews'));
// })->name('contact');


Route::get('/contact', function () {
    $reviews = \App\Models\Review::latest()->get(); // No pagination needed
    return view('contact', compact('reviews'));
})->name('contact');


Auth::routes();

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login.attempt');

// Route::get('/home', function () {
//     return view('welcome'); 
// })->name('/home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'redirectUser'])->name('home');


Route::middleware(['auth'])->group(function(){
    Route::post('/contactsave', [App\Http\Controllers\ReviewController::class, 'store'])->name('feedbacksave');
});
Route::get('/reservation', [App\Http\Controllers\ReservationController::class, 'index'])->name('reservation');

Route::middleware(['auth'])->group(function () {
    // Route::get('/admin/reservations', [HomeController::class, 'adminReservations'])->name('admin.reservations');
    // Route::get('/reservation', [ReservationController::class, 'create'])->name('reservation');
    //   Route::get('/admin/reservations', [HomeController::class, 'adminReservations'])->name('admin.reservations');
    Route::post('/reserve', [ReservationController::class, 'store']);
    Route::post('/reservation.store', [App\Http\Controllers\ReservationController::class, 'store'])->name('reservation.store');
    Route::post('/cancel-reservation', [App\Http\Controllers\ReservationController::class, 'cancel'])->name('reservation.cancel');
});


Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');


Route::get('/admin', [HomeController::class, 'adminDashboard'])->name('admin.dashboard');
//Route::get('/admin/food', [HomeController::class, 'adminFood'])->name('admin.food');
//Route::get('/admin/reservations', [HomeController::class, 'adminReservations'])->name('admin.reservations');
Route::get('/admin/orders', [HomeController::class, 'adminOrders'])->name('admin.orders');

// Route::post('/admin/orders/{order}/prepare', [AdminOrderController::class, 'markPrepared'])->name('admin.orders.prepare');
// Route::post('/admin/orders/{order}/paid', [AdminOrderController::class, 'markPaid'])->name('admin.orders.paid');
// Route::delete('/admin/orders/{order}/close', [AdminOrderController::class, 'close'])->name('admin.orders.close');

Route::post('/admin/orders/{order}/prepare', [OrderController::class, 'markPrepared'])->name('admin.orders.prepare');
Route::post('/admin/orders/{order}/paid', [OrderController::class, 'markPaid'])->name('admin.orders.paid');
Route::delete('/admin/orders/{order}/close', [OrderController::class, 'close'])->name('admin.orders.close');



Route::post('admin.food.store', [FoodController::class, 'store'])->name('admin.food.store');
Route::get('/admin/food', [FoodController::class, 'index'])->name('admin.food');
Route::delete('admin/food/{food}', [FoodController::class, 'destroy'])->name('admin.food.destroy');


//Route::delete('/admin/reservations/{id}', [ReservationController::class, 'adminDelete'])->name('admin.reservations.delete');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/reservations', [HomeController::class, 'adminReservations'])->name('admin.reservations');
    Route::delete('/admin/reservations/{id}', [ReservationController::class, 'adminDelete'])->name('admin.reservations.delete');
});

 Route::get('/admin/reservations', [HomeController::class, 'adminReservations'])->name('admin.reservations');
 Route::get('/', [HomeController::class, 'welcome'])->name('/');




 Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout');


