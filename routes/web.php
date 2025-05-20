<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReviewController;
use App\Models\Table;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FoodController;



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

Route::get('/', function () {
    return view('welcome'); 
})->name('/');

Route::get('/menu', function () {
    return view('menu');
})->name('menu');

Route::get('/reservation', function () {
    $tables = Table::all(); // assuming you have a Table model
    return view('reservation', compact('tables'));
})->name('reservation');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Auth::routes();

Route::get('/home', function () {
    return view('welcome'); 
})->name('/home');

Route::middleware(['auth'])->group(function(){
    Route::post('/contactsave', [App\Http\Controllers\ReviewController::class, 'store'])->name('feedbacksave');
});
Route::get('/reservation', [App\Http\Controllers\ReservationController::class, 'index'])->name('reservation');

Route::middleware(['auth'])->group(function () {
    // Route::get('/reservation', [ReservationController::class, 'create'])->name('reservation');
    Route::post('/reserve', [ReservationController::class, 'store']);
    Route::post('/reservation.store', [App\Http\Controllers\ReservationController::class, 'store'])->name('reservation.store');
    Route::post('/cancel-reservation', [App\Http\Controllers\ReservationController::class, 'cancel'])->name('reservation.cancel');
});


Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');


Route::get('/admin', [HomeController::class, 'adminDashboard'])->name('admin.dashboard');
Route::get('/admin/food', [HomeController::class, 'adminFood'])->name('admin.food');
Route::get('/admin/reservations', [HomeController::class, 'adminReservations'])->name('admin.reservations');
Route::get('/admin/orders', [HomeController::class, 'adminOrders'])->name('admin.orders');


Route::get('/admin/food', [FoodController::class, 'food'])->name('admin.food');

