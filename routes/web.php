<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\historyController;
use App\Http\Controllers\WidgetController;
use Illuminate\Support\Facades\Route;

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
});


require __DIR__.'/auth.php';


Route::middleware(['auth'])->group(function () {
    // Dash
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // List widgets
    Route::get('widgets', [WidgetController::class, 'index'])->name('widgets');

    // Post widget to Cart
    Route::post('addCart', [CartController::class, 'store'])->name('addCart');

    // Display Cart
    Route::get('cart', [CartController::class, 'index'])->name('cart');
    // Post Order
    Route::post('placeOrd', [CartController::class, 'placeOrder'])->name('placeOrder');

    // View Orders
    Route::get('orders', [historyController::class, 'viewOrds'])->name('orders');


});
