<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PagesController;
use \App\Http\Controllers\EventsController;
use \App\Http\Controllers\TicketsController;
use \App\Http\Controllers\OrdersController;

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

Route::get('/', [PagesController::class, 'home'])->name('home');

Route::get('/about', [PagesController::class, 'about']) 
    ->middleware('auth')
    ->name('about');


Route::middleware(['auth'])->group(function() {
    Route::resource('events', EventsController::class);
    Route::get('events/{event}/order', [EventsController::class, 'order'])->name('events.order');
    Route::post('events/{event}/order', [EventsController::class, 'storeOrder'])->name('events.storeOrder');
    Route::get('tickets/{ticket}/scan', [TicketsController::class, 'scan'])->name('tickets.scan');
    Route::get('orders/{order}', [OrdersController::class, 'show'])->name('orders.show');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
